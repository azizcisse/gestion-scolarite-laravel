<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestion des Frais de Scolarité de l\'Année en Cours') }}
        </h2>
    </x-slot>

    <div class="py-2 px-12">
        @livewire('liste-frais-scolarite')
        {{-- <livewire:liste-frais-scolarite /> --}}
    </div>
</x-app-layout>
