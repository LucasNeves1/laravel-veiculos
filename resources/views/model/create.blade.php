<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cadastro de novo modelo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form method="POST" action="{{ route('model.create') }}" class="grid">
            @csrf
            <label for="name" class="text-white">Nome do modelo</label>
            <input type="string" class="caret-black py-2 px-4 border" placeholder="Nome do modelo" name="name" id="name" required>
            <label for="name" class="text-white mt-3">Marca relacionada</label>
            <select name="brand_id" id="brand_id" required>
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</li>
                @endforeach
            </select>
            <div>
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 mt-4">
                    Salvar
                </button>
            </div>
        </form>
        </div>
    </div>
</x-app-layout>
