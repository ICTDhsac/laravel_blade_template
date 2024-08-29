<!DOCTYPE html>
<html lang="en" data-theme="cupcake">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ env("APP_NAME") }} | Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-base-100">

    <!-- Top Navigation Bar -->
    <header class="bg-slate-800 text-white shadow-lg">
        <nav class="flex justify-between items-center p-4">
            <div class="flex items-center gap-4">
                <button id="sidebar-toggle" class="text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                <a href="{{ route('home') }}" class="text-xl font-semibold">Admin Dashboard</a>
            </div>
            <div class="flex items-center gap-4">
                <a href="#" class="nav-link">Notifications</a>
                <a href="#" class="nav-link">Profile</a>
                <a href="{{ route('login') }}" class="nav-link">Login</a>
                <a href="{{ route('register') }}" class="nav-link">Register</a>
            </div>
        </nav>
    </header>

    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside id="sidebar" class="w-64 bg-base-200 shadow-lg">
            <ul class="menu p-4 overflow-y-auto">
                <li class="menu-title">
                    <span>Main Menu</span>
                </li>
                <li>
                    <a href="{{ route('home')}}"
                        class="{{ Request::is('home*') ? 'active' : '' }}">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('login')}}"
                        class="{{ Request::is('login*') ? 'active' : '' }}">
                        Login
                    </a>
                </li>
                <li><a href="#">Users</a></li>
                <li><a href="#">Settings</a></li>
                <li class="menu-title mt-4">
                    <span>Other</span>
                </li>
                <li><a href="#">Reports</a></li>
                <li><a href="#">Help</a></li>
            </ul>
        </aside>

        <!-- Main Content Area -->
        <main class="w-full p-6 bg-base-100">
            {{ $slot }} 
        </main>
    </div>

    <script>
        // Toggle sidebar visibility on mobile devices
        document.getElementById('sidebar-toggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('hidden');
        });
    </script>
</body>
</html>
