<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cadastro de novo veículo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('vehicle.create') }}" class="grid gap-x-3">
                @csrf
                <label for="brand_id" class="text-white">Marca</label>
                <select name="brand_id" id="brand_id" required>
                    <option value="" disabled selected>Selecione uma marca</option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</li>
                    @endforeach
                </select>
                <label for="model_id" class="text-white mt-3">Modelo</label>
                <select name="model_id" id="model_id" required>
                    @if ($models->count() > 0) 
                        <option value="" disabled selected>Selecione um modelo</option>
                        @foreach ($models as $model)
                            <option value="{{ $model->id }}">{{ $model->name }}</li>
                        @endforeach
                    @else 
                        <option value="">Nenhum modelo cadastrado.</option>
                    @endif
                </select>
                <label for="price" class="text-white mt-3">Preço</label>
                <input type="number" name="price" id="price" required>
                <label for="year" class="text-white mt-3">Ano</label>
                <input type="number" name="year" id="year" required>
                <div>
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 mt-4">
                        Salvar
                    </button>
                </div>        
            </form>
        </div>
    </div>
</x-app-layout>
