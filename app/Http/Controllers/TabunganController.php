<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;

use App\Models\Tabungan;
use App\Models\Siswa;

class TabunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tabungan = Tabungan::all();
        return view('tabungan.index', ['tabungan' => $tabungan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('tabungan.create');
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
            'nis' => 'required',
            'jumlah_tabungan' => 'required',
            'tanggal_bayar' => 'required'
        ]);

         $siswa = Siswa::where('nis', $validated['nis'])->get();
         $tabungan = Tabungan::create([
            'jumlah_tabungan' => $validated['jumlah_tabungan'],
            'tanggal_bayar' => $validated['tanggal_bayar'],
            'id_siswa' => $siswa->id_siswa
        ]);

        if($tabungan) :
            Alert::success('Berhasil', 'Data Berhasil di Tambahkan');
        else :
             Alert::error('Terjadi Kesalahan', 'Data Gagal di Tambahkan');
        endif;

         return redirect()->route('tabungan.index')->with('success', 'New post has been added!');
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
        $tabungan = Tabungan::find($id);

        return view('tabungan.edit', [
        'tabungan' => $tabungan
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

         $tabungan = Tabungan::find($id);
         if ($tabungan) {
            $tabungan->jumlah_bayar = $validated['jumlah_bayar'];
            $tabungan->tanggal_bayar = $validated['tanggal_bayar'];
            $tabungan->save();
         }
         
         if($tabungan) :
            Alert::success('Berhasil', 'Data Berhasil di Perbaharui');
        else :
             Alert::error('Terjadi Kesalahan', 'Data Gagal di Perbaharui');
        endif;

         return redirect()->route('tabungan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tabungan = Tabungan::find($id);
        $tabungan->delete();

        if($pembayaran) :
            Alert::success('Berhasil', 'Data Berhasil di Hapus');
        else :
             Alert::error('Terjadi Kesalahan', 'Data Gagal di Hapus');
        endif;

        return redirect()->route('tabungan.index');
    }
}
