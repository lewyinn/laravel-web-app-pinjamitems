@extends('layouts.app')
@section('title', 'Inventaris')

@section('content')

    <div id="toast-container" class="fixed top-5 right-5 z-[100] space-y-3">
        @if (session('success'))
            <div id="toast-success"
                class="flex items-center w-full max-w-xs p-4 text-slate-800 bg-white rounded-2xl shadow-2xl border-l-4 border-emerald-500 animate-slide-in"
                role="alert">
                <div
                    class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-emerald-500 bg-emerald-100 rounded-lg">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z">
                        </path>
                    </svg>
                </div>
                <div class="ms-3 text-sm font-bold">{{ session('success') }}</div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-white text-slate-400 hover:text-slate-900 rounded-lg p-1.5 inline-flex items-center justify-center h-8 w-8 transition"
                    data-dismiss-target="#toast-success">
                    <svg class="w-3 h-3" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif

        @if (session('error') || $errors->any())
            <div id="toast-error"
                class="flex items-center w-full max-w-xs p-4 text-slate-800 bg-white rounded-2xl shadow-2xl border-l-4 border-red-500 animate-slide-in"
                role="alert">
                <div
                    class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z">
                        </path>
                    </svg>
                </div>
                <div class="ms-3 text-sm font-bold">
                    {{ session('error') ?? 'Ada kesalahan input data.' }}
                </div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-white text-slate-400 hover:text-slate-900 rounded-lg p-1.5 inline-flex items-center justify-center h-8 w-8 transition"
                    data-dismiss-target="#toast-error">
                    <svg class="w-3 h-3" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif
    </div>
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
        <div>
            <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Inventaris Barang</h1>
            <p class="text-slate-500 text-sm">Kelola stok dan pantau kondisi aset sekolah.</p>
        </div>
        <button data-modal-target="addItem-modal" data-modal-toggle="addItem-modal"
            class="flex items-center justify-center px-6 py-3 bg-blue-600 text-white font-bold rounded-lg shadow-lg hover:bg-blue-700 transition-all active:scale-95">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Tambah Barang
        </button>
    </div>

    <div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-slate-50 text-slate-400 uppercase text-[11px] font-black tracking-widest text-center">
                    <tr>
                        <th class="px-6 py-4">No</th>
                        <th class="px-6 py-4 text-left">Nama Barang</th>
                        <th class="px-6 py-4">Stok</th>
                        <th class="px-6 py-4">Kondisi</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @foreach ($items as $item)
                        <tr class="hover:bg-slate-50/50 transition">
                            <td class="px-6 py-4 text-center font-bold text-slate-400">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">
                                <p class="font-bold text-slate-900">{{ $item->name }}</p>
                                <p class="text-xs text-slate-500">{{ $item->description ?? 'Tidak ada deskripsi' }}</p>
                            </td>
                            <td class="px-6 py-4 text-center font-black text-blue-600">{{ $item->stock }} <span
                                    class="text-[10px] text-slate-400">Unit</span></td>
                            <td class="px-6 py-4 text-center text-xs">
                                @if ($item->kondisi == 'Baik')
                                    <span
                                        class="px-3 py-1 bg-emerald-50 text-emerald-600 rounded-full font-bold">Baik</span>
                                @elseif($item->kondisi == 'Rusak Ringan')
                                    <span class="px-3 py-1 bg-orange-50 text-orange-600 rounded-full font-bold">Rusak
                                        Ringan</span>
                                @else
                                    <span
                                        class="px-3 py-1 bg-red-50 text-red-600 rounded-full font-bold">{{ $item->kondisi }}</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <button data-modal-target="editItem-modal-{{ $item->id }}"
                                        data-modal-toggle="editItem-modal-{{ $item->id }}"
                                        class="p-2 text-blue-600 bg-blue-50 rounded-lg hover:bg-blue-600 hover:text-white transition-all">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                            </path>
                                        </svg>
                                    </button>
                                    <form action="{{ route('items.delete', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Hapus barang ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                            class="p-2 text-red-600 bg-red-50 rounded-lg hover:bg-red-600 hover:text-white transition-all">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        <div id="editItem-modal-{{ $item->id }}" tabindex="-1" aria-hidden="true"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-screen bg-slate-900/50 backdrop-blur-sm">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <div class="relative bg-white rounded-xl shadow-xl p-8 border border-slate-100">
                                    <h3 class="text-xl font-black text-slate-900 mb-6 flex items-center">
                                        <span class="bg-blue-100 text-blue-600 p-2 rounded-lg mr-3">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                </path>
                                            </svg>
                                        </span>
                                        Edit Barang
                                    </h3>
                                    <form action="{{ route('items.update', $item->id) }}" method="POST"
                                        class="space-y-4">
                                        @csrf @method('PUT')
                                        <div>
                                            <label class="block text-xs font-bold text-slate-400 uppercase mb-2 ml-1">Nama
                                                Barang</label>
                                            <input type="text" name="name" value="{{ $item->name }}"
                                                class="w-full p-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-500 font-medium"
                                                required>
                                        </div>
                                        <div>
                                            <label
                                                class="block text-xs font-bold text-slate-400 uppercase mb-2 ml-1">Deskripsi</label>
                                            <input type="text" name="description" value="{{ $item->description }}"
                                                class="w-full p-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-500 font-medium">
                                        </div>
                                        <div class="grid grid-cols-2 gap-4">
                                            <div>
                                                <label
                                                    class="block text-xs font-bold text-slate-400 uppercase mb-2 ml-1">Stok</label>
                                                <input type="number" name="stock" value="{{ $item->stock }}"
                                                    class="w-full p-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-500 font-medium"
                                                    required>
                                            </div>
                                            <div>
                                                <label
                                                    class="block text-xs font-bold text-slate-400 uppercase mb-2 ml-1">Kondisi</label>
                                                <select name="kondisi"
                                                    class="w-full p-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-500 font-medium">
                                                    <option value="Baik"
                                                        {{ $item->kondisi == 'Baik' ? 'selected' : '' }}>Baik</option>
                                                    <option value="Rusak Ringan"
                                                        {{ $item->kondisi == 'Rusak Ringan' ? 'selected' : '' }}>Rusak
                                                        Ringan</option>
                                                    <option value="Rusak Berat"
                                                        {{ $item->kondisi == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <button type="submit"
                                            class="w-full py-4 mt-4 bg-blue-600 text-white font-black rounded-2xl shadow-lg shadow-blue-100 hover:bg-blue-700 transition-all">Update
                                            Data</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div id="addItem-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-screen bg-slate-900/50 backdrop-blur-sm">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-xl shadow-xl p-8 border border-slate-100">
                <h3 class="text-xl font-black text-slate-900 mb-6 flex items-center">
                    <span class="bg-blue-100 text-blue-600 p-2 rounded-lg mr-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4">
                            </path>
                        </svg>
                    </span>
                    Barang Baru
                </h3>
                <form action="{{ route('items') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase mb-2 ml-1">Nama Barang</label>
                        <input type="text" name="name" placeholder="Contoh: Proyektor Epson"
                            class="w-full p-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-500 font-medium"
                            required>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase mb-2 ml-1">Deskripsi</label>
                        <input type="text" name="description" placeholder="Penjelasan singkat barang"
                            class="w-full p-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-500 font-medium">
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase mb-2 ml-1">Stok Awal</label>
                            <input type="number" name="stock" value="1"
                                class="w-full p-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-500 font-medium"
                                required>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase mb-2 ml-1">Kondisi</label>
                            <select name="kondisi"
                                class="w-full p-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-500 font-medium">
                                <option value="Baik">Baik</option>
                                <option value="Rusak Ringan">Rusak Ringan</option>
                                <option value="Rusak Berat">Rusak Berat</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit"
                        class="w-full py-4 mt-4 bg-blue-600 text-white font-black rounded-2xl shadow-lg shadow-blue-100 hover:bg-blue-700 transition-all">Simpan
                        Barang</button>
                </form>
            </div>
        </div>
    </div>
@endsection
