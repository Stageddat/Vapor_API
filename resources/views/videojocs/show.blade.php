<x-app-layout>
    <div class="py-12 bg-[#1b2838] min-h-screen text-white">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- missatge exit --}}
            @if (session('success'))
                <div
                    class="mb-6 bg-green-600 border border-green-500 text-white px-4 py-3 rounded relative shadow-lg flex items-center">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span class="font-bold">{{ session('success') }}</span>
                </div>
            @endif

            <div class="mb-6">
                <a href="{{ route('videojocs.index') }}" class="text-blue-400 hover:underline">
                    &larr; Tornar a la botiga
                </a>
            </div>

            <div class="bg-[#171a21] rounded shadow-2xl overflow-hidden border border-gray-800">
                <div class="md:flex">
                    <div class="md:w-1/3">
                        <img src="{{ $videojoc->imatge_url ?? 'https://via.placeholder.com/600x800?text=Sense+Imatge' }}"
                            alt="{{ $videojoc->titol }}" class="w-full h-full object-cover shadow-inner">
                    </div>

                    <div class="md:w-2/3 p-8">
                        <h1 class="text-4xl font-black italic mb-4 uppercase">{{ $videojoc->titol }}</h1>

                        <div class="bg-[#2a3f5a] inline-block px-4 py-1 rounded-sm mb-6">
                            <span class="text-2xl font-bold text-blue-400">{{ $videojoc->preu }}€</span>
                        </div>

                        <div class="mb-8">
                            <h3 class="text-gray-500 font-bold uppercase text-xs tracking-widest mb-2">Sobre aquest joc
                            </h3>
                            <p class="text-gray-300 leading-relaxed">
                                {{ $videojoc->descripcio }}
                            </p>
                        </div>

                        <div class="border-t border-gray-800 pt-6 flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500 uppercase font-bold">Stock disponible</p>
                                <p class="text-xl {{ $videojoc->stock > 0 ? 'text-green-500' : 'text-red-500' }}">
                                    {{ $videojoc->stock }} unitats
                                </p>
                            </div>

                            @auth
                                <div class="flex space-x-3">
                                    <a href="{{ route('videojocs.edit', $videojoc) }}"
                                        class="bg-gray-700 hover:bg-gray-600 px-6 py-2 rounded font-bold transition">
                                        Editar
                                    </a>
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
