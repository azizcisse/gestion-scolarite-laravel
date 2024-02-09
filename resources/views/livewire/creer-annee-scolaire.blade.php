<div class="p-2 bg-white shadow-sm">

    <form action="POST" wire:submit.prevent="store"> @csrf @method('post')
        @if (Session::get('error'))
            <div class="p-5">
                <div class="p-4 border-red-500 bg-red-600 animate-bounce text-white">{{ Session::get('error') }}</div>
            </div>
        @endif

        <div class="p-5 flex flex-col">
            <x-jet-label value="{{ __('Libellé Année Scolaire') }}" />
            <input type="text" placeholder="Entrer Année Scolaire Exemple: 202x-2024"
                class="block mt-1 rounded-sm border-gray-300 w-full
                @error('libelle') border-red-500 bg-red-100 animate-bounce @enderror"
                wire:model="libelle" name="libelle">

            @error('libelle')
                <div class="text text-red-500 mt-2">*Le champ Libellé est requis.</div>
            @enderror
        </div>

        <div class="p-5 flex justify-between items-center mt-5 bg-gray-100">
            <button class="bg-red-600 p-3 rounded-sm text-white text-sm" type="reset">Annuler</button>
            <button class="bg-green-500 p-3 rounded-sm text-white text-sm" type="submit">Enregistrer</button>
        </div>
    </form>
</div>
