<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('laporan_perbaikans', function (Blueprint $table) {
            $table->id();

            $table->foreignId('barang_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->integer('jumlah_dilaporkan');
            $table->text('jenis_kerusakan');
            $table->text('keterangan')->nullable();

            $table->enum('status', [
                'sedang_dilaporkan',
                'sedang_diperbaiki',
                'berhasil_diperbaiki',
                'diperbaiki_sebagian',
                'tidak_berhasil_diperbaiki'
            ])->default('sedang_dilaporkan');

            $table->integer('jumlah_berhasil')->default(0);
            $table->integer('jumlah_tidak_berhasil')->default(0);

            $table->timestamp('tanggal_lapor')->nullable();
            $table->timestamp('tanggal_selesai')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laporan_perbaikans');
    }
};