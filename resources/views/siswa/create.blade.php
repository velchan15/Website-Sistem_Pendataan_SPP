@extends('layouts.template')
@section('title', 'Tambah Data Siswa')

@section('content')

<div class="main-content">
  <section class="section">
    <div class="section-header"><h1>Tambah Data Siswa</h1></div>
    <div class="section-body">
      <div class="row">
        <div class="col-9">
          <div class="card">
            <div class="card-hearder">
              <a href="{{ route('siswa.index') }}" class="btn btn-primary">Kembali</a>
            </div>
             <div class="card-body p-0">
              <form action="{{ route('siswa.store') }}" method="post">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="nis" class="form-label"><b>NIS</b></label>
                  <input type="text" class="form-control" id="nis" name="nis" required autofocus value="{{ old('nis') }}"><br><br>
                  <label for="name" class="form-label"><b>Nama Siswa</b></label>
                  <input type="text" class="form-control" id="name" name="name" required autofocus value="{{ old('name') }}"><br><br>
                  <label for="usernmae" class="form-label"><b>Username</b></label>
                  <input type="text" class="form-control" id="username" name="username" required autofocus value="{{ old('username') }}"><br><br>
                  <label for="password" class="form-label"><b>Password</b></label>
                  <input type="password" class="form-control" id="password" name="password" required><br><br>
                  <label for="no_telepon" class="form-label"><b>No Telepon</b></label>
                  <input type="text" class="form-control" id="no_telepon" name="no_telepon" required autofocus value="{{ old('no_telepon') }}"><br><br>
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