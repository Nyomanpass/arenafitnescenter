<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ARENA FITNESS CENTER | Member Access</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&family=Poppins:wght@300;400;600;800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    
    <style>
        [x-cloak] { display: none !important; }
        
        /* Efek Grain/Texture agar background tidak flat */
        .bg-texture {
            background-image: url("https://www.transparenttextures.com/patterns/carbon-fibre.png");
            opacity: 0.05;
        }

        /* Custom Selection Color */
        ::selection {
            background-color: #facc15; /* Yellow-400 */
            color: #000;
        }
    </style>
</head>
<body class="font-poppins antialiased bg-[#050505] text-white overflow-x-hidden">
    
    <div class="fixed inset-0 z-0">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,_rgba(250,204,21,0.08)_0%,_rgba(0,0,0,1)_100%)]"></div>
        <div class="absolute inset-0 bg-texture"></div>
    </div>

    <main class="relative z-10 min-h-[100dvh] flex items-center justify-center p-4">
        <div class="w-full transition-all duration-500 ease-in-out">
            {{ $slot }}
        </div>
    </main>

    <footer class="absolute bottom-6 w-full text-center z-10">
        <p class="text-[10px] tracking-[0.5em] text-zinc-600 uppercase">
            Built for Champions • Arena Fitness
        </p>
    </footer>

    @livewireScripts
</body>
</html>