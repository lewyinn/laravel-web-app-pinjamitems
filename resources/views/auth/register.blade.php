<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | PinjamPro</title>

    <link rel="icon" type="image/png" href="{{ asset('assets/img/Avatar.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background-color: #0f172a;
            font-family: 'Inter', sans-serif;
        }

        .bg-modern {
            background: radial-gradient(circle at top right, #1e1b4b, #0f172a);
        }

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
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                </svg>
            </div>
            Pinjam<span class="text-blue-500">Pro</span>
        </a>

        <div class="w-full glass-card rounded-2xl shadow-2xl sm:max-w-md xl:p-0">
            <div class="p-8 space-y-6">
                <div class="text-center">
                    <h1 class="text-2xl font-extrabold text-white">Create Account</h1>
                    <p class="text-gray-400 mt-2 font-light">Join PinjamPro and start managing items</p>
                </div>

                <form class="space-y-4" method="POST" action="{{ route('register.post') }}">
                    @csrf
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-300">Full Name</label>
                        <input type="text" name="name" id="name"
                            class="bg-gray-800/50 border border-gray-700 text-white rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-full p-3 transition"
                            placeholder="John Doe" required>
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-300">Email Address</label>
                        <input type="email" name="email" id="email"
                            class="bg-gray-800/50 border border-gray-700 text-white rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-full p-3 transition"
                            placeholder="name@company.com" required>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-300">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-800/50 border border-gray-700 text-white rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-full p-3 transition"
                                required>
                        </div>
                        <div>
                            <label for="password_confirmation"
                                class="block mb-2 text-sm font-medium text-gray-300">Confirm</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                placeholder="••••••••"
                                class="bg-gray-800/50 border border-gray-700 text-white rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-full p-3 transition"
                                required>
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full text-white bg-blue-600 hover:bg-blue-500 font-bold rounded-xl text-md px-5 py-3.5 text-center mt-4 transition-all shadow-lg shadow-blue-900/20">
                        Register Now
                    </button>

                    <p class="text-sm font-light text-gray-400 text-center">
                        Already have an account? <a href="/login"
                            class="font-semibold text-blue-500 hover:underline">Login here</a>
                    </p>
                </form>
            </div>
        </div>
    </section>

    @if (session('success') || session('error') || $errors->any())
    <div id="toast-container" class="fixed top-5 right-5 z-[100] space-y-3">

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="flex items-center w-full max-w-xs p-4 text-gray-300 bg-gray-800 rounded-xl shadow-2xl border-l-4 border-red-500" role="alert">
                    <div class="ms-3 text-sm font-medium">{{ $error }}</div>
                </div>
            @endforeach
        @endif

        @if (session('error'))
            <div class="flex items-center w-full max-w-xs p-4 text-gray-300 bg-gray-800 rounded-xl shadow-2xl border-l-4 border-red-500" role="alert">
                <div class="ms-3 text-sm font-medium">{{ session('error') }}</div>
            </div>
        @endif

        @if (session('success'))
            <div id="toast-success" class="flex items-center w-full max-w-xs p-4 text-gray-300 bg-gray-800 rounded-xl shadow-2xl border-l-4 border-green-500" role="alert">
                <div class="ms-3 text-sm font-medium">{{ session('success') }}</div>
            </div>
        @endif
    </div>
@endif

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>
