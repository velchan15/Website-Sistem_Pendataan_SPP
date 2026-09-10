@extends('layouts.template')
@section('title', 'Edit Data Tabungan')

@section('content')

<div class="main-content">
  <section class="section">
    <div class="section-header"><h1>Edit Data Tabungan</h1></div>
    <div class="section-body">
      <div class="row">
        <div class="col-9">
          <div class="card">
            <div class="card-hearder">
              <a href="{{ route('tabungan.index') }}" class="btn btn-primary">Kembali</a>
            </div>
             <div class="card-body p-0">
              <form action="{{ route('tabungan.store', ['tabungan' => $tabungan->siswa->id_siswa]) }}" method="post">
              @csrf
              @method('put')
              <div class="card-body">
                <div class="form-group">
                  <label for="nis" class="form-label"><b>NIS</b></label>
                  <input type="text" class="form-control" id="nis" name="nis" required autofocus value="{{ old('nis', $tabungan->siswa->nis) }}" readonly><br><br>
                  <label for="name" class="form-label"><b>Nama Siswa</b></label>
                  <input type="text" class="form-control" id="name" name="name" required autofocus value="{{ old('name', $tabungan->siswa->user->name) }}" readonly><br><br>
                  <label for="jumlah_tagihan" class="form-label"><b>Jumlah Tabungan</b></label>
                  <input type="text" class="form-control" id="jumlah_tabungan" name="jumlah_tabungan" required autofocus value="{{ old('jumlah_tabungan', $tabungan->siswa->user->jumlah_tabungan) }}"><br><br>
                  <label for="tanggal_bayar" class="form-label"><b>Tanggal Bayar</b></label>
                  <input type="date" class="form-control" id="tanggal_bayar" name="tanggal_bayar" required autofocus value="{{ old('tanggal_bayar', $tabungan->siswa->tanggal_bayar) }}"><br><br>
                  <div class="card-footer text-right"><button type="submit" class="btn btn-primary">Simpan</button></div> 
                </div>
              </div>
              </form>
             </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection