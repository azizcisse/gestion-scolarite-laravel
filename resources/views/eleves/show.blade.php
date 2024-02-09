<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Information de l\'Elève') }}
        </h2>
    </x-slot>

    <div class="py-2 px-12">
        @livewire('show-eleve', ['eleve' => $eleve])
        {{-- <livewire:show-eleve /> --}}
    </div>
</x-app-layout>