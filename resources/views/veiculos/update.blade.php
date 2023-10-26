<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edição de Veículo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('atualizar_veiculo', $veiculo->id) }}" class="grid gap-x-3">
                @csrf
                @method('PUT') <!-- Use PUT method for updates -->
                <label for="brand_id" class="text-white">Marca</label>
                <select name="brand_id" id="brand_id">
                    <option value="" disabled>Selecione uma marca</option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}" {{ $brand->id == $veiculo->brand_id ? 'selected' : '' }}>{{ $brand->name }}</option>
                    @endforeach
                </select>
                <label for="model_id" class="text-white">Modelo</label>
                <select name="model_id" id="model_id">
                    <option value="" disabled>Selecione um modelo</option>
                    @foreach ($models as $model)
                        <option value="{{ $model->id }}" {{ $model->id == $veiculo->model_id ? 'selected' : '' }}>{{ $model->name }}</option>
                    @endforeach
                </select>
                <label for="price" class="text-white">Preço</label>
                <input type="number" name="price" id="price" value="{{ $veiculo->price }}">
                <label for="year" class="text-white">Ano</label>
                <input type="number" name="year" id="year" value="{{ $veiculo->year }}">
                <button class="bg-transparent text-white font-semibold hover:text-white py-2 px-4 border border-white hover:border-transparent rounded">Atualizar</button>
            </form>
            <form action="{{ route('veiculos.destroy', $veiculo) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este veículo?')">Excluir</button>
            </form>
        </div>
    </div>
</x-app-layout>
