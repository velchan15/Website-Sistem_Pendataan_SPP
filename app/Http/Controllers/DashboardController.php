<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function admin()
    {
        $total_pelunasan = DB::table('pembayaran')->whereMonth('tanggal_bayar', date('m'))->sum('jumlah_bayar');
        $total_tunggakan = DB::table('tagihan')->sum('jumlah_tagihan') - DB::table('pembayaran')->sum('jumlah_bayar'); 
        $jumlah_siswa = DB::table('siswa')->count();

        return view('admin.dashboard', [
            'total_pelunasan' => $total_pelunasan,
            'total_tunggakan' => $total_tunggakan,
            'jumlah_siswa' => $jumlah_siswa,
        ]);
    }

    public function petugas()
    {
        $total_pelunasan = DB::table('pembayaran')->whereMonth('tanggal_bayar', date('m'))->sum('jumlah_bayar');
        $total_tunggakan = DB::table('tagihan')->sum('jumlah_tagihan') - DB::table('pembayaran')->sum('jumlah_bayar'); 
        $jumlah_siswa = DB::table('siswa')->count();

        return view('admin.dashboard', [
            'total_pelunasan' => $total_pelunasan,
            'total_tunggakan' => $total_tunggakan,
            'jumlah_siswa' => $jumlah_siswa,
        ]);
    }

    public function siswa()
    {
        $total_tunggakan = DB::table('tagihan')->sum('jumlah_tagihan') - DB::table('pembayaran')->sum('jumlah_bayar'); 

        return view('siswa2.dashboard', [
            'total_tunggakan' => $total_tunggakan,
        ]);
    }
}