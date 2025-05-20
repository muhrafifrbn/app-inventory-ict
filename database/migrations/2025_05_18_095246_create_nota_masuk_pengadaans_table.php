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
        Schema::create('nota_masuk_pengadaan', function (Blueprint $table) {
            $table->string('no_referensi')->primary();
            $table->string('hari')->nullable(); 
            $table->date('tanggal')->nullable();
            $table->time('jam')->nullable();
            $table->string('dokumen_nota_barang_masuk')->nullable(); 
            $table->string('user_nim_nip');
            $table->foreign('user_nim_nip')
                ->references('nim_nip')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nota_masuk_pengadaans');
    }
};
