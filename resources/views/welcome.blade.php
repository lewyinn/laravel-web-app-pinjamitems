<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PinjamPro | Solusi Peminjaman Digital</title>

    <link rel="icon" type="image/png" href="{{ asset('assets/img/Avatar.png') }}">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #0f172a;
        }

        .glass-nav {
            background: rgba(15, 12, 41, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .bg-modern-gradient {
            background: radial-gradient(circle at top right, #1e1b4b, #0f172a);
        }

        .feature-card {
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .feature-card:hover {
            transform: translateY(-10px);
            background: rgba(255, 255, 255, 0.03);
            border-color: rgba(59, 130, 246, 0.5);
        }
    </style>
</head>

<body class="text-gray-200 antialiased">

    <header class="fixed w-full z-50 glass-nav">
        <nav class="px-4 lg:px-6 py-4">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                <a href="#" class="flex items-center space-x-3">
                    <div class="bg-blue-600 p-2 rounded-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                        </svg>
                    </div>
                    <span class="self-center text-2xl font-bold tracking-tight text-white">Pinjam<span
                            class="text-blue-500">Pro</span></span>
                </a>
                <div class="flex items-center lg:order-2">
                    @guest
                        <a href="{{ route('login') }}"
                            class="text-sm font-semibold leading-6 text-white mr-4 hover:text-blue-400 transition">Log
                            in</a>
                        <a href="#"
                            class="rounded-full bg-blue-600 px-6 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600 transition-all">Get
                            Started</a>
                    @else
                        <a href="{{ route('dashboard') }}"
                            class="rounded-full bg-blue-600 px-6 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 transition-all">Dashboard</a>
                    @endguest

                    <button data-collapse-toggle="mobile-menu-2" type="button"
                        class="inline-flex items-center p-2 ml-1 text-sm text-gray-400 rounded-lg lg:hidden hover:bg-gray-700">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                    <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                        <li><a href="#" class="block py-2 pr-4 pl-3 text-blue-500 font-semibold"
                                aria-current="page">Home</a></li>
                        <li><a href="#featured"
                                class="block py-2 pr-4 pl-3 text-gray-400 hover:text-white transition">Features</a></li>
                        <li><a href="#"
                                class="block py-2 pr-4 pl-3 text-gray-400 hover:text-white transition">Pricing</a></li>
                        <li><a href="#"
                                class="block py-2 pr-4 pl-3 text-gray-400 hover:text-white transition">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section class="relative overflow-hidden bg-modern-gradient pt-32 pb-20 lg:pt-48 lg:pb-32">
        <div
            class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full bg-[url('https://tailwindui.com/img/beams-home@95.jpg')] bg-no-repeat bg-center opacity-20">
        </div>

        <div class="relative py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">
            <div
                class="inline-flex justify-between items-center py-1 px-1 pr-4 mb-7 text-sm text-gray-300 bg-gray-800/50 border border-gray-700 rounded-full hover:bg-gray-800 transition">
                <span
                    class="text-xs bg-blue-600 rounded-full text-white px-4 py-1.5 mr-3 font-bold uppercase tracking-wider">New</span>
                <span class="text-sm font-medium italic">PinjamPro v2.0 is officially here!</span>
                <svg class="ml-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
            <h1 class="mb-6 text-5xl font-extrabold tracking-tight leading-tight text-white md:text-6xl lg:text-7xl">
                Solusi Digital untuk <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-emerald-400">Peminjaman
                    Barang</span>
            </h1>
            <p class="mb-10 text-lg font-light text-gray-400 lg:text-xl sm:px-16 xl:px-48 leading-relaxed">
                Kelola inventaris dan peminjaman dalam satu platform terpadu. Lebih cepat, transparan, dan terorganisir
                untuk instansi atau komunitas Anda.
            </p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
                <a href="#featured"
                    class="inline-flex justify-center items-center py-3.5 px-8 text-base font-semibold text-center text-white rounded-full bg-blue-600 hover:bg-blue-500 shadow-lg shadow-blue-900/20 transition-all">
                    Explore Features
                </a>
                <a href="#"
                    class="inline-flex justify-center items-center py-3.5 px-8 text-base font-semibold text-center text-gray-300 rounded-full border border-gray-700 hover:bg-gray-800 transition-all">
                    <svg class="mr-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z">
                        </path>
                    </svg>
                    Watch Demo
                </a>
            </div>
        </div>
    </section>

    <section class="bg-[#0f172a] py-24 relative" id="featured">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:px-6">
            <div class="max-w-screen-md mb-16">
                <h2 class="text-blue-500 font-bold uppercase tracking-widest text-sm mb-4">Why PinjamPro?</h2>
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-white md:text-5xl italic">Fitur Unggulan
                    yang Memudahkan Anda</h2>
                <p class="text-gray-400 font-light sm:text-xl">Dirancang khusus untuk efisiensi operasional dengan
                    teknologi terkini.</p>
            </div>

            <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-2">
                <div class="feature-card p-10 rounded-3xl bg-gray-900/50 backdrop-blur-sm">
                    <div class="w-14 h-14 bg-blue-600/20 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <h3 class="mb-3 text-2xl font-bold text-white">Manajemen Inventaris</h3>
                    <p class="text-gray-400 leading-relaxed font-light">Kelola data barang dengan sistem CRUD yang
                        intuitif. Pantau status barang (tersedia, dipinjam, atau rusak) dalam satu dashboard.</p>
                </div>

                <div class="feature-card p-10 rounded-3xl bg-gray-900/50 backdrop-blur-sm">
                    <div class="w-14 h-14 bg-emerald-600/20 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-emerald-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="mb-3 text-2xl font-bold text-white">Peminjaman Real-Time</h3>
                    <p class="text-gray-400 leading-relaxed font-light">Sistem otomasi yang mencatat waktu pinjam dan
                        kembali secara akurat. Hindari bentrokan jadwal peminjaman barang.</p>
                </div>

                <div class="feature-card p-10 rounded-3xl bg-gray-900/50 backdrop-blur-sm">
                    <div class="w-14 h-14 bg-purple-600/20 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-purple-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="mb-3 text-2xl font-bold text-white">Laporan Transparan</h3>
                    <p class="text-gray-400 leading-relaxed font-light">Ekspor data peminjaman ke format laporan yang
                        rapi. Memudahkan audit dan pelacakan riwayat barang secara digital.</p>
                </div>

                <div class="feature-card p-10 rounded-3xl bg-gray-900/50 backdrop-blur-sm">
                    <div class="w-14 h-14 bg-orange-600/20 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-orange-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="mb-3 text-2xl font-bold text-white">Keamanan Berlapis</h3>
                    <p class="text-gray-400 leading-relaxed font-light">Manajemen Role (Admin/User) yang ketat untuk
                        memastikan data hanya dapat diakses oleh pihak berwenang.</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-[#0f172a] border-t border-gray-800">
        <div class="mx-auto w-full max-w-screen-xl p-4 py-12 lg:py-16">
            <div class="md:flex md:justify-between">
                <div class="mb-6 md:mb-0">
                    <a href="#" class="flex items-center space-x-3 mb-4">
                        <span class="text-2xl font-bold text-white">Pinjam<span
                                class="text-blue-500">Pro</span></span>
                    </a>
                    <p class="max-w-xs text-gray-400 font-light italic">Menyederhanakan manajemen barang dengan
                        sentuhan teknologi modern.</p>
                </div>
                <div class="grid grid-cols-2 gap-8 sm:gap-12 sm:grid-cols-3">
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-white uppercase tracking-wider">Resources</h2>
                        <ul class="text-gray-400 font-light">
                            <li class="mb-4"><a href="#"
                                    class="hover:text-white transition">Documentation</a></li>
                            <li><a href="#" class="hover:text-white transition">Flowbite</a></li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-white uppercase tracking-wider">Follow us</h2>
                        <ul class="text-gray-400 font-light">
                            <li class="mb-4"><a href="#" class="hover:text-white transition">Github</a></li>
                            <li><a href="#" class="hover:text-white transition">Discord</a></li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-white uppercase tracking-wider">Legal</h2>
                        <ul class="text-gray-400 font-light">
                            <li class="mb-4"><a href="#" class="hover:text-white transition">Privacy
                                    Policy</a></li>
                            <li><a href="#" class="hover:text-white transition">Terms &amp; Conditions</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr class="my-10 border-gray-800" />
            <div class="sm:flex sm:items-center sm:justify-between">
                <span class="text-sm text-gray-500 sm:text-center">&copy; 2026 <a href="#"
                        class="hover:underline text-blue-500">PinjamPro</a>. All Rights Reserved.</span>
                <div class="flex mt-4 space-x-6 sm:justify-center sm:mt-0">
                    <a href="#" class="text-gray-500 hover:text-white transition"><svg class="w-5 h-5"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" />
                        </svg></a>
                    <a href="#" class="text-gray-500 hover:text-white transition"><svg class="w-5 h-5"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12.315 2c2.43 0 2.784.012 3.855.06 1.028.044 1.866.23 2.511.486a4.496 4.496 0 011.635 1.063 4.458 4.458 0 011.062 1.635c.25.646.438 1.484.482 2.511.044 1.057.058 1.412.058 3.803 0 2.391-.014 2.746-.058 3.803-.044 1.028-.23 1.866-.482 2.511a4.454 4.454 0 01-1.062 1.635 4.49 4.49 0 01-1.635 1.062c-.646.25-1.484.438-2.511.482-1.057.044-1.412.058-3.803.058-2.391 0-2.746-.014-3.803-.058-1.028-.044-1.866-.23-2.511-.482a4.49 4.49 0 01-1.635-1.062 4.454 4.454 0 01-1.062-1.635c-.25-.646-.438-1.484-.482-2.511C2.012 14.746 2 14.391 2 12c0-2.391.012-2.746.06-3.803.044-1.028.23-1.866.486-2.511a4.458 4.458 0 011.063-1.635A4.496 4.496 0 014.183 2.546c.646-.25 1.484-.438 2.511-.482C7.746 2.012 8.1 2 10.485 2h1.83zm-1.83 2h-1.83c-2.309 0-2.622.012-3.528.053-.844.039-1.3.18-1.58.29-.37.144-.633.315-.913.595-.28.28-.45.544-.595.913-.11.28-.25.736-.29 1.58-.041.906-.053 1.219-.053 3.528s.012 2.622.053 3.528c.039.844.18 1.3.29 1.58.144.37.315.633.595.913.28.28.544.45.913.595.28.11.736.25 1.58.29.906.041 1.219.053 3.528.053s2.622-.012 3.528-.053c.844-.039 1.3-.18 1.58-.29.37-.144.633-.315.913-.595.28-.28.45-.544.595-.913.11-.28.25-.736.29-1.58.041-.906.053-1.219.053-3.528s-.012-2.622-.053-3.528c-.039-.844-.18-1.3-.29-1.58-.144-.37-.315-.633-.595-.913-.28-.28-.544-.45-.913-.595-.28-.11-.736-.25-1.58-.29-.906-.041-1.219-.053-3.528-.053zM12 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z" />
                        </svg></a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>
