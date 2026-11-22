<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
   public function up(): void
{
    Schema::table('laporan_perbaikans', function (Blueprint $table) {
        $table->string('status')->change();
    });

    DB::table('laporan_perbaikans')
        ->where('status', 'berhasil')
        ->update([
            'status' => 'berhasil_diperbaiki'
        ]);

    DB::table('laporan_perbaikans')
        ->where('status', 'gagal')
        ->update([
            'status' => 'tidak_berhasil_diperbaiki'
        ]);

    Schema::table('laporan_perbaikans', function (Blueprint $table) {
        $table->enum('status', [
            'sedang_dilaporkan',
            'sedang_diperbaiki',
            'berhasil_diperbaiki',
            'diperbaiki_sebagian',
            'tidak_berhasil_diperbaiki'
        ])->default('sedang_dilaporkan')->change();
    });
}

    public function down(): void
    {
        Schema::table('laporan_perbaikans', function (Blueprint $table) {
            $table->enum('status', [
                'sedang_dilaporkan',
                'sedang_diperbaiki'
            ])->change();
        });
    }
};