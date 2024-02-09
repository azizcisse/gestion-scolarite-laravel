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
            <x-jet-label value="{{ __('Choisir Niveau') }}" />
            <select class="block mt-1 rounded-sm border-gray-300 w-full" 
                wire:model="niveau_scolaire_id" name="niveau_scolaire_id">
                <option value=""></option>
                @foreach ($niveauActuelles as $item)
                <option value="{{$item->id}}">{{$item->libelle}}</option>
                @endforeach
            </select>

            @error('niveau_scolaire_id')
                <div class="text text-red-500 mt-2">*Le Niveau Scolaire est requis.</div>
            @enderror
           </div>

           <div class="block mb-5">
            <x-jet-label value="{{ __('Nom de la Classe') }}" />
            <input type="text" placeholder="Entrer le Code"
                class="block mt-1 rounded-sm border-gray-300 w-full
                @error('nom_classe') border-red-500 bg-red-100 animate-bounce @enderror"
                wire:model="nom_classe" name="nom_classe">

            @error('nom_classe')
                <div class="text text-red-500 mt-2"> {{ $message }}</div>
            @enderror
           </div>

        </div>

        <div class="p-5 flex justify-between items-center mt-5 bg-gray-100">
            <button class="bg-red-600 p-3 rounded-sm text-white text-sm" type="reset">Annuler</button>
            <button class="bg-green-500 p-3 rounded-sm text-white text-sm" type="submit">Enregistrer</button>
        </div>
    </form>
</div>
