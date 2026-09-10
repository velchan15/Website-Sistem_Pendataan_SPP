@extends('layouts.template')
@section('title', 'Edit Data Pembayaran')

@section('content')

<div class="main-content">
  <section class="section">
    <div class="section-header"><h1>Edit Data Pembayaran</h1></div>
    <div class="section-body">
      <div class="row">
        <div class="col-9">
          <div class="card">
            <div class="card-hearder">
              <a href="{{ route('pembayaran.index') }}" class="btn btn-primary">Kembali</a>
            </div>
             <div class="card-body p-0">
              <form action="{{ route('pembayaran.update', ['pembayaran' => $pembayaran->id_pembayaran]) }}" method="post">
              @csrf
              @method('put')
              <div class="card-body">
                <div class="form-group">
                  <label for="nis" class="form-label"><b>NIS</b></label>
                  <input type="text" class="form-control" id="nis" name="nis" value="{{ old('nis', $pembayaran->tagihan->siswa->nis) }}" readonly><br><br>
                  <label for="name" class="form-label"><b>Nama Siswa</b></label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $pembayaran->tagihan->siswa->user->name) }}" readonly><br><br>
                  <label for="jumlah_tagihan" class="form-label"><b>Jumlah Bayar</b></label>
                  <input type="text" class="form-control" id="jumlah_bayar" name="jumlah_bayar" required autofocus value="{{ old('jumlah_bayar', $pembayaran->jumlah_bayar) }}"><br><br>
                  <label for="tanggal_bayar" class="form-label"><b>Tanggal Bayar</b></label>
                  <input type="date" class="form-control" id="tanggal_bayar" name="tanggal_bayar" required autofocus value="{{ old('tanggal_bayar', $pembayaran->tanggal_bayar) }}"><br><br>
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