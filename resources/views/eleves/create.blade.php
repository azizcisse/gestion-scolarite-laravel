<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajout de Nouveaux Elèves') }}
        </h2>
    </x-slot>

    <div class="py-2 px-12">
        @livewire('creer-eleve')
        {{-- <livewire:creer-eleve /> --}}
    </div>
</x-app-layout>
