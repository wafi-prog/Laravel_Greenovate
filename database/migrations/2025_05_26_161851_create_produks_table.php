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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
             $table->string('nama');
            $table->foreignId('kategori_id')->constrained('kategori')->onDelete('cascade');
            $table->foreignId('toko_id')->constrained('tokos')->onDelete('cascade'); 
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); 
            $table->decimal('harga', 12, 2);
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
