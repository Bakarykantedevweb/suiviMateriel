<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterielRecuperesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materiel_recuperers', function (Blueprint $table) {
            $table->id();
            $table->integer('departement_id');
            $table->string('marque');
            $table->string('model');
            $table->string('serie');
            $table->string('type');
            $table->text('description');
            $table->string('quantite');
            $table->date('date_entrer');
            $table->string('etat');
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
        Schema::dropIfExists('materiel_recuperers');
    }
}
