<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    use HasFactory;

    protected $table = 'motors';
    protected $primaryKey = 'plat_motor';
    // protected $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'plat_motor',
        'nama_motor',
        'warna',
        'tipe',
        'tahun',
        'tgl_pajak',
        'nama_pemilik',
        'cc',
        'harga_sewa',
        'status',
        'gambar_motor',
        'tgl_catat'
    ];

    protected $casts = [
        'tgl_pajak' => 'date',
        'tgl_catat' => 'date',
        'status' => 'boolean'
    ];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'plat_motor', 'plat_motor');
    }

    public function pengeluaran()
    {
        return $this->hasMany(Pengeluaran::class, 'plat_motor', 'plat_motor');
    }
}
