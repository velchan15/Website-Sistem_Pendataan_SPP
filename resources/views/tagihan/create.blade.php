@extends('layouts.template')
@section('title', 'Data Tagihan')

@section('content')

<div class="main-content">
  <section class="section">
    <div class="section-header"><h1>Data Tagihan</h1></div>
    <div class="section-body">
      <div class="row">
        <div class="col-9">
          <div class="card">
            <div class="card-hearder">
              <a href="{{ route('tagihan.index') }}" class="btn btn-primary">Kembali</a>
            </div>
             <div class="card-body p-0">
              <form action="{{ route('tagihan.store') }}" method="post">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="nis" class="form-label"><b>NIS</b></label>
                  <input type="text" class="form-control" id="nis" name="nis" required autofocus value="{{ old('nis') }}"><br><br>
                  <label for="jumlah_bayar" class="form-label"><b>Jumlah Tagihan</b></label>
                  <input type="text" class="form-control" id="jumlah_tagihan" name="jumlah_tagihan" required autofocus value="{{ old('jumlah_tagihan') }}"><br><br>
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