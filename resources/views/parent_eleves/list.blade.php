<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des Parents d\'Elève') }}
        </h2>
    </x-slot>

    <div class="py-2 px-12">
        @livewire('liste-parent-eleve')
        {{-- <livewire:liste-parent-eleve /> --}}
    </div>
</x-app-layout>
