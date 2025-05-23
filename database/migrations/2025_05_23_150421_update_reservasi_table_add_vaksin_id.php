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
        Schema::create('reservasi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_ibu');
            $table->string('nik')->unique();
            $table->date('tanggal_lahir');
            $table->string('alamat');
            $table->string('golongan_darah')->nullable();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('lokasi');
            $table->date('tanggal_reservasi');
            $table->time('waktu_reservasi');
            $table->string('vaksin_id')->constrained("vaksin");
            $table->timestamps();
        });
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservasi');
        //
    }
};
