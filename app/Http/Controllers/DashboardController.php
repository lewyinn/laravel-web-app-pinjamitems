<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            // Admin melihat statistik global
            $itemsCount = Item::count();
            $borrowItems = Loan::where('status', 'borrowed')->count();
            $returnItems = Loan::where('status', 'returned')->count();
            $items = Item::all(); // Untuk list di dashboard jika perlu
        } else {
            // User hanya melihat miliknya sendiri
            $itemsCount = 0; // User tidak perlu lihat total item gudang
            $borrowItems = Loan::where('user_id', $user->id)->where('status', 'borrowed')->count();
            $returnItems = Loan::where('user_id', $user->id)->where('status', 'returned')->count();
            $items = Loan::where('user_id', $user->id)->get();
        }

        return view('dashboard', compact('items', 'borrowItems', 'returnItems', 'itemsCount'));
    }
}
