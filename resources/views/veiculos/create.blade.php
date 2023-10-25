<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cadastro de novo veículo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form method="POST" action="{{ route('criar_veiculo') }}" class="grid gap-x-3">
            @csrf
            <label for="brand_id" class="text-white">Marca</label>
            <select name="brand_id" id="brand_id">
                <option value="" disabled selected>Selecione uma marca</option>
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</li>
                @endforeach
            </select>
            <label for="model_id" class="text-white">Modelo</label>
            <select name="model_id" id="model_id">
                @if ($models->count() > 0) 
                    <option value="" disabled selected>Selecione um modelo</option>
                    @foreach ($models as $model)
                        <option value="{{ $model->id }}">{{ $model->name }}</li>
                    @endforeach
                @else 
                    <option value="">Nenhum modelo cadastrado.</option>
                @endif
            </select>
            <label for="price">Preço</label>
            <input type="number" name="price" id="price">
            <label for="year">Ano</label>
            <input type="number" name="year" id="year">
            <button class="bg-transparent text-white font-semibold hover:text-white py-2 px-4 border border-white hover:border-transparent rounded">Salvar</button>
        </form>
        </div>
    </div>
</x-app-layout>
