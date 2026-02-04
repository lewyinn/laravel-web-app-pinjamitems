@extends('layouts.app')
@section('title', 'Manajemen User')

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
            <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Manajemen User</h1>
            <p class="text-slate-500 text-sm">Atur siapa saja yang bisa mengakses sistem PinjamPro.</p>
        </div>
        <button data-modal-target="addUser-modal" data-modal-toggle="addUser-modal"
            class="flex items-center justify-center px-6 py-3 bg-blue-600 text-white font-bold rounded-lg shadow-lg hover:bg-blue-700 transition-all active:scale-95">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                <path d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
            </svg>
            Tambah User
        </button>
    </div>

    <div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-slate-50 text-slate-400 uppercase text-[11px] font-black tracking-widest text-center">
                    <tr>
                        <th class="px-6 py-4">No</th>
                        <th class="px-6 py-4 text-left">Nama Lengkap</th>
                        <th class="px-6 py-4 text-left">Email</th>
                        <th class="px-6 py-4">Role</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50 text-sm">
                    @foreach ($users as $user)
                        <tr class="hover:bg-slate-50/50 transition">
                            <td class="px-6 py-4 text-center font-bold text-slate-400">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 font-bold text-slate-900">{{ $user->name }}</td>
                            <td class="px-6 py-4 text-slate-500">{{ $user->email }}</td>
                            <td class="px-6 py-4 text-center">
                                <span
                                    class="px-3 py-1 font-black uppercase text-[10px] tracking-widest rounded-full {{ $user->role === 'admin' ? 'bg-purple-50 text-purple-600' : 'bg-blue-50 text-blue-600' }}">
                                    {{ $user->role }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <button data-modal-target="editUser-modal-{{ $user->id }}"
                                        data-modal-toggle="editUser-modal-{{ $user->id }}"
                                        class="p-2 text-blue-600 bg-blue-50 rounded-lg hover:bg-blue-600 hover:text-white transition-all">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                            </path>
                                        </svg>
                                    </button>
                                    @if ($user->id !== auth()->id())
                                        {{-- Agar tidak hapus akun sendiri --}}
                                        <form action="{{ route('users.delete', $user->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                            @csrf @method('DELETE')
                                            <button type="submit"
                                                class="p-2 text-red-600 bg-red-50 rounded-lg hover:bg-red-600 hover:text-white transition-all">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                    </path>
                                                </svg>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>

                        <div id="editUser-modal-{{ $user->id }}" tabindex="-1" aria-hidden="true"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-screen bg-slate-900/50 backdrop-blur-sm">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <div class="relative bg-white rounded-xl shadow-xl p-8 border border-slate-100">
                                    <div class="text-center mb-6">
                                        <div
                                            class="bg-blue-100 text-blue-600 w-12 h-12 rounded-2xl flex items-center justify-center mx-auto mb-3">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                </path>
                                            </svg>
                                        </div>
                                        <h3 class="text-xl font-black text-slate-900 tracking-tight">Edit Informasi User
                                        </h3>
                                    </div>
                                    <form action="{{ route('users.update', $user->id) }}" method="POST" class="space-y-4">
                                        @csrf @method('PUT')
                                        <div>
                                            <label
                                                class="block text-[10px] font-black text-slate-400 uppercase mb-1.5 ml-1 tracking-widest">Username</label>
                                            <input type="text" name="name" value="{{ $user->name }}"
                                                class="w-full p-3.5 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-500 font-medium"
                                                required>
                                        </div>
                                        <div>
                                            <label
                                                class="block text-[10px] font-black text-slate-400 uppercase mb-1.5 ml-1 tracking-widest">Email
                                                Address</label>
                                            <input type="email" name="email" value="{{ $user->email }}"
                                                class="w-full p-3.5 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-500 font-medium"
                                                required>
                                        </div>
                                        <div>
                                            <label
                                                class="block text-[10px] font-black text-slate-400 uppercase mb-1.5 ml-1 tracking-widest">Ganti
                                                Password (Opsional)</label>
                                            <input type="password" name="password"
                                                placeholder="Isi hanya jika ingin ganti"
                                                class="w-full p-3.5 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-500 font-medium">
                                        </div>
                                        <div>
                                            <label
                                                class="block text-[10px] font-black text-slate-400 uppercase mb-1.5 ml-1 tracking-widest">Hak
                                                Akses / Role</label>
                                            <select name="role"
                                                class="w-full p-3.5 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-500 font-bold">
                                                <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User
                                                    Biasa</option>
                                                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>
                                                    Administrator</option>
                                            </select>
                                        </div>
                                        <button type="submit"
                                            class="w-full py-4 mt-4 bg-blue-600 text-white font-black rounded-2xl shadow-lg shadow-blue-100 hover:bg-blue-700 transition-all">Update
                                            Profil User</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div id="addUser-modal" tabindex="-1"
        class="hidden fixed z-50 w-full p-4 overflow-x-hidden overflow-y-auto inset-0 h-screen bg-slate-900/50 backdrop-blur-sm">
        <div class="relative w-full max-w-md max-h-full mx-auto mt-10">
            <div class="bg-white rounded-xl shadow-2xl p-10 border border-slate-100">
                <div class="text-center mb-8">
                    <div
                        class="bg-blue-600 text-white w-14 h-14 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-xl shadow-blue-200">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-width="2.5"
                                d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z">
                            </path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-black text-slate-900 tracking-tight">Daftarkan User Baru</h2>
                    <p class="text-slate-400 text-sm mt-1">Lengkapi data akun untuk akses PinjamPro.</p>
                </div>

                <form action="{{ route('users') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label
                            class="block text-[10px] font-black text-slate-400 uppercase mb-1.5 ml-1 tracking-widest">Username</label>
                        <input type="text" name="name" placeholder="Contoh: Moch Ridho"
                            class="w-full p-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-500 font-medium"
                            required>
                    </div>
                    <div>
                        <label
                            class="block text-[10px] font-black text-slate-400 uppercase mb-1.5 ml-1 tracking-widest">Email
                            Address</label>
                        <input type="email" name="email" placeholder="ridho@domain.com"
                            class="w-full p-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-500 font-medium"
                            required>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label
                                class="block text-[10px] font-black text-slate-400 uppercase mb-1.5 ml-1 tracking-widest">Password</label>
                            <input type="password" name="password" placeholder="••••••••"
                                class="w-full p-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-500 font-medium"
                                required>
                        </div>
                        <div>
                            <label
                                class="block text-[10px] font-black text-slate-400 uppercase mb-1.5 ml-1 tracking-widest">Confirm</label>
                            <input type="password" name="password_confirmation" placeholder="••••••••"
                                class="w-full p-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-500 font-medium"
                                required>
                        </div>
                    </div>
                    <div>
                        <label
                            class="block text-[10px] font-black text-slate-400 uppercase mb-1.5 ml-1 tracking-widest">Set
                            Hak Akses</label>
                        <select name="role"
                            class="w-full p-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-500 font-bold">
                            <option value="user">User Biasa</option>
                            <option value="admin">Administrator</option>
                        </select>
                    </div>
                    <button type="submit"
                        class="w-full py-4 mt-6 bg-blue-600 text-white font-black rounded-2xl shadow-xl shadow-blue-100 hover:bg-blue-700 hover:-translate-y-1 transition-all">Simpan
                        Akun Baru</button>
                </form>
            </div>
        </div>
    </div>
@endsection
