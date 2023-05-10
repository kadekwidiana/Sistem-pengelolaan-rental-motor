<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    protected $table = 'pengeluarans';
    protected $primaryKey = 'id_pengeluaran';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_pengeluaran',
        'plat_motor',
        'id_pegawai',
        'tgl_pengeluaran',
        'jenis_pengeluaran',
        'biaya_pengeluaran'
    ];

    public function motor()
    {
        return $this->belongsTo(Motor::class, 'plat_motor', 'plat_motor');
    }

    public function pegawai()
    {
        return $this->belongsTo(User::class, 'id_pegawai', 'id');
    }
}
