<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogController extends Controller
{
    public function handle(Request $request, $logId = null)
    {
        if ($request->isMethod('get')) {
            if (Auth::user()->role === 'admin') {
                // Admin lihat semua log (Eager Loading user & item agar tidak berat)
                $logs = Log::with(['user', 'item'])->latest()->get();
            } else {
                // User hanya lihat log aktivitasnya sendiri
                $logs = Log::with(['item'])->where('user_id', Auth::id())->latest()->get();
            }

            return view('log', compact('logs'));
        }

        if ($request->isMethod('delete') && Auth::user()->role === 'admin') {
            try {
                Log::findOrFail($logId)->delete();
                return back()->with('success', 'Log berhasil dihapus.');
            } catch (\Exception $e) {
                return back()->with('error', 'Gagal menghapus log.');
            }
        }

        return back()->with('error', 'Aksi tidak diizinkan.');
    }
}
