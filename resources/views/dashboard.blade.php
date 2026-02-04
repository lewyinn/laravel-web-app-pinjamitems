@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
        <div>
            <h1 class="text-3xl font-extrabold tracking-tight text-slate-900">Dashboard</h1>
            <p class="text-slate-500 mt-1">Ringkasan status inventaris dan peminjaman Anda.</p>
        </div>
        <div class="flex items-center space-x-3 bg-white p-2 rounded-md shadow-sm border border-slate-100 px-4">
            <span class="text-sm font-medium text-slate-500">Tanggal:</span>
            <span class="text-sm font-bold text-slate-900">{{ date('d M Y') }}</span>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
        <div class="bg-white p-6 rounded-xl border border-slate-100 shadow-sm relative overflow-hidden group">
            <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-all">
                <svg class="w-16 h-16 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
            </div>
            <p class="text-sm font-bold text-slate-400 uppercase tracking-widest">Total Barang</p>
            <h3 class="text-4xl font-black text-slate-900 mt-2">
                {{ auth()->user()->role === 'admin' ? $itemsCount : '-' }}
            </h3>
        </div>

        <div class="bg-white p-6 rounded-xl border border-slate-100 shadow-sm relative overflow-hidden group">
            <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-all">
                <svg class="w-16 h-16 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                </svg>
            </div>
            <p class="text-sm font-bold text-slate-400 uppercase tracking-widest">Dipinjam</p>
            <h3 class="text-4xl font-black text-orange-600 mt-2">{{ $borrowItems }}</h3>
        </div>

        <div class="bg-white p-6 rounded-xl border border-slate-100 shadow-sm relative overflow-hidden group">
            <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-all">
                <svg class="w-16 h-16 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <p class="text-sm font-bold text-slate-400 uppercase tracking-widest">Dikembalikan</p>
            <h3 class="text-4xl font-black text-emerald-600 mt-2">{{ $returnItems }}</h3>
        </div>
    </div>

    <div
        class="bg-gradient-to-br from-blue-600 to-indigo-800 rounded-xl p-8 md:p-12 text-white flex flex-col md:flex-row items-center justify-between shadow-xl shadow-blue-100">
        <div class="max-w-xl text-center md:text-left">
            <h2 class="text-3xl font-black mb-4">Selamat Datang, {{ auth()->user()->name }}!</h2>
            <p class="text-blue-100 text-lg font-medium mb-8 leading-relaxed opacity-90">Sistem manajemen inventaris digital
                yang dirancang untuk efisiensi instansi. Kelola semua barang dengan satu klik.</p>
            <div class="flex flex-wrap gap-4 justify-center md:justify-start">
                <a href="{{ route('pinjamBarang') }}"
                    class="bg-white text-blue-600 px-8 py-3.5 rounded-2xl font-bold shadow-lg hover:scale-105 transition-all">Mulai
                    Peminjaman</a>
                <a href="{{ route('logs') }}"
                    class="bg-blue-500/30 text-white backdrop-blur-md px-8 py-3.5 rounded-2xl font-bold border border-white/20 hover:bg-blue-500/50 transition-all">Riwayat
                    Log</a>
            </div>
        </div>
        <div class="mt-12 md:mt-0">
            <img src="{{ asset('assets/img/welcome-bar.png') }}" alt="UI" class="w-80 animate-pulse-slow">
        </div>
    </div>
@endsection
