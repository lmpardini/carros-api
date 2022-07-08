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
        Schema::create('table_veiculos', function (Blueprint $table) {
            $table->id();
            $table->string('veiculo');
            $table->string('marca');
            $table->integer('ano');
            $table->integer('descricao')->nullable();
            $table->boolean('vendido');
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
        Schema::dropIfExists('table_veiculos');
    }
};
