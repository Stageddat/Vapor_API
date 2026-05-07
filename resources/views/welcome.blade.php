<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vapor - Benvingut</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#1b2838] text-white font-sans min-h-screen flex flex-col">
    <div class="flex-1 flex flex-col items-center justify-center">
        <div class="mb-8 text-center">
            <h1
                class="text-9xl font-black tracking-tighter text-transparent bg-clip-text bg-gradient-to-b from-blue-400 to-blue-600">
                VAPOR
            </h1>
            <p class="text-[15px] text-blue-400 font-mono tracking-[0.4em] uppercase mt-1">Versió 2.9.9</p>
        </div>

        <div class="text-center mb-10">
            <h2 class="text-2xl font-light text-gray-400">La teva nova botiga de videojocs de confiança</h2>
            <h2 class="text-xl font-light text-gray-500 italic">El pastís és una mentida</h2>
        </div>

        <div class="flex space-x-4">
            <a href="{{ route('videojocs.index') }}"
                class="bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-500 hover:to-blue-400 px-10 py-4 rounded-sm font-bold shadow-lg transition duration-300 transform hover:scale-105">
                ENTRAR A LA BOTIGA
            </a>

            @guest
                <a href="{{ route('login') }}"
                    class="border border-gray-600 hover:bg-gray-800 px-10 py-4 rounded-sm font-bold transition duration-300">
                    INICIAR SESSIÓ
                </a>
            @endguest
        </div>
    </div>

    <footer class="py-6 text-center text-gray-600 text-xs">
        <p>&copy; 2026 Vavel Corporation. Tots els drets reservats.</p>
    </footer>
</body>

</html>
