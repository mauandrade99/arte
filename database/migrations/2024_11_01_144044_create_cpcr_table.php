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
        Schema::create('cpcr', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->ondelete('cascade')->onupdate('cascade');
            $table->string('titulo')->nullable();
            $table->longText('descricao')->nullable();
            $table->decimal('valor', total: 13, places: 2)->nullable();
            $table->date('datavenc')->nullable();
            $table->set('status', ['pago', 'pendente'])->default('pendente');
            $table->char('idativo',1)->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cpcr');
    }
};
