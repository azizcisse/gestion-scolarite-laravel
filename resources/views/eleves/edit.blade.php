<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edition d\'Un Elève') }}
        </h2>
    </x-slot>

    <div class="py-2 px-12">
        @livewire('edit-eleve', ['eleve' => $eleve])
        {{-- <livewire:edit-eleve /> --}}
    </div>
</x-app-layout>
