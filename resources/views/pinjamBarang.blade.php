@extends('layouts.app')
@section('title', 'Peminjaman Barang')

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
                    @if ($errors->any())
                        <ul class="list-disc pl-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @else
                        {{ session('error') }}
                    @endif
                </div>
            </div>
        @endif
    </div>

    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
        <div>
            <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight text-blue-600">Peminjaman Barang</h1>
            <p class="text-slate-500 text-sm italic">Ajukan peminjaman aset dengan mudah dan transparan.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-1">
            <div class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-sm sticky top-8">
                <h2 class="text-xl font-black text-slate-900 mb-6 flex items-center">
                    <span class="bg-blue-600 w-2 h-8 rounded-full mr-3"></span>
                    Form Pengajuan
                </h2>
                <form action="{{ route('items.borrow') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase mb-2 ml-1 tracking-widest">Pilih
                            Barang</label>
                        <select name="item_id" id="item_id"
                            class="w-full p-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-500 font-bold text-slate-700"
                            required>
                            <option value="" disabled selected>Cari unit tersedia...</option>
                            @foreach ($items as $availableItem)
                                <option value="{{ $availableItem->id }}" data-stock="{{ $availableItem->stock }}">
                                    {{ $availableItem->name }} (Tersedia: {{ $availableItem->stock }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label
                            class="block text-[10px] font-black text-slate-400 uppercase mb-2 ml-1 tracking-widest">Jumlah
                            Pinjam</label>
                        <input type="number" name="amount" id="amount" value="1" min="1"
                            class="w-full p-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-500 font-bold"
                            required>
                        <p id="stock-warning" class="text-red-500 text-[10px] mt-2 hidden font-bold italic text-center">⚠
                            Jumlah melebihi stok tersedia!</p>
                    </div>

                    <button type="submit" id="submit-borrow"
                        class="w-full py-4 bg-blue-600 text-white font-black rounded-2xl shadow-xl hover:bg-blue-700 transition-all">
                        Konfirmasi Pinjaman
                    </button>
                </form>
            </div>
        </div>

        <div class="lg:col-span-2">
            <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden h-full flex flex-col">
                <div class="p-8 border-b border-slate-50">
                    <h2 class="text-2xl font-black text-slate-900 tracking-tight">Data Riwayat</h2>
                </div>

                <div class="overflow-x-auto flex-1">
                    <table class="w-full text-left">
                        <thead class="bg-slate-50 text-slate-400 uppercase text-[10px] font-black tracking-widest">
                            <tr>
                                <th class="px-8 py-5 text-center">No</th>
                                <th class="px-8 py-5">Barang</th>
                                <th class="px-8 py-5 text-center">Status</th>
                                <th class="px-8 py-5 text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @forelse ($loans as $loan)
                                <tr class="hover:bg-slate-50/50 transition">
                                    <td class="px-8 py-6 text-center font-bold text-slate-300">{{ $loop->iteration }}</td>
                                    <td class="px-8 py-6">
                                        <p class="font-black text-slate-900">{{ $loan->item->name }}</p>
                                        <p class="text-xs font-bold text-blue-600 italic">{{ $loan->amount }} Unit</p>
                                    </td>
                                    <td class="px-8 py-6 text-center text-[10px] font-black uppercase tracking-widest">
                                        @if ($loan->status === 'returned')
                                            <span class="text-emerald-500 bg-emerald-50 px-3 py-1 rounded-full">✓
                                                Returned</span>
                                        @else
                                            <span
                                                class="text-orange-500 bg-orange-50 px-3 py-1 rounded-full animate-pulse">●
                                                Borrowed</span>
                                        @endif
                                    </td>
                                    <td class="px-8 py-6 text-right">
                                        @if ($loan->status !== 'returned')
                                            <button data-modal-target="modal-{{ $loan->id }}"
                                                data-modal-toggle="modal-{{ $loan->id }}"
                                                class="bg-slate-900 text-white text-[10px] font-black px-4 py-2 rounded-xl hover:bg-blue-600 transition-all">Kembalikan</button>

                                            <div id="modal-{{ $loan->id }}" tabindex="-1"
                                                class="hidden fixed inset-0 z-50 flex items-center justify-center bg-slate-900/60 backdrop-blur-sm">
                                                <div class="bg-white p-10 rounded-[2.5rem] shadow-2xl max-w-sm text-center">
                                                    <h3 class="text-xl font-black mb-4">Konfirmasi Selesai</h3>
                                                    <p class="text-slate-500 mb-8">Barang <span
                                                            class="text-blue-600">{{ $loan->item->name }}</span> sudah
                                                        kembali?</p>
                                                    <div class="flex gap-2">
                                                        <button data-modal-hide="modal-{{ $loan->id }}"
                                                            class="flex-1 py-3 bg-slate-100 rounded-xl font-bold">Batal</button>
                                                        <form action="{{ route('loans.return', $loan->id) }}"
                                                            method="POST" class="flex-1">
                                                            @csrf
                                                            <button type="submit"
                                                                class="w-full py-3 bg-blue-600 text-white rounded-xl font-black">Ya,
                                                                Kembali</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <span class="text-slate-300 font-bold italic text-[10px]">Closed</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-8 py-20 text-center text-slate-400 font-medium">No record
                                        found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <style>
        .animate-slide-in {
            animation: slide-in 0.4s cubic-bezier(0.68, -0.55, 0.27, 1.55) forwards;
        }

        @keyframes slide-in {
            from {
                transform: translateX(120%);
            }

            to {
                transform: translateX(0);
            }
        }
    </style>

    @push('scripts')
        <script>
            // Auto-hide toast
            setTimeout(() => {
                const container = document.getElementById('toast-container');
                if (container) {
                    container.style.transition = 'opacity 0.5s ease';
                    container.style.opacity = '0';
                    setTimeout(() => container.remove(), 500);
                }
            }, 4000);

            // Validation Stok
            const itemSel = document.getElementById('item_id');
            const amtInp = document.getElementById('amount');
            const warn = document.getElementById('stock-warning');
            const btn = document.getElementById('submit-borrow');

            itemSel.addEventListener('change', function() {
                const stock = parseInt(this.options[this.selectedIndex].dataset.stock);
                amtInp.max = stock;
                validate();
            });

            amtInp.addEventListener('input', validate);

            function validate() {
                const stock = parseInt(itemSel.options[itemSel.selectedIndex]?.dataset.stock || 0);
                const val = parseInt(amtInp.value);
                if (val > stock) {
                    warn.classList.remove('hidden');
                    btn.disabled = true;
                } else {
                    warn.classList.add('hidden');
                    btn.disabled = false;
                }
            }
        </script>
    @endpush
@endsection
