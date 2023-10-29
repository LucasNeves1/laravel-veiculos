<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edição de Veículo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('vehicle.update', $veiculo->id) }}" class="grid gap-x-3">
                @csrf
                @method('PUT') <!-- Use PUT method for updates -->
                <label for="brand_id" class="text-white">Marca</label>
                <select name="brand_id" id="brand_id">
                    <option value="" disabled>Selecione uma marca</option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}" {{ $brand->id == $veiculo->brand_id ? 'selected' : '' }}>{{ $brand->name }}</option>
                    @endforeach
                </select>
                <label for="model_id" class="text-white mt-3">Modelo</label>
                <select name="model_id" id="model_id">
                    <option value="" disabled>Selecione um modelo</option>
                    @foreach ($models as $model)
                        <option value="{{ $model->id }}" {{ $model->id == $veiculo->model_id ? 'selected' : '' }}>{{ $model->name }}</option>
                    @endforeach
                </select>
                <label for="price" class="text-white mt-3">Preço</label>
                <input type="number" name="price" id="price" value="{{ $veiculo->price }}">
                <label for="year" class="text-white mt-3">Ano</label>
                <input type="number" name="year" id="year" value="{{ $veiculo->year }}">
                <div>
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 mt-4">
                        Atualizar
                    </button>
                </div>     
            </form>
        </div>
    </div>
</x-app-layout>
