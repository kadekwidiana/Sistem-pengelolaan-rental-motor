<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawais';
    protected $primaryKey = 'id_pegawai';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_pegawai',
        'nama_pegawai',
        'email',
        'username',
        'password',
        'alamat',
        'tgl_lahir',
        'jenis_kelamin'
    ];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_pegawai', 'id_pegawai');
    }
}
