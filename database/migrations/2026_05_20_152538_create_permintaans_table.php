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
        Schema::create('permintaans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_obat')
            ->constrained('obats')
            ->onDelete('cascade');
            $table->foreignId('id_user')
            ->constrained('users')
            ->onDelete('cascade');
            $table->integer('jumlah_permintaan');
            $table->date('tanggal_permintaan');
            $table->string('satuan');
            $table->text('keterangan')->nullable();
            $table->enum('status_permintaan', ['Dikirim', 'Diterima', 'Diproses']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permintaans');
    }
};
