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
        Schema::create('paiements', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('eleve_id');
            $table->foreign('eleve_id')->references('id')->on('eleves');

            $table->unsignedBigInteger('classe_id');
            $table->foreign('classe_id')->references('id')->on('classes');

            $table->unsignedBigInteger('annee_scolaire_id');
            $table->foreign('annee_scolaire_id')->references('id')->on('annee_scolaires');

            $table->integer('montant')->comment('montant du paiement');

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
        Schema::dropIfExists('paiements');
    }
};
