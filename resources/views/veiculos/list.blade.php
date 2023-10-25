<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Veiculos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 text-white lg:px-8">
            <table class="table-fixed">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Ano</th>
                    <th>Preço</th>
                    <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($vehicles as $vehicle)
                            <td>{{ $vehicle->id }}</td>
                            <td>{{ $vehicle->brand->name }}</td>
                            <td>{{ $vehicle->model->name }}</td>
                            <td>{{ $vehicle->year }}</td>
                            <td>{{ $vehicle->price }}</td>
                            <td>
                                <form action="{{ route('veiculos.destroy', $vehicle) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este veículo?')">Excluir</button>
                                </form><a href="{{ route('atualizar_veiculo', $vehicle) }}">Editar</a></td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
            <ul>
                @foreach ($vehicles as $vehicle)
                    <li class="bg-gray-800 py-2 px-4">{{ $vehicle->brand->name }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>
