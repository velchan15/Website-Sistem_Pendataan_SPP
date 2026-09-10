<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;

use App\Models\Tagihan;
use App\Models\Siswa;

class TagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tagihan = Tagihan::all();
        return view('tagihan.index', ['tagihan' => $tagihan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tagihan.create');
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
            'jumlah_tagihan' => 'required',
            'tanggal_bayar' => 'required'
        ]);

         $siswa = Siswa::where('nis', $validated['nis'])->first();
         $tagihan = Tagihan::create([
            'jumlah_tagihan' => $validated['jumlah_tagihan'],
            'tanggal_bayar' => $validated['tanggal_bayar'],
            'id_siswa' => $siswa->id_siswa
        ]);

        if($tagihan) :
            Alert::success('Berhasil', 'Data Berhasil di Tambahkan');
        else :
             Alert::error('Terjadi Kesalahan', 'Data Gagal di Tambahkan');
        endif;

         return redirect()->route('tagihan.index')->with('success', 'New post has been added!');
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
        $tagihan = Tagihan::find($id);

        return view('tagihan.edit', ['tagihan' => $tagihan]);
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
            'jumlah_tagihan' => 'required',
            'tanggal_bayar' => 'required'
        ]);

         $tagihan = Tagihan::find($id);
         if ($tagihan) {
            $tagihan->jumlah_tagihan = $validated['jumlah_tagihan'];
            $tagihan->tanggal_bayar = $validated['tanggal_bayar'];
            $tagihan->save();
         }
         
        if($tagihan) :
            Alert::success('Berhasil', 'Data Berhasil di Perbaharui');
        else :
             Alert::error('Terjadi Kesalahan', 'Data Gagal di Perbaharui');
        endif;

         return redirect()->route('tagihan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tagihan = Tagihan::find($id);
        $tagihan->delete();

        if($tagihan) :
            Alert::success('Berhasil', 'Data Berhasil di Hapus');
        else :
             Alert::error('Terjadi Kesalahan', 'Data Gagal di Hapus');
        endif;

        return redirect()->route('tagihan.index');
    }
}
