<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $owner = User::create(
            [
                'nama_pegawai'  =>  'Kadek Widiana',
                'alamat' => 'Bali',
                'tgl_lahir' => '10 Maret 2004',
                'jenis_kelamin' => 'Laki-laki',
                'username' => 'deknos',
                'email' =>  'kdkonos10@gmail.com',
                'password'  =>  Hash::make('12345678'),
                'is_admin'  =>  3,
                'status' => 1,
            ],
        );

        $manajer = User::create([
            'nama_pegawai'  =>  'Wayan Merta',
            'alamat' => 'Singaraja, bali',
            'tgl_lahir' => '19 November 2002',
            'jenis_kelamin' => 'Laki-laki',
            'username' => 'yanmerta88',
            'email' =>  'merta@gmail.com',
            'password'  =>  Hash::make('87654321'),
            'is_admin'  =>  2,
            'status' => 1,
        ]);

        $operator = User::create([
            'nama_pegawai'  =>  'Putu Nova',
            'alamat' => 'Karangasem, bali',
            'tgl_lahir' => '19 November 2003',
            'jenis_kelamin' => 'Laki-laki',
            'username' => 'nova99',
            'email' =>  'nova@gmail.com',
            'password'  =>  Hash::make('12344321'),
            'is_admin'  =>  1,
            'status' => 1,
        ]);
    }
}
