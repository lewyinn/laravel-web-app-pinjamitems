<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | PinjamPro</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/Avatar.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
        }

        .sidebar-active {
            background: #eff6ff;
            color: #2563eb !important;
            border-right: 4px solid #2563eb;
        }
    </style>
</head>

<body class="antialiased text-slate-900">

    <button data-drawer-target="sidebar" data-drawer-toggle="sidebar" type="button"
        class="inline-flex items-center p-2 mt-4 ms-3 text-sm text-slate-500 rounded-lg sm:hidden hover:bg-slate-100">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
            <path d="M3 5h14v2H3V5zm0 4h14v2H3V9zm0 4h14v2H3v-2z" />
        </svg>
    </button>

    <aside id="sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 bg-white border-r border-slate-200 shadow-sm">
        <div class="h-full flex flex-col px-3 py-6 overflow-y-auto">
            <div class="flex items-center px-4 mb-10 space-x-3">
                <div class="bg-blue-600 p-2 rounded-xl shadow-lg shadow-blue-200 text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                        <path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                </div>
                <span class="text-xl font-extrabold tracking-tight">Pinjam<span class="text-blue-600">Pro</span></span>
            </div>

            <nav class="flex-1 space-y-1">
                <a href="{{ route('dashboard') }}"
                    class="flex items-center p-3 font-semibold text-slate-600 rounded-xl hover:bg-slate-50 transition-all group {{ request()->routeIs('dashboard') ? 'sidebar-active' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    Dashboard
                </a>

                @if (auth()->user()->role === 'admin')
                    <div class="pt-4 pb-2 px-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Master
                        Data</div>
                    <a href="{{ route('items') }}"
                        class="flex items-center p-3 font-semibold text-slate-600 rounded-xl hover:bg-slate-50 transition-all {{ request()->routeIs('items') ? 'sidebar-active' : '' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            stroke-width="2">
                            <path
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                            </path>
                        </svg>
                        Inventaris
                    </a>
                    <a href="{{ route('users') }}"
                        class="flex items-center p-3 font-semibold text-slate-600 rounded-xl hover:bg-slate-50 transition-all {{ request()->routeIs('users') ? 'sidebar-active' : '' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            stroke-width="2">
                            <path
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                        List User
                    </a>
                @endif

                <div class="pt-4 pb-2 px-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Transactions
                </div>
                <a href="{{ route('pinjamBarang') }}"
                    class="flex items-center p-3 font-semibold text-slate-600 rounded-xl hover:bg-slate-50 transition-all {{ request()->routeIs('pinjamBarang') ? 'sidebar-active' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                    </svg>
                    Peminjaman
                </a>
                <a href="{{ route('logs') }}"
                    class="flex items-center p-3 font-semibold text-slate-600 rounded-xl hover:bg-slate-50 transition-all {{ request()->routeIs('logs') ? 'sidebar-active' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Log Aktivitas
                </a>
            </nav>

            <div class="mt-auto p-4 bg-slate-50 rounded-2xl border border-slate-100">
                <div class="flex items-center space-x-3 mb-4">
                    <div
                        class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold">
                        {{ substr(auth()->user()->name, 0, 1) }}</div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-bold text-slate-900 truncate">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-slate-500 truncate capitalize">{{ auth()->user()->role }}</p>
                    </div>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="w-full py-2 px-4 bg-red-50 text-red-600 text-sm font-bold rounded-lg hover:bg-red-100 transition">Logout</button>
                </form>
            </div>
        </div>
    </aside>

    <main class="sm:ml-64 min-h-screen p-4 lg:p-8">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    @if (session('success'))
        <div id="toast-success"
            class="fixed bottom-5 right-5 flex items-center w-full max-w-xs p-4 text-slate-800 bg-white rounded-xl shadow-2xl border-b-4 border-green-500 z-[100]"
            role="alert">
            <div class="text-sm font-medium">{{ session('success') }}</div>
            <button type="button"
                class="ms-auto bg-transparent text-slate-400 hover:text-slate-900 p-1.5 inline-flex items-center justify-center h-8 w-8"
                data-dismiss-target="#toast-success">
                <svg class="w-3 h-3" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif
</body>

</html>
