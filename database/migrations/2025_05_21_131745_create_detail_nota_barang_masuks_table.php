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
        Schema::create('detail_nota_barang', function (Blueprint $table) {
            $table->id();
            
            $table->string('no_referensi');
            $table->foreign('no_referensi')
                ->references('no_referensi')
                ->on('nota_pengadaan')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('kd_gudang');
            $table->foreign('kd_gudang')
                ->references('kd_gudang')
                ->on('gudang')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('kd_barang');
            $table->foreign('kd_barang')
                ->references('kd_barang')
                ->on('barang')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('kd_merek');
            $table->foreign('kd_merek')
                ->references('kd_merek')
                ->on('merek')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('user_nim_nip');
            $table->foreign('user_nim_nip')
                ->references('nim_nip')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->integer("total_barang_baru");
            $table->string("keterangan");
            $table->string("foto_barang")->nullable();
            $table->string( "status_detail_nota");
            
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_nota_barang_masuks');
    }
};
