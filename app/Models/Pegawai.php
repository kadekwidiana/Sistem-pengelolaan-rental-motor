<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Auth\User as AuthenticatableUser;
use Illuminate\Support\Facades\Auth;

class Pegawai extends AuthenticatableUser implements Authenticatable
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
