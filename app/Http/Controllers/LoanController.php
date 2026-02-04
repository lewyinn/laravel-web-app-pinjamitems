<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Loan;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoanController extends Controller
{
    public function loans()
    {
        $user = Auth::user();
        $items = Item::where('stock', '>', 0)->get();

        if ($user->role === 'admin') {
            // Admin melihat SEMUA riwayat peminjaman
            $loans = Loan::with(['user', 'item'])->latest()->get();
        } else {
            // User hanya melihat riwayat peminjaman DIA sendiri
            $loans = Loan::with(['item'])->where('user_id', $user->id)->latest()->get();
        }

        return view('pinjamBarang', compact('items', 'loans'));
    }

    public function borrow(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'amount' => 'required|integer|min:1',
        ]);

        $item = Item::findOrFail($request->item_id);

        // Cek apakah stok cukup untuk jumlah yang diminta
        if ($item->stock < $request->amount) {
            return back()->with('error', 'Stok tidak mencukupi! Tersisa: ' . $item->stock);
        }

        DB::transaction(function () use ($item, $request) {
            // Kurangi stok sesuai jumlah input
            $item->decrement('stock', $request->amount);

            Loan::create([
                'user_id'     => Auth::id(),
                'item_id'     => $item->id,
                'amount'      => $request->amount, // Simpan jumlahnya
                'borrow_date' => now(),
                'status'      => 'borrowed'
            ]);

            Log::create([
                'user_id' => Auth::id(),
                'item_id' => $item->id,
                'action'  => 'borrow',
                'amount'  => $request->amount,
            ]);
        });

        return back()->with('success', 'Berhasil meminjam ' . $request->amount . ' unit barang!');
    }

    public function return($id) // Pakai ID supaya lebih akurat
    {
        $loan = Loan::findOrFail($id);

        // 1. Keamanan Akses
        if (Auth::user()->role !== 'admin' && $loan->user_id !== Auth::id()) {
            return back()->with('error', 'Akses ditolak!');
        }

        // 2. Cegah Pengembalian Ganda
        if ($loan->status === 'returned') {
            return back()->with('error', 'Barang sudah dikembalikan sebelumnya.');
        }

        DB::transaction(function () use ($loan) {
            // 3. Update Status Peminjaman (Gunakan update langsung ke Model)
            $loan->update([
                'status' => 'returned',
                'return_date' => now(),
            ]);

            // 4. Tambah stok barang sesuai jumlah yang dipinjam
            $loan->item->increment('stock', $loan->amount);

            // 5. Catat Log
            Log::create([
                'user_id' => Auth::id(),
                'item_id' => $loan->item_id,
                'action'  => 'return',
                'amount'  => $loan->amount,
            ]);
        });

        return back()->with('success', 'Barang berhasil dikembalikan dan stok diperbarui!');
    }
}
