<div class="mt-5">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
        {{-- Titre et Button Créer --}}
        <div class="flex justify-between items-center">
            <div class="w-1/3">
                <input type="text" placeholder="Rechercher Année Scolaire..."
                    class="block mt-1 rounded-sm border-gray-300 w-full" wire:model="search" name="search">
            </div>
            <a href="{{ route('configurations.creer_annee_scolaire') }}"
                class="bg-blue-500 rounded-md p-2 text-sm text-white">Nouvelle Année Scolaire</a>
        </div>

        @if (Session::get('success'))
            <div class="p-5">
                <div class="block p-2 bg-green-500 text-white rouded-sm shadow-sm mt-2">
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
                                <th class="text-sm font-medium text-gray-900 px-6 py-6">Année Scolaire</th>
                                <th class="text-sm font-medium text-gray-900 px-6 py-6">Année Actuelle</th>
                                <th class="text-sm font-medium text-gray-900 px-6 py-6">Statut</th>
                                <th class="text-sm font-medium text-gray-900 px-6 py-6">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($listAnneeScolaire as $item)
                                <tr class="border-b-1 border-gray-100">
                                    <td class="text-sm font-medium text-gray-900 px-6 py-6">{{ $item->annee_scolaire }}
                                    </td>
                                    <td class="text-sm font-medium text-gray-900 px-6 py-6">{{ $item->annee_actuelle }}
                                    </td>
                                    <td class="text-sm font-medium text-gray-900 px-6 py-6">
                                        @if ($item->active >= 1)
                                            <span class="p-1 text-sm bg-green-400 text-white rounded-sm">Actif</span>
                                        @else
                                            <span class="p-1 text-sm bg-red-400 text-white rounded-sm">Inactif</span>
                                        @endif
                                    </td>
                                    <td class="text-sm font-medium text-gray-900 px-6 py-6">
                                        <button
                                            class="p-2 text-white {{ $item->active == 1 ? 'bg-red-400' : 'bg-green-400' }}  text-sm rounded-sm"
                                            wire:click='activerStatus({{ $item->id }})'>
                                           {{ $item->active == 1 ? 'Désactiver' : 'Activer' }}
                                        </button>
                                    </td>
                                </tr>
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
                        {{ $listAnneeScolaire->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
