@extends('layouts.template')
@section('title', 'Data Tabungan')

@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
      <div class="section-header">
          <h1>Data Tabungan</h1>
      </div>
        <div class="section-body">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  @if (auth()->user()->level == 'admin' || auth()->user()->level == 'petugas')
                    <a href="{{ route('tabungan.create') }}" class="fas fa-plus btn btn-primary">Tambah Data Tabungan</a>
                  @endif
                 </div>
                  <div class="card-body p-0">
                  <div class="card-body p-0">
                    <div class="table-responsive px-5">
                      <table class="table table-striped" id="siswaTable">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Jumlah Bayar</th>
                            <th>Tanggal Bayar</th>
                            @if (auth()->user()->level == 'admin' || auth()->user()->level == 'petugas')
                            <th>Action</th>
                            @endif
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($tabungan as $i => $tabungan)
                            <tr>
                              <td>{{ $i += 1 }}</td>
                               <td>{{ $tabungan->siswa->nis }}</td>
                               <td>{{ $tabungan->siswa->user->name }}</td>
                               <td>{{ $tabungan->jumlah_bayar }}</td>
                               <td>{{ $tabungan->tanggal_bayar }}</td>
                               @if (auth()->user()->level == 'admin' || auth()->user()->level == 'petugas')
                               <td>
                                <a href="{{ route('tabungan.edit', ['tabungan' => $tabungan->id_siswa]) }}" class="btn btn-warning">Edit</a>
                                @endif
                                 @if (auth()->user()->level == 'admin')
                                 <form action="{{ route('tabungan.destroy', ['tabungan' => $tabungan->id_siswa]) }}" method="post" class="d-inline" id="delete{{ $tabungan->id_siswa }}">
                                   @method('delete')
                                   @csrf
                                   <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Hapus</button>
                                 </form>
                               </td>
                               @endif
                            </tr>
                          @endforeach
                        </tbody>
                        
                      </table>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
  </section>
</div>
@endsection

@push('addon-script')
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    $(document).ready(function() {
      $('#siswaTable').DataTable();
    });
  </script>
@endpush