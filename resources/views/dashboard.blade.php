<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-4 gap-4">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <a href="{{ url('/veiculos/novo') }}">Cadastrar veículos</a>
                    </div>
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <a href="{{ url('/veiculos') }}">Listar veículos</a>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <a href="{{ url('/marcas/nova') }}">Cadastrar marcas</a>
                    </div>
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <a href="{{ url('/marcas') }}">Listar marcas</a>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <a href="{{ url('/modelos/novo') }}">Cadastrar modelos</a>
                    </div>
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <a href="{{ url('/modelos') }}">Listar modelos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
