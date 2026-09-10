@extends('layouts.template')
@section('title', 'Data Tabungan')

@section('content')

<div class="main-content">
  <section class="section">
    <div class="section-header"><h1>Data Tabungan</h1></div>
    <div class="section-body">
      <div class="row">
        <div class="col-9">
          <div class="card">
            <div class="card-hearder">
              <a href="{{ route('tabungan.index') }}" class="btn btn-primary">Kembali</a>
            </div>
             <div class="card-body p-0">
              <form action="{{ route('tabungan.store') }}" method="post">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="nis" class="form-label"><b>NIS</b></label>
                  <input type="text" class="form-control" id="nis" name="nis" required autofocus value="{{ old('nis') }}"><br><br>
                  <label for="jumlah_bayar" class="form-label"><b>Jumlah Bayar</b></label>
                  <input type="text" class="form-control" id="jumlah_bayar" name="jumlah_bayar" required autofocus value="{{ old('jumlah_bayar') }}"><br><br>
                  <label for="tanggal_bayar" class="form-label"><b>Tanggal Bayar</b></label>
                  <input type="date" class="form-control" id="tanggal_bayar" name="tanggal_bayar" required><br><br>
                  <label for="untuk_spp" class="form-label"><b>Untuk SPP</b></label>
                  <input type="text" class="form-control" id="untuk_spp" name="untuk_spp" required autofocus value="{{ old('untuk_spp') }}"><br><br>
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