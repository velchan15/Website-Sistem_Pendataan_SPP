<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tabungan extends Model
{
    use HasFactory;

    protected $table = 'tabungan';

    protected $primaryKey = 'id_tabungan';

    protected $fillable = [
    	'id_tabungan',
    	'id_siswa',
    	'tanggal_bayar',
    	'jumlah_bayar',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa', 'id_siswa');
    }

    public function pembayaran() 
    {
        return $this->hasMany(Pembayaran::class, 'id_tabungan', 'id_tabungan');
    }
}
