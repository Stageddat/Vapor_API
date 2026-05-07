<x-app-layout>
    <div class="py-12 bg-[#1b2838] min-h-screen text-white">
        <div class="max-w-3xl mx-auto p-8 bg-[#171a21] rounded-lg">
            <h1 class="text-2xl font-bold mb-6 italic">{{ $title }}</h1>

            <form action="{{ $route }}" method="POST">
                @csrf

                @if ($videojoc->id)
                    @method('PUT')
                @endif

                <div class="mb-4">
                    <label class="block mb-1">Títol</label>
                    <input type="text" name="titol" value="{{ old('titol', $videojoc->titol) }}"
                        class="w-full bg-[#2a3f5a] border-none rounded text-white focus:ring-blue-500">
                </div>

                <div class="mb-4">
                    <label class="block mb-1">Descripció</label>
                    <textarea name="descripcio" rows="3"
                        class="w-full bg-[#2a3f5a] border-none rounded text-white focus:ring-blue-500">{{ old('descripcio', $videojoc->descripcio) }}</textarea>
                </div>

                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-400">Preu (€)</label>
                        <input type="number" name="preu" step="0.01" min="0"
                            value="{{ old('preu', $videojoc->preu) }}"
                            class="w-full bg-[#2a3f5a] border-gray-700 text-white rounded shadow-sm focus:border-blue-500">
                        @error('preu')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-gray-400">Stock</label>
                        <input type="number" name="stock" min="0" value="{{ old('stock', $videojoc->stock) }}"
                            class="w-full bg-[#2a3f5a] border-gray-700 text-white rounded shadow-sm focus:border-blue-500">
                        @error('stock')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block mb-1">URL de la Imatge</label>
                    <input type="text" name="imatge_url" value="{{ old('imatge_url', $videojoc->imatge_url) }}"
                        placeholder="https://hola.com/hola.jpg"
                        class="w-full bg-[#2a3f5a] border-none rounded text-white focus:ring-blue-500">
                </div>

                <div class="flex items-center justify-between">
                    <a href="{{ route('videojocs.index') }}"
                        class="text-gray-400 hover:text-white transition">Tornar</a>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-500 px-6 py-2 rounded font-bold transition">
                        {{ $textButton }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
