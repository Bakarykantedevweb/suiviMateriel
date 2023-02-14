<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSortiMaterielsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sorti_materiels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('agence_id');
            $table->unsignedBigInteger('materiel_id');
            $table->string('nom');
            $table->string('prenom');
            $table->date('date_sorti');
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
        Schema::dropIfExists('sorti_materiels');
    }
}
