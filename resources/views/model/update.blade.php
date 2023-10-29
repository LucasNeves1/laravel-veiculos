<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar modelo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('model.update', $model->id) }}" class="grid gap-3">
                @csrf
                @method('PUT')
                <label for="name" class="text-white">Nome do modelo</label>
                <input type="text" class="py-2 px-4 border" placeholder="Nome do modelo" name="name" id="name" value="{{ $model->name }}">
                
                <label for="brand_id" class="text-white">Marca relacionada</label>
                <select name="brand_id" id="brand_id">
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}" {{ $model->brand_id == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                    @endforeach
                </select>

                <button type="submit" class="bg-transparent text-white font-semibold hover:text-white py-2 px-4 border border-white hover:border-transparent rounded">Salvar</button>
            </form>
        </div>
    </div>
</x-app-layout>
