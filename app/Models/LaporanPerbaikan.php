<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanPerbaikan extends Model
{
    protected $fillable = [
        'barang_id',
        'user_id',
        'jumlah_dilaporkan',
        'jenis_kerusakan',
        'keterangan',
        'status',
        'jumlah_berhasil',
        'jumlah_tidak_berhasil',
        'tanggal_lapor',
        'tanggal_selesai',
    ];

    protected $casts = [
        'tanggal_lapor' => 'datetime',
        'tanggal_selesai' => 'datetime',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}