<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tareas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->unsignedBigInteger('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('tipoTarea')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('estadoTarea', 20);
            $table->unsignedBigInteger('categoria_id')->unsigned()->index()->nullable();
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
            $table->dateTime('fechaInicio')->nullable();
            $table->dateTime('fechaVencimiento')->nullable();
            $table->date('duracion')->nullable();
            $table->float('valor')->nullable();
            $table->boolean('recurrente')->nullable();
            $table->string('periodicidadRecurrencia')->nullable();
            $table->unsignedBigInteger('subtarea_id')->unsigned()->index()->nullable();
            $table->unsignedBigInteger('amigo_id')->unsigned()->index()->nullable();
            $table->foreign('amigo_id')->references('id')->on('amigos');
            $table->timestamps();
        });
        Schema::table('tareas', function (Blueprint $table) {
            $table->foreign('subtarea_id')->references('id')->on('tareas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tareas');
    }
};
