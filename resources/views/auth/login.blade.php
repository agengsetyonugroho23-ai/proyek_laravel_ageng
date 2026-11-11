<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login SIM-Surat</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style type="text/tailwindcss">
        @theme {
            --font-sans: 'Inter', ui-sans-serif, system-ui, sans-serif;
        }
    </style>
</head>
<body class="font-sans antialiased min-h-screen flex items-center justify-center p-4 bg-gradient-to-br from-indigo-600 via-indigo-700 to-blue-600 relative overflow-hidden">

    <!-- Dekorasi latar -->
    <div class="absolute -top-24 -left-24 h-72 w-72 rounded-full bg-white/10 blur-2xl"></div>
    <div class="absolute -bottom-24 -right-24 h-80 w-80 rounded-full bg-blue-300/20 blur-2xl"></div>

    <div class="relative w-full max-w-md">

        <!-- Logo -->
        <div class="mb-6 text-center">
            <span class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-white/15 text-white ring-1 ring-white/30 backdrop-blur">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </span>
        </div>

        <!-- Kartu login -->
        <div class="rounded-3xl bg-white p-8 sm:p-10 shadow-2xl shadow-indigo-900/30">
            <h1 class="text-2xl font-extrabold tracking-tight text-slate-800">Login SIM-Surat</h1>
            <p class="mt-1 text-sm text-slate-500">Masuk untuk mengelola surat masuk dan surat keluar.</p>

            <form method="POST" action="{{ route('login.submit') }}" class="mt-8 space-y-5">
                @csrf

                <div>
                    <label class="mb-1.5 block text-sm font-semibold text-slate-700">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                           class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-800 placeholder-slate-400 outline-none transition focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-100"
                           placeholder="nama@email.com">
                    @error('email')
                        <p class="mt-1.5 text-sm font-medium text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="mb-1.5 block text-sm font-semibold text-slate-700">Password</label>
                    <input type="password" name="password"
                           class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-800 placeholder-slate-400 outline-none transition focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-100"
                           placeholder="••••••••">
                    @error('password')
                        <p class="mt-1.5 text-sm font-medium text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                        class="w-full cursor-pointer rounded-xl bg-gradient-to-r from-indigo-600 to-blue-500 px-4 py-3 text-sm font-bold text-white shadow-lg shadow-indigo-500/30 transition hover:-translate-y-0.5 hover:shadow-xl hover:shadow-indigo-500/40 active:translate-y-0">
                    Masuk
                </button>
            </form>
        </div>

        <p class="mt-6 text-center text-xs text-indigo-100">&copy; 2026 Sistem Informasi Surat</p>
    </div>

</body>
</html>