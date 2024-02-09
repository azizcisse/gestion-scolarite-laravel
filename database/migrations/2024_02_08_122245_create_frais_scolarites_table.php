<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frais_scolarites', function (Blueprint $table) {
            $table->id();

            // id niveau
            $table->unsignedBigInteger('niveau_scolaire_id');
            $table->foreign('niveau_scolaire_id')->references('id')->on('niveau_scolaires');

            // id annee scolaire
            $table->unsignedBigInteger('annee_scolaire_id');
            $table->foreign('annee_scolaire_id')->references('id')->on('annee_scolaires');

            // Montant de la scolarite 
            $table->integer('montant');
          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('frais_scolarites');
    }
};
