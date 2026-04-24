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
        Schema::create('paints', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paint_type_id')->nullable();
            $table->string('nama_cat');
            $table->string('jenis');
            $table->string('warna');
            $table->integer('harga');
            $table->integer('terjual')->default(0);
            $table->string('kualitas');
            $table->string('ukuran');
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paints');
    }
};
