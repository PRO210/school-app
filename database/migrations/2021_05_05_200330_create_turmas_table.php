<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTurmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turmas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tenant_id');
            $table->string('TURMA');
            $table->string('TURMA_EXTRA')->default('NAO');
            $table->string('CATEGORIA');
            $table->string('TURNO');
            $table->string('UNICO');
            $table->string('TURMA_STATUS')->default('ATIVA');
            $table->string('ANO');
            $table->string('TURMA_IDADE_MINIMA');
            $table->timestamps();
            $table->foreign('tenant_id')->references('id')->on('tenants')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('turmas');
    }
}
