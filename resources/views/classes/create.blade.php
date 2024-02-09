<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Création d\'Une Classe') }}
        </h2>
    </x-slot>

    <div class="py-2 px-12">
        @livewire('creer-classe')
        {{-- <livewire:creer-classe /> --}}
    </div>
</x-app-layout>
