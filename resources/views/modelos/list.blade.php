<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Modelos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 text-white lg:px-8">
            <table class="table-fixed">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>Modelo</th>
                    <th>Marca associada</th>
                    <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($models as $model)
                            <td>{{ $model->id }}</td>
                            <td>{{ $model->brand_id }}</td>
                            <td>
                                <form action="{{ route('modelo.destroy', $model) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este veículo?')">Excluir</button>
                                </form><a href="{{ route('atualizar_modelo', $model) }}">Editar</a></td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
