@extends('layouts.app')
@section('title', 'Log Aktivitas')

@section('content')
<div class="mb-8">
    <h1 class="text-2xl font-black text-slate-900">Log Aktivitas</h1>
    <p class="text-slate-500">Jejak digital seluruh transaksi peminjaman.</p>
</div>

<div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead>
                <tr class="bg-slate-50 text-slate-400 uppercase text-[11px] font-black tracking-widest">
                    <th class="px-8 py-5">User</th>
                    <th class="px-8 py-5">Barang</th>
                    <th class="px-8 py-5">Aktivitas</th>
                    <th class="px-8 py-5">Waktu</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50 text-sm">
                @foreach ($logs as $log)
                <tr class="hover:bg-slate-50/50 transition">
                    <td class="px-8 py-5 font-bold text-slate-900">{{ $log->user->name }}</td>
                    <td class="px-8 py-5 text-slate-600">{{ $log->item->name }}</td>
                    <td class="px-8 py-5">
                        <span class="px-3 py-1 font-bold rounded-lg {{ $log->action === 'borrow' ? 'bg-blue-50 text-blue-600' : 'bg-emerald-50 text-emerald-600' }}">
                            {{ strtoupper($log->action) }} ({{ $log->amount }})
                        </span>
                    </td>
                    <td class="px-8 py-5 text-slate-400">{{ $log->created_at->diffForHumans() }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
