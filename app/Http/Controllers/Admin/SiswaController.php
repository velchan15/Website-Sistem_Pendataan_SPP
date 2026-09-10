<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Alert;

use App\Models\Siswa;
use App\Models\User;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::all();
        return view('siswa.index', ['siswa' => $siswa]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswa.create');
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
            'nis' => 'required|numeric',
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'no_telepon' => 'required|numeric'
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'username' => $validated['username'],
            'password' => bcrypt($validated['password']),
            'level' => 'siswa'
        ]);

        $siswa = Siswa::create([
            'nis' => $validated['nis'],
            'no_telepon' => $validated['no_telepon'],
            'id_user' => $user->id
        ]);

        if($siswa) :
            Alert::success('Berhasil', 'Data Berhasil di Tambahkan');
        else :
             Alert::error('Terjadi Kesalahan', 'Data Gagal di Tambahkan');
        endif;

        return redirect()->route('siswa.index');
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
     * @param  int  $ids
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = Siswa::find($id);
        return view('siswa.edit', [
        'siswa' => $siswa
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
            'nis' => 'required|numeric',
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'no_telepon' => 'required|numeric'
        ]);

        $siswa = Siswa::find($id);

        if ($siswa) {
            $siswa->nis = $validated['nis'];
            $siswa->no_telepon = $validated['no_telepon'];
            $siswa->save();

            $siswa->user->name = $validated['name'];
            $siswa->user->username = $validated['username'];
            $siswa->user->password = Hash::make($validated['password']);
            $siswa->user->save();
        }

        if($siswa) :
            Alert::success('Berhasil', 'Data Berhasil di Perbaharui');
        else :
             Alert::error('Terjadi Kesalahan', 'Data Gagal di Perbaharui');
        endif;


        return redirect()->route('siswa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Siswa::find($id);
        Siswa::destroy($siswa->id_siswa);

        if($siswa) :
            Alert::success('Berhasil', 'Data Berhasil di Hapus');
        else :
             Alert::error('Terjadi Kesalahan', 'Data Gagal di Hapus');
        endif;

        return redirect()->route('siswa.index');
    }
}
