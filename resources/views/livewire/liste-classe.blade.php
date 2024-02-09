<div class="mt-5">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
        {{-- Titre et Button Créer --}}
        <div class="flex justify-between items-center">
            <div class="w-1/3">
                <input type="text" placeholder="Rechercher Année Scolaire..."
                    class="block mt-1 rounded-sm border-gray-300 w-full" wire:model="search" name="search">
            </div>
            <a href="{{ route('classes.create') }}"
                class="bg-blue-500 rounded-md p-2 text-sm text-white">Nouvelle Classe</a>
        </div>

        @if (Session::get('success'))
            <div class="p-5">
                <div class="block p-2 bg-green-600 text-white rouded-sm shadow-sm mt-2">
                    {{ Session::get('success') }}</div>
            </div>
        @endif

        {{-- Styliser le tableau --}}
        <div class="overflow-x-auto">
            <div class="py-4 inline-bloock min-w-full">
                <div class="overflow-hidden">
                    <table class="min-w-full text-center">
                        <thead class="border-b bg-gray-50">
                            <tr>
                                <th class="text-sm font-medium text-gray-900 px-6 py-6">Nom Classe </th>
                                <th class="text-sm font-medium text-gray-900 px-6 py-6">Libellé Niveau</th>
                                <th class="text-sm font-medium text-gray-900 px-6 py-6">Montant Scolarité</th>
                                <th class="text-sm font-medium text-gray-900 px-6 py-6">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($classesList as $item)
                                <tr class="border-b-1 border-gray-100">
                                    <td class="text-sm font-medium text-gray-900 px-6 py-6">{{ $item->nom_classe }}</td>
                                    <td class="text-sm font-medium text-gray-900 px-6 py-6">{{ $item->niveauScolaire->libelle }}</td>
                                    <td class="text-sm font-medium text-gray-900 px-6 py-6">{{ $this->getScolariteMontant($item->id) }} FCFA</td>
                                    <td>
                                        <a href="{{ route('classes.edit_classe', $item->id)}}" class="text-sm bg-blue-500 p-1 text-white rounded-sm">Modifier</a>
                                        <button wire:click="delete({{$item->id}})" class="text-sm bg-red-500 p-1 text-white rounded-sm">Suprimer</button>
                                    </td>
                            @empty
                                <tr class="w-full">
                                    <td class=" flex-1 w-full items-center justify-center" colspan="4">
                                        <div>
                                            <p class="flex justify-center content-center p-4"> <img
                                                    src="{{ asset('storage/empty.svg') }}" alt=""
                                                    class="w-20 h-20">
                                            <div>Aucun élément trouvé!</div>
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                    {{-- Pagination --}}
                    <div class="mt-3">
                        {{ $classesList->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
