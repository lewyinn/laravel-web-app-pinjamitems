<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function handle(Request $request, $itemId = null)
    {
        if ($request->isMethod('get')) {
            // Menampilkan daftar barang
            $items = Item::all();
            return view('items', compact('items'));
        }

        if ($request->isMethod('post')) {
            // Validasi input
            $request->validate([
                'name' => 'required',
                'description' => 'nullable',
                'stock' => 'required|integer|min:1',
                'kondisi' => 'required|string|max:255',
            ]);

            // Menambahkan item baru
            if (Item::create($request->all())) {
                return back()->with('success', 'Barang berhasil ditambahkan.');
            } else {
                return back()->with('error', 'Terjadi kesalahan saat menambahkan barang.');
            }
        }

        if ($request->isMethod('put')) {
            // Validasi input
            $request->validate([
                'name' => 'required',
                'description' => 'nullable',
                'stock' => 'required|integer|min:1',
                'kondisi' => 'required|string|max:255',
            ]);

            // Temukan item berdasarkan ID
            $item = Item::findOrFail($itemId);

            // Memperbarui item
            if ($item->update($request->all())) {
                return back()->with('success', 'Barang berhasil diperbarui.');
            } else {
                return back()->with('error', 'Terjadi kesalahan saat memperbarui barang.');
            }
        }

        if ($request->isMethod('delete')) {
            try {
                // Temukan item berdasarkan ID
                $item = Item::findOrFail($itemId);

                // Hapus item
                $item->delete();

                return back()->with('success', 'Barang berhasil dihapus.');
            } catch (\Exception $e) {
                return back()->with('error', 'Terjadi kesalahan saat menghapus barang.');
            }
        }

        return back()->with('error', 'Aksi tidak diizinkan.');
    }
}
