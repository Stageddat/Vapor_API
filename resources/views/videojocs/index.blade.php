<x-app-layout>
    <div class="py-12 bg-[#1b2838] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- missatge succcess --}}
            @if (session('success'))
                <div
                    class="mb-6 bg-blue-600 border border-blue-400 text-white px-4 py-3 rounded shadow-lg flex items-center">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="font-bold">{{ session('success') }}</span>
                </div>
            @endif
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-white uppercase tracking-wider">Tots els jocs</h1>
                <a href="{{ route('videojocs.create') }}"
                    class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-2 rounded shadow transition">
                    + Afegir nou joc
                </a>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                @forelse($jocs as $joc)
                    <div
                        class="bg-[#171a21] border border-gray-800 rounded-sm overflow-hidden shadow-lg hover:scale-105 transition duration-300 group">
                        <div class="relative aspect-[3/4] overflow-hidden">
                            <img src="{{ $joc->imatge_url ?? 'https://via.placeholder.com/300x400?text=No+Image' }}"
                                class="w-full h-full object-cover group-hover:opacity-75 transition">

                            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black p-2">
                                <span class="bg-blue-600 text-white text-xs px-2 py-1 font-bold">
                                    {{ $joc->preu }}€
                                </span>
                            </div>
                        </div>

                        <div class="p-3">
                            <h2 class="text-sm font-bold text-white truncate mb-1">{{ $joc->titol }}</h2>

                            <div class="flex justify-between items-center mt-2">
                                <a href="{{ route('videojocs.show', $joc) }}"
                                    class="text-[10px] text-gray-400 hover:text-white uppercase tracking-wider">Detalls</a>

                                @auth
                                    <div class="flex space-x-2 mt-2">
                                        <a href="{{ route('videojocs.edit', $joc) }}"
                                            class="text-yellow-500 hover:text-yellow-400">
                                            Editar
                                        </a>

                                        <form action="{{ route('videojocs.destroy', $joc) }}" method="POST"
                                            onsubmit="return confirm('Segur que vols eliminar aquest joc?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-400 ml-2">
                                                Eliminar
                                            </button>
                                        </form>
                                    </div>
                                @endauth
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-10 bg-[#171a21] rounded-lg">
                        <p class="text-gray-500 text-xl italic">No hi ha jocs disponibles.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-8">
                {{ $jocs->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
