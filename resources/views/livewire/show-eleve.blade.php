<div>
    <div class="w-full flex">
        <div class="w-2/3">
            <div class="custom_card p-3 bg-white rounded-md flex flex-col">
                <div class="title pb-2 border-b-2 border-b-red-500">Information de l'Elève</div>
                <section class="flex mt-4 flex-row">
                    <div class="div w-24">
                        <img src="https://ui-avatars.com/api/?name={{ $eleve->prenom }}+{{ $eleve->nom }}"
                            alt="" class="w-24">
                    </div>
                    <section class="flex flex-col">

                        <div class="flex flex-row pl-3">
                            <div class="name mr-2 uppercase">Matricule : </div>
                            <div class="name text-md uppercase"> {{ $eleve->matricule }} </div>
                        </div>


                        <div class="flex flex-row pl-3">
                            <div class="name font-bold mr-2"> {{ $eleve->prenom }} </div>
                            <div class="name font-bold text-md"> {{ $eleve->nom }} </div>
                        </div>


                        <div class="flex flex-row pl-3">
                            <div class="name mr-2">Classe Actuelle : </div>
                            <div class="name text-md"> {{ $this->getClasseActuelle() }} </div>
                        

                        </div>
                    </section>
                </section>

                <div class="title pb-2 border-b-2 border-b-red-500">Les Différents Paiements Effectués par l'Elève</div>

                @forelse ($dernierPaiementEleve as $paiement)
                    <div class="shadow-sm p-2 border-b-2 border-b-red-400 mt-2">
                        <span>Montant : {{$paiement->montant}} FCFA</span>
                        <span>Payé le : {{$paiement->created_at}} </span>
                    </div>
                    
                @empty
                    <p>Aucun Paiement Effectué!</p>
                @endforelse
                <div class="mt-3">
                    {{ $dernierPaiementEleve->links() }}
                </div>
            </div>
        </div>
        <div class="w-1/3">
            
        </div>
    </div>
</div>
