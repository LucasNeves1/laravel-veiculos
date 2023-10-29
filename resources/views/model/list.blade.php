<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Modelos') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            @foreach ($models as $model)
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-3 mb-3">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex justify-between">
                    <span>{{ $model->name }} - {{ $model->brand->name }}</span>
                    <div class="flex">
                        <a href="{{ route('model.update', $model) }}">Editar</a>
                        <form action="{{ route('model.destroy', $model) }}" class="ml-4" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este modelo?')">Excluir</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="mt-4">
                <a href="{{ url('/marcas/nova') }}">
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        Cadastrar nova
                    </button>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
