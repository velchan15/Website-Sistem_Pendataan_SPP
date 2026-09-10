<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
    	
    	$user = \App\Models\User::create([
    		'name' => 'Evelyn Anastasia',
    		'username' => 'evelynmalau',
    		'password' => bcrypt('bandung15mei'),
    		'level' => 'admin'
    	]);


    	$user = \App\Models\User::create([
    		'name' => 'Cadra Oktavia',
    		'username' => 'cadraoktavia',
    		'password' => bcrypt('oktavia'),
    		'level' => 'petugas'
    	]);

        $id_petugas = $user->id;

        $user = \App\Models\User::create([
            'name' => 'Andri Selamet',
            'username' => 'andri16',
            'password' => bcrypt('bandung'),
            'level' => 'siswa'
        ]);

        $siswa = \App\Models\Siswa::create([
            'nis' => '19201001',
            'no_telepon' => '089634521135',
            'id_user' => $user->id
        ]);

        $tabungan = \App\Models\Tabungan::create([
            'tanggal_bayar' => date('Y-m-d'),
            'jumlah_bayar' => 250000,
            'id_siswa' => $siswa->id_siswa
        ]);

        $tagihan = \App\Models\Tagihan::create([
            'jumlah_tagihan' => 450000,
            'tanggal_bayar' => date('Y-m-d'),
            'id_siswa' => $siswa->id_siswa
        ]);


        $user = \App\Models\User::create([
            'name' => 'Antonio Malika Swaraghana Jansen',
            'username' => 'antonio_jansen',
            'password' => bcrypt('bandung'),
            'level' => 'siswa'
        ]);

        $siswa = \App\Models\Siswa::create([
            'nis' => '19201002',
            'no_telepon' => '082115896732',
            'id_user' => $user->id
        ]);

        $tabungan = \App\Models\Tabungan::create([
            'tanggal_bayar' => date('Y-m-d'),
            'jumlah_bayar' => 150000, 
            'id_siswa' => $siswa->id_siswa
        ]);

        $tagihan = \App\Models\Tagihan::create([
            'jumlah_tagihan' => 100000,
            'tanggal_bayar' => date('Y-m-d'),
            'id_siswa' => $siswa->id_siswa
        ]);


        $user = \App\Models\User::create([
            'name' => 'Cadra Oktavia',
            'username' => 'oktavia15',
            'password' => bcrypt('bandung'),
            'level' => 'siswa'
        ]);

        $siswa = \App\Models\Siswa::create([
            'nis' => '19201003',
            'no_telepon' => '085694327512',
            'id_user' => $user->id
        ]);

        $tabungan = \App\Models\Tabungan::create([
            'tanggal_bayar' => date('Y-m-d'),
            'jumlah_bayar' => 300000, 
            'id_siswa' => $siswa->id_siswa
        ]);

        $tagihan = \App\Models\Tagihan::create([
            'jumlah_tagihan' => 450000,
            'tanggal_bayar' => date('Y-m-d'),
            'id_siswa' => $siswa->id_siswa
        ]);


        $user = \App\Models\User::create([
            'name' => 'Christopher Raja Pardamean Sitompul',
            'username' => 'christopher01',
            'password' => bcrypt('bandung'),
            'level' => 'siswa'
        ]);

        $siswa = \App\Models\Siswa::create([
            'nis' => '19201004',
            'no_telepon' => '089539653214',
            'id_user' => $user->id
        ]);

        $tabungan = \App\Models\Tabungan::create([
            'tanggal_bayar' => date('Y-m-d'),
            'jumlah_bayar' => 300000, 
            'id_siswa' => $siswa->id_siswa
        ]);

        $tagihan = \App\Models\Tagihan::create([
            'jumlah_tagihan' => 400000,
            'tanggal_bayar' => date('Y-m-d'),
            'id_siswa' => $siswa->id_siswa
        ]);

         $user = \App\Models\User::create([
            'name' => 'Dessy Martaniadi',
            'username' => 'dessym',
            'password' => bcrypt('bandung'),
            'level' => 'siswa'
        ]);

        $siswa = \App\Models\Siswa::create([
            'nis' => '19201005',
            'no_telepon' => '086745382836',
            'id_user' => $user->id
        ]);

        $tabungan = \App\Models\Tabungan::create([
            'tanggal_bayar' => date('Y-m-d'),
            'jumlah_bayar' => 150000, 
            'id_siswa' => $siswa->id_siswa
        ]);

        $tagihan = \App\Models\Tagihan::create([
            'jumlah_tagihan' => 350000,
            'tanggal_bayar' => date('Y-m-d'),
            'id_siswa' => $siswa->id_siswa
        ]);

        $user = \App\Models\User::create([
            'name' => 'Diana Paskah Wulandari',
            'username' => 'diana_paskah',
            'password' => bcrypt('bandung'),
            'level' => 'siswa'
        ]);

        $siswa = \App\Models\Siswa::create([
            'nis' => '19201006',
            'no_telepon' => '089753441683',
            'id_user' => $user->id
        ]);

        $tabungan = \App\Models\Tabungan::create([
            'tanggal_bayar' => date('Y-m-d'),
            'jumlah_bayar' => 400000, 
            'id_siswa' => $siswa->id_siswa
        ]);

        $tagihan = \App\Models\Tagihan::create([
            'jumlah_tagihan' => 50000,
            'tanggal_bayar' => date('Y-m-d'),
            'id_siswa' => $siswa->id_siswa
        ]);


        $user = \App\Models\User::create([
            'name' => 'Evelyn Anastasia',
            'username' => 'velchan15',
            'password' => bcrypt('bandung'),
            'level' => 'siswa'
        ]);

        $siswa = \App\Models\Siswa::create([
            'nis' => '19201007',
            'no_telepon' => '089653422145',
            'id_user' => $user->id
        ]);

        $tabungan = \App\Models\Tabungan::create([
            'tanggal_bayar' => date('Y-m-d'),
            'jumlah_bayar' => 200000, 
            'id_siswa' => $siswa->id_siswa
        ]);

        $tagihan = \App\Models\Tagihan::create([
            'jumlah_tagihan' => 100000,
            'tanggal_bayar' => date('Y-m-d'),
            'id_siswa' => $siswa->id_siswa
        ]);

        $user = \App\Models\User::create([
            'name' => 'Kevin Kornelius',
            'username' => 'kevinkornelius',
            'password' => bcrypt('bandung'),
            'level' => 'siswa'
        ]);

        $siswa = \App\Models\Siswa::create([
            'nis' => '19201008',
            'no_telepon' => '082114537485',
            'id_user' => $user->id
        ]);

        $tabungan = \App\Models\Tabungan::create([
            'tanggal_bayar' => date('Y-m-d'),
            'jumlah_bayar' => 130000, 
            'id_siswa' => $siswa->id_siswa
        ]);

        $tagihan = \App\Models\Tagihan::create([
            'jumlah_tagihan' => 200000,
            'tanggal_bayar' => date('Y-m-d'),
            'id_siswa' => $siswa->id_siswa
        ]);

        $user = \App\Models\User::create([
            'name' => 'Laurent Gabriel Lesmana',
            'username' => 'laurent18',
            'password' => bcrypt('bandung'),
            'level' => 'siswa'
        ]);

        $siswa = \App\Models\Siswa::create([
            'nis' => '19201009',
            'no_telepon' => '089673552447',
            'id_user' => $user->id
        ]);

        $tabungan = \App\Models\Tabungan::create([
            'tanggal_bayar' => date('Y-m-d'),
            'jumlah_bayar' => 200000, 
            'id_siswa' => $siswa->id_siswa
        ]);

        $tagihan = \App\Models\Tagihan::create([
            'jumlah_tagihan' => 300000,
            'tanggal_bayar' => date('Y-m-d'),
            'id_siswa' => $siswa->id_siswa
        ]);

         $user = \App\Models\User::create([
            'name' => 'Leonard',
            'username' => 'leonard',
            'password' => bcrypt('bandung'),
            'level' => 'siswa'
        ]);

        $siswa = \App\Models\Siswa::create([
            'nis' => '19201010',
            'no_telepon' => '085564378932',
            'id_user' => $user->id
        ]);

        $tabungan = \App\Models\Tabungan::create([
            'tanggal_bayar' => date('Y-m-d'),
            'jumlah_bayar' => 500000, 
            'id_siswa' => $siswa->id_siswa
        ]);

        $tagihan = \App\Models\Tagihan::create([
            'jumlah_tagihan' => 300000,
            'tanggal_bayar' => date('Y-m-d'),
            'id_siswa' => $siswa->id_siswa
        ]);

         $user = \App\Models\User::create([
            'name' => 'Mario Marcelino',
            'username' => 'mario04',
            'password' => bcrypt('bandung'),
            'level' => 'siswa'
        ]);

        $siswa = \App\Models\Siswa::create([
            'nis' => '19201011',
            'no_telepon' => '087345627482',
            'id_user' => $user->id
        ]);

        $tabungan = \App\Models\Tabungan::create([
            'tanggal_bayar' => date('Y-m-d'),
            'jumlah_bayar' => 100000, 
            'id_siswa' => $siswa->id_siswa
        ]);

        $tagihan = \App\Models\Tagihan::create([
            'jumlah_tagihan' => 150000,
            'tanggal_bayar' => date('Y-m-d'),
            'id_siswa' => $siswa->id_siswa
        ]);
    }
}
