<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Voxel Positions</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-pixel_positions text-white font-hanken-grotesk">
    
    <div class="px-10">
        <nav class="flex justify-between items-center py-4">
            <div>
                <a href="/">
                    <img width="100px" src="{{ Vite::asset('resources/images/logo.svg') }}" alt="">
                </a>
            </div>

            <div class="space-x-6 font-bold">
                <a href="">Jobs</a>
                <a href="">Careers</a>
                <a href="">Salaries</a>
                <a href="">Companies</a>
            </div>

            @auth
                <div class="flex space-x-5">
                    <a href="/jobs/create" class="inline-flex items-center gap-x-2">
                        <span class="w-2 h-2 bg-blue-600 inline-block"></span>
                        Post a job
                    </a>
                    <form action="logout" method="post">
                        @csrf
                        @method('DELETE')
                        
                        <x-forms.button type="submit">Log Out</x-forms.button>
    
                    </form>
                </div>

            @endauth

            @guest
                <div class="space-x-6 font-bold">
                    <a href="/register">Sign Up</a>
                    <a href="login">Log In</a>
                </div>
            @endguest

        </nav>

        <main class="mt-10 max-w-[986px] mx-auto">

            @if (session('success'))
                <x-flash-message status="success" :msg="session('success')" />
            @endif
            
            @if (session('error'))
                <x-flash-message status="error" :msg="session('error')" />
            @endif

            @if (session('info'))
                <x-flash-message status="info" :msg="session('info')" />
            @endif

            {{ $slot }}
        </main>
    </div>

    <div class="mt-20">
        <div class="flex gap-2 px-2 py-3 bg-gradient-to-r from-white/10 to-indigo-500/50">
            Made with <x-tni-heart-circle class="text-red-600 size-5" /> by Surath
        </div>
    </div>

</body>
</html>