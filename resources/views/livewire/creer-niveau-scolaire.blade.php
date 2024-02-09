<div class="p-2 bg-white shadow-sm">

    <form action="POST" wire:submit.prevent="store"> @csrf @method('post')
        @if (Session::get('error'))
            <div class="p-5">
                <div class="p-4 border-red-500 bg-red-600 animate-bounce text-white">
                    {{ Session::get('error') }}</div>
            </div>
        @endif

        <div class="p-5 flex flex-col gap-4">
           <div class="block mb-5">
            <x-jet-label value="{{ __('Code Niveau Scolaire') }}" />
            <input type="text" placeholder="Entrer le Code"
                class="block mt-1 rounded-sm border-gray-300 w-full
                @error('code') border-red-500 bg-red-100 animate-bounce @enderror"
                wire:model="code" name="code">

            @error('code')
                <div class="text text-red-500 mt-2"> {{ $message }}</div>
            @enderror
           </div>

           <div class="block mb-5">
            <x-jet-label value="{{ __('Libellé Année Scolaire') }}" />
            <input type="text" placeholder="Entrer Libellé Niveau Scolaire"
                class="block mt-1 rounded-sm border-gray-300 w-full
                @error('libelle') border-red-500 bg-red-100 animate-bounce @enderror"
                wire:model="libelle" name="libelle">

            @error('libelle')
                <div class="text text-red-500 mt-2">*Le champ Libellé Niveau est requis.</div>
            @enderror
           </div>

           <div class="block mb-5">
            <x-jet-label value="{{ __('Montant Scolarité') }}" />
            <input type="text" placeholder="Entrer le Montant de la Scolarité"
                class="block mt-1 rounded-sm border-gray-300 w-full
                @error('montant_scolarite') border-red-500 bg-red-100 animate-bounce @enderror"
                wire:model="montant_scolarite" name="montant_scolarite">

            @error('montant_scolarite')
                <div class="text text-red-500 mt-2">*Le Montant de la Scolarité est requis.</div>
            @enderror
           </div>
        </div>

        <div class="p-5 flex justify-between items-center mt-5 bg-gray-100">
            <button class="bg-red-600 p-3 rounded-sm text-white text-sm" type="reset">Annuler</button>
            <button class="bg-green-500 p-3 rounded-sm text-white text-sm" type="submit">Enregistrer</button>
        </div>
    </form>
</div>
