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
        Schema::create('obat_sampahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_obat')
                ->constrained('obats')
                ->onDelete('cascade');
            $table->integer('jumlah');
            $table->enum('alasan', ['Kadaluarsa', 'Rusak', 'Lainnya']);
            $table->date('tanggal_dibuang');
            $table->foreignId('id_user')
                ->constrained('users')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obat_sampahs');
    }
};
