<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edition d\'Un Niveau Scolaire') }}
        </h2>
    </x-slot>

    <div class="py-2 px-12">
        @livewire('edit-classe-scolaire', ['classeScolaire' => $classeScolaire])
        {{-- <livewire:edit-classe-scolaire /> --}}
    </div>
</x-app-layout>
