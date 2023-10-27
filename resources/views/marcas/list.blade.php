<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Modelos') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto">
        @foreach ($brands as $brand)
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <span>{{ $brand->name }}</span>
            </div>
        </div>
        @endforeach
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 text-white lg:px-8">
            <table class="table-fixed mt-6">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>Nome da marca</th>
                    <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($brands as $brand)
                            <td>{{ $brand->id }}</td>
                            <td>{{ $brand->name }}</td>
                            <td>
                                <form action="{{ route('brand.destroy', $brand) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Tem certeza que deseja excluir esta marca?')">Excluir</button>
                                </form><a href="{{ route('update_brand', $brand) }}">Editar</a></td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
