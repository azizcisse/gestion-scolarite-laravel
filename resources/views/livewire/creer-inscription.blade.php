<div class="p-2 bg-white shadow-sm">

    <form action="POST" wire:submit.prevent="store"> @csrf @method('post')
        @if (Session::get('error'))
            <div class="p-5">
                <div class="p-4 border-red-500 bg-red-600 animate-bounce text-white">
                    {{ Session::get('error') }}</div>
            </div>
        @endif

        @if ($error)
            <div class="p-5">
                <div class="p-4 border-red-700 bg-red-700 animate-bounce text-white rounded-sm">
                    {{ $error }}
                </div>
            </div>
        @endif

        <div class="p-5 flex flex-col gap-4">

            <div class="block">
                <x-jet-label value="{{ __('Matricule Elève') }}" />
                <input type="text" placeholder="Entrer Libellé Matricule Example: MAE125"
                    class="block mt-1 rounded-sm border-gray-300 w-full
                    @error('matricule') border-red-500 bg-red-100 animate-bounce @enderror"
                    wire:model="matricule" name="matricule">

                @error('matricule')
                    <div class="text text-red-500 mt-2">*Le Matricule est requis.</div>
                @enderror
            </div>

            <div class="block">
                <x-jet-label value="{{ __('Prénom-Nom Elève') }}" />
                <input type="text" class="block mt-1 rounded-sm border-gray-300 w-full" wire:model="fullname"
                    name="fullname" readonly>
            </div>

            <div class="block mb-5">
                <x-jet-label value="{{ __('Choisir Niveau') }}" />
                <select class="block mt-1 rounded-sm border-gray-300 w-full" wire:model="niveau_scolaire_id"
                    name="niveau_scolaire_id">
                    <option value=""></option>
                    @foreach ($niveauActuelles as $item)
                        <option value="{{ $item->id }}">{{ $item->libelle }}</option>
                    @endforeach
                </select>

                @error('niveau_scolaire_id')
                    <div class="text text-red-500 mt-2">*Le Niveau Scolaire est requis.</div>
                @enderror
            </div>

            <div class="block mb-5">
                <x-jet-label value="{{ __('Selectionner Classe') }}" />
                <select class="block mt-1 rounded-sm border-gray-300 w-full" wire:model="classe_id" name="classe_id">
                    <option value=""></option>
                    @foreach ($classesList as $item)
                        <option value="{{ $item->id }}">{{ $item->nom_classe }}</option>
                    @endforeach
                </select>

                @error('classe_id')
                    <div class="text text-red-500 mt-2">*Le Niveau Scolaire est requis.</div>
                @enderror
            </div>

        </div>

        <div class="p-5 flex justify-between items-center mt-5 bg-gray-100">
            <button class="bg-red-600 p-3 rounded-sm text-white text-sm" type="reset">Annuler</button>
            <button class="bg-green-500 p-3 rounded-sm text-white text-sm" type="submit">Enregistrer</button>
        </div>
    </form>
</div>
