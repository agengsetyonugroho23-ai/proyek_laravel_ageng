<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'SIM-Surat')</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        <style type="text/tailwindcss">
            @theme {
                --font-sans: 'Inter', ui-sans-serif, system-ui, sans-serif;
            }
        </style>
    </head>
    <body class="font-sans bg-gradient-to-br from-slate-50 via-indigo-50/40 to-slate-100 min-h-screen text-slate-800 flex flex-col antialiased">

        @php
            $menus = [
                ['label' => 'Dashboard',   'route' => 'dashboard',          'active' => 'dashboard'],
                ['label' => 'Surat Masuk', 'route' => 'surat-masuk.index',  'active' => 'surat-masuk.*'],
                ['label' => 'Surat Keluar','route' => 'surat-keluar.index', 'active' => 'surat-keluar.*'],
            ];
        @endphp

        <!-- Header / Navbar -->
        <header class="bg-white/80 backdrop-blur-md border-b border-slate-200/70 sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16 items-center">

                    <!-- Logo + Menu -->
                    <div class="flex items-center gap-8">
                        <a href="{{ route('dashboard') }}" class="flex items-center gap-2.5">
                            <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-gradient-to-br from-indigo-600 to-blue-500 text-white shadow-md shadow-indigo-500/30">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </span>
                            <span class="font-bold text-lg tracking-tight text-slate-800">SIM<span class="text-indigo-600">-Surat</span></span>
                        </a>

                        <nav class="hidden md:flex items-center gap-1">
                            @foreach ($menus as $menu)
                                <a href="{{ route($menu['route']) }}"
                                   class="px-3.5 py-2 rounded-lg text-sm font-medium transition
                                   {{ request()->routeIs($menu['active']) ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600 hover:text-indigo-600 hover:bg-slate-100' }}">
                                    {{ $menu['label'] }}
                                </a>
                            @endforeach
                        </nav>
                    </div>

                    <!-- User & Keluar -->
                    <div class="flex items-center gap-3">
                        @auth
                            <div class="hidden sm:flex items-center gap-2.5">
                                <span class="flex h-9 w-9 items-center justify-center rounded-full bg-indigo-100 text-indigo-700 text-sm font-bold">
                                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                </span>
                                <div class="leading-tight">
                                    <p class="text-xs text-slate-500">Masuk sebagai</p>
                                    <p class="text-sm font-semibold text-slate-800">{{ auth()->user()->name }}</p>
                                </div>
                            </div>
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="text-sm bg-red-50 text-red-600 hover:bg-red-600 hover:text-white px-4 py-2 rounded-lg transition font-semibold cursor-pointer">
                                    Keluar
                                </button>
                            </form>
                        @endauth
                    </div>

                </div>

                <!-- Menu versi HP -->
                <nav class="md:hidden flex gap-1 pb-3 overflow-x-auto">
                    @foreach ($menus as $menu)
                        <a href="{{ route($menu['route']) }}"
                           class="whitespace-nowrap px-3.5 py-1.5 rounded-full text-sm font-medium transition
                           {{ request()->routeIs($menu['active']) ? 'bg-indigo-600 text-white' : 'bg-slate-100 text-slate-600' }}">
                            {{ $menu['label'] }}
                        </a>
                    @endforeach
                </nav>
            </div>
        </header>

        <!-- Konten Utama -->
        <main class="max-w-7xl w-full mx-auto py-8 px-4 sm:px-6 lg:px-8 flex-grow">
            <div class="bg-white rounded-3xl shadow-xl shadow-slate-200/60 ring-1 ring-slate-200/70 p-6 md:p-10">
                @yield('content')
            </div>
        </main>

        <!-- Footer -->
        <footer class="py-6 mt-8">
            <div class="max-w-7xl mx-auto px-4 text-center text-sm text-slate-500">
                <p>&copy; 2026 Sistem Informasi Surat. All rights reserved.</p>
            </div>
        </footer>

    </body>
</html>