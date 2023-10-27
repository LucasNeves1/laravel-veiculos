<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cadastro de nova marca') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form method="POST" action="{{ route('criar_marca') }}" class="mt-6 space-y-6">
            @csrf
            <div>
                <x-input-label for="name" :value="__('Nome da marca')"/>
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>
            <!-- <label for="name" class="text-white">Nome da marca</label>
            <input type="string" class="caret-black py-2 px-4 border" placeholder="Marca" name="name" id="name"> -->
            <x-primary-button>{{ __('Salvar') }}</x-primary-button>
            <!-- <button class="bg-transparent text-white font-semibold hover:text-white py-2 px-4 border border-white hover:border-transparent rounded">Salvar</button> -->
        </form>
        </div>
    </div>
</x-app-layout>
