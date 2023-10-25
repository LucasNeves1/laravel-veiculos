<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cadastro de novo modelo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form method="POST" action="{{ route('criar_modelo') }}" class="grid gap-x-3">
            @csrf
            <label for="name" class="text-white">Nome do modelo</label>
            <input type="string" class="caret-black py-2 px-4 border" placeholder="Nome do modelo" name="name" id="name">
            <label for="name" class="text-white">Marca relacionada</label>
            <select name="brand_id" id="brand_id">
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</li>
                @endforeach
            </select>
            <button class="bg-transparent text-white font-semibold hover:text-white py-2 px-4 border border-white hover:border-transparent rounded">Salvar</button>
        </form>
        </div>
    </div>
</x-app-layout>
