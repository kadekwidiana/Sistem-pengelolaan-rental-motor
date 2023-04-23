<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaksi;

class Penyewa extends Model
{
    use HasFactory;

    protected $table = 'penyewas';
    protected $primaryKey = 'no_paspor';
    // public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'no_paspor',
        'nama_penyewa',
        'email',
        'asal_negara',
        'jenis_kelamin',
        'domisili',
        'no_telepon',
        'no_sim'
    ];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'no_paspor', 'no_paspor');
    }
}
