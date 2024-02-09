<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestion des Niveaux Scolaires') }}
        </h2>
    </x-slot>

    <div class="py-2 px-12">
        @livewire('liste-niveaux')
        {{-- <livewire:liste-niveaux /> --}}
    </div>
</x-app-layout>
