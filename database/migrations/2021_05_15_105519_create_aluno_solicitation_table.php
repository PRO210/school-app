<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunoSolicitationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluno_solicitation', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');

            $table->bigInteger('solicitation_id')->unsigned();
            $table->bigInteger('aluno_id')->unsigned();
            $table->bigInteger('turma_id')->unsigned();
            $table->bigInteger('classification_id')->unsigned();

            $table->string('TURMA_ANO');
            $table->string('SOLICITANTE');
            $table->date('DATA_SOLICITACAO');
            $table->string('TRANSFERENCIA_STATUS');
            $table->date('DATA_TRANSFERENCIA_STATUS')->nullable();
            $table->string('DECLARACAO')->default('NAO');
            $table->string('RESPONSAVEL_DECLARACAO')->nullable();
            $table->date('DATA_DECLARACAO')->nullable();
            $table->string('TRANSFERENCIA')->default('NAO');
            $table->string('RESPONSAVEL_TRANSFERENCIA')->nullable();
            $table->date('DATA_TRANSFERENCIA')->nullable();
            $table->string('REGISTRADO')->default('NAO_REGISTRADO');
            $table->string('NUMERO')->nullable();
            $table->string('T1')->nullable();
            $table->string('T2')->nullable();
            $table->string('T3')->nullable();
            $table->string('T4')->nullable();
            $table->string('T5')->nullable();
            $table->string('T6')->nullable();
            $table->string('T7')->nullable();
            $table->string('OBS')->nullable();

            $table->foreign('aluno_id')->references('id')->on('alunos')->onDelete('cascade');
            $table->foreign('solicitation_id')->references('id')->on('solicitations')->onDelete('cascade');
            $table->foreign('turma_id')->references('id')->on('turmas')->onDelete('cascade');
            $table->foreign('classification_id')->references('id')->on('classifications');

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
        Schema::dropIfExists('aluno_solicitation');
    }
}
