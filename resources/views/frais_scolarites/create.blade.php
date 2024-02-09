<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Enregistrement de Nouveau Frais de Scolarité') }}
        </h2>
    </x-slot>

    <div class="py-2 px-12">
        @livewire('creer-frais-scolarite')
        {{-- <livewire:creer-frais-scolarite /> --}}
    </div>
</x-app-layout>
