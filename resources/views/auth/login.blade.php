<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | PinjamPro</title>

    <link rel="icon" type="image/png" href="{{ asset('assets/img/Avatar.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body { background-color: #0f172a; font-family: 'Inter', sans-serif; }
        .bg-modern { background: radial-gradient(circle at top right, #1e1b4b, #0f172a); }
        .glass-card {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>
</head>
<body class="bg-modern text-white">
    <section class="min-h-screen flex flex-col items-center justify-center px-6 py-8 mx-auto lg:py-0">
        <a href="/" class="flex items-center mb-8 text-3xl font-bold tracking-tight text-white">
            <div class="bg-blue-600 p-2 rounded-lg mr-3">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>
            </div>
            Pinjam<span class="text-blue-500">Pro</span>
        </a>

        <div class="w-full glass-card rounded-2xl shadow-2xl sm:max-w-md xl:p-0">
            <div class="p-8 space-y-6">
                <div class="text-center">
                    <h1 class="text-2xl font-extrabold leading-tight tracking-tight md:text-3xl text-white">
                        Welcome Back
                    </h1>
                    <p class="text-gray-400 mt-2 font-light">Enter your credentials to access PinjamPro</p>
                </div>

                <form class="space-y-5" action="{{ route('login.post') }}" method="POST">
                    @csrf
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-300">Email Address</label>
                        <input type="email" name="email" id="email" class="bg-gray-800/50 border border-gray-700 text-white rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-full p-3 transition" placeholder="name@company.com" required>
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-300">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-800/50 border border-gray-700 text-white rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-full p-3 transition" required>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="remember" type="checkbox" class="w-4 h-4 border border-gray-700 rounded bg-gray-800 focus:ring-3 focus:ring-blue-900" >
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="remember" class="text-gray-400">Remember me</label>
                            </div>
                        </div>
                        <a href="#" class="text-sm font-medium text-blue-500 hover:underline">Forgot password?</a>
                    </div>

                    <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-800 font-bold rounded-xl text-md px-5 py-3.5 text-center transition-all shadow-lg shadow-blue-900/20">
                        Sign In
                    </button>

                    <p class="text-sm font-light text-gray-400 text-center">
                        Don’t have an account? <a href="/register" class="font-semibold text-blue-500 hover:underline">Create Account</a>
                    </p>
                </form>
            </div>
        </div>
    </section>

    @if (session('success') || session('error') || $errors->any())
        <div id="toast-container" class="fixed top-5 right-5 z-[100] space-y-3">
            @if (session('success'))
                <div id="toast-success" class="flex items-center w-full max-w-xs p-4 text-gray-300 bg-gray-800 rounded-xl shadow-2xl border-l-4 border-green-500" role="alert">
                    <div class="ms-3 text-sm font-medium">{{ session('success') }}</div>
                    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-transparent text-gray-500 hover:text-white p-1.5 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#toast-success">
                        <svg class="w-3 h-3" fill="none" viewBox="0 0 14 14"><path stroke="currentColor" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/></svg>
                    </button>
                </div>
            @endif
            </div>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>
</html>
