<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Penyewa;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksis';
    protected $primaryKey = 'kode_transaksi';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'kode_transaksi',
        'plat_motor',
        'no_paspor',
        'id_pegawai',
        'tgl_mulai',
        'tgl_selesai',
        'total',
        'km_awal',
        'km_akhir',
        'jumlah_helm',
        'catatan'
    ];

    public function motor()
    {
        return $this->belongsTo(Motor::class, 'plat_motor', 'plat_motor');
    }

    public function penyewa()
    {
        return $this->belongsTo(Penyewa::class, 'no_paspor', 'no_paspor');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_pegawai', 'id');
    }
}
