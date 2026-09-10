<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;

use App\Models\Pembayaran;
use App\Models\Tagihan;
use App\Models\Tabungan;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembayaran = Pembayaran::all();
        return view('pembayaran.index', ['pembayaran' => $pembayaran]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id_tagihan = $request->query('tagihan');
        if ($id_tagihan) {
            $tagihan = Tagihan::find($id_tagihan);
            return view('pembayaran.create', ['tagihan' => $tagihan]);
        } else {
            return back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'jumlah_bayar' => 'required',
            'tanggal_bayar' => 'required',
            'id_tagihan' => 'required'
        ]);
        
        $tagihan = Tagihan::find($validated['id_tagihan']);
        if ($validated['jumlah_bayar'] > $tagihan->jumlah_tagihan)
        {
            Tabungan::create([
            'jumlah_bayar' => $validated['jumlah_bayar'] - $tagihan->jumlah_tagihan,
            'tanggal_bayar' => date('Y-m-d'),
            'id_siswa' => $tagihan->id_siswa
         ]);
        }

         $pembayaran = Pembayaran::create([
            'jumlah_bayar' => $validated['jumlah_bayar'],
            'tanggal_bayar' => $validated['tanggal_bayar'],
            'id_tagihan' => $validated['id_tagihan'],
            'id_petugas' => auth()->user()->id
        ]);

        if($pembayaran) :
            Alert::success('Berhasil', 'Data Berhasil di Tambahkan');
        else :
             Alert::error('Terjadi Kesalahan', 'Data Gagal di Tambahkan');
        endif;

        return redirect()->route('pembayaran.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pembayaran = Pembayaran::find($id);

        return view('pembayaran.edit', [
        'pembayaran' => $pembayaran
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'jumlah_bayar' => 'required',
            'tanggal_bayar' => 'required'
        ]);

        $pembayaran = Pembayaran::find($id);
        if ($pembayaran) {
            $pembayaran->jumlah_bayar = $validated['jumlah_bayar'];
            $pembayaran->tanggal_bayar = $validated['tanggal_bayar'];
            $pembayaran->save();
        }

        if($pembayaran) :
            Alert::success('Berhasil', 'Data Berhasil di Perbaharui');
        else :
             Alert::error('Terjadi Kesalahan', 'Data Gagal di Perbaharui');
        endif;
        
        return redirect()->route('pembayaran.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pembayaran = Pembayaran::find($id);
        $pembayaran->delete();

        if($pembayaran) :
            Alert::success('Berhasil', 'Data Berhasil di Hapus');
        else :
             Alert::error('Terjadi Kesalahan', 'Data Gagal di Hapus');
        endif;
        return redirect()->route('pembayaran.index');
    }
}
