@extends('layouts.template')
@section('title', 'Data Pembayaran')

@section('content')

<div class="main-content">
  <section class="section">
    <div class="section-header"><h1>Data Pembayaran</h1></div>
    <div class="section-body">
      <div class="row">
        <div class="col-9">
          <div class="card">
            <div class="card-hearder">
              <a href="{{ route('pembayaran.index') }}" class="btn btn-primary">Kembali</a>
            </div>
             <div class="card-body p-0">
              <form action="{{ route('pembayaran.store') }}" method="post">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <input type="hidden" name="id_tagihan" value="{{ $tagihan->id_tagihan }}">
                  <label for="nis" class="form-label"><b>NIS</b></label>
                  <input type="text" class="form-control" id="nis" name="nis" required autofocus value="{{ $tagihan->siswa->nis }}" readonly><br><br>
                  <label for="name" class="form-label"><b>Nama Siswa</b></label>
                  <input type="text" class="form-control" id="name" name="name" required autofocus value="{{ $tagihan->siswa->user->name }}" readonly><br><br>
                  <label for="jumlah_bayar" class="form-label"><b>Jumlah Bayar</b></label>
                  <input type="text" class="form-control" id="jumlah_bayar" name="jumlah_bayar" required autofocus value="{{ old('jumlah_bayar') }}"><br><br>
                  <label for="tanggal_bayar" class="form-label"><b>Tanggal Bayar</b></label>
                  <input type="date" class="form-control" id="tanggal_bayar" name="tanggal_bayar" required><br><br>
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