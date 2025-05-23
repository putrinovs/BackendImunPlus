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
        Schema::create('vaksin', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama_vaksin'); // Nama vaksin
            $table->text('deskripsi')->nullable();  // Deskripsi vaksin (opsional)
            $table->string('kategori')->nullable();  
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vaksin');
    }
};
