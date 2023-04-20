<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'asal_negara'
    ];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'no_paspor', 'no_paspor');
    }
}
