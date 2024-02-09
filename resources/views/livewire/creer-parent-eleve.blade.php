<div class="p-2 bg-white shadow-sm">

    <form action="POST" wire:submit.prevent="store"> @csrf @method('post')
        @if (Session::get('error'))
            <div class="p-5">
                <div class="p-4 border-red-500 bg-red-600 animate-bounce text-white">
                    {{ Session::get('error') }}</div>
            </div>
        @endif

        <div class="p-5 flex flex-col gap-4">

           <div class="block">
            <x-jet-label value="{{ __('Prénom Parent') }}" />
            <input type="text" placeholder="Entrer le prénom Example: Abdou Aziz"
                class="block mt-1 rounded-sm border-gray-300 w-full
                @error('prenom') border-red-500 bg-red-100 animate-bounce @enderror"
                wire:model="prenom" name="prenom">

            @error('prenom')
                <div class="text text-red-500 mt-2">*Le Prénom est requis</div>
            @enderror
           </div>

           <div class="block">
            <x-jet-label value="{{ __('Nom Parent') }}" />
            <input type="text" placeholder="Entrer le nom Example: Cissé"
                class="block mt-1 rounded-sm border-gray-300 w-full
                @error('nom') border-red-500 bg-red-100 animate-bounce @enderror"
                wire:model="nom" name="nom">

            @error('nom')
                <div class="text text-red-500 mt-2">*Le Nom est Requis</div>
            @enderror
           </div>

           <div class="block">
            <x-jet-label value="{{ __('Adresse Email') }}" />
            <input type="text" placeholder="Entrer le email Example: example@gmail.com"
                class="block mt-1 rounded-sm border-gray-300 w-full
                @error('email') border-red-500 bg-red-100 animate-bounce @enderror"
                wire:model="email" name="email">

            @error('email')
                <div class="text text-red-500 mt-2">*Le Email est Requis</div>
            @enderror
           </div>

           <div class="block">
            <x-jet-label value="{{ __('Téléphone du Parent') }}" />
            <input type="text" placeholder="Entrer le Numéro de Téléphone Example: 77 000 00 00"
                class="block mt-1 rounded-sm border-gray-300 w-full
                @error('telephone') border-red-500 bg-red-100 animate-bounce @enderror"
                wire:model="telephone" name="telephone">

            @error('telephone')
                <div class="text text-red-500 mt-2">*Le Numéro de Téléphone est requis.</div>
            @enderror
           </div>

        </div>

        <div class="p-5 flex justify-between items-center mt-5 bg-gray-100">
            <button class="bg-red-600 p-3 rounded-sm text-white text-sm" type="reset">Annuler</button>
            <button class="bg-green-500 p-3 rounded-sm text-white text-sm" type="submit">Enregistrer</button>
        </div>
    </form>
</div>
