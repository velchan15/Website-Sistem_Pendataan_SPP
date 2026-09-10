@extends('layouts.template')
@section('title', 'Data Siswa')

@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Siswa</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('siswa.create') }}" class="fas fa-plus btn btn-primary">Tambah Siswa</a>
                        </div>
                        <div class="card-body p-0">
                          <div class="table-responsive px-5">
                            <table class="table table-striped" id="siswaTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>NIS</th>
                                        <th>Nama Siswa</th>
                                        <th>No Telepon</th>
                                        @if (auth()->user()->level == 'admin' || auth()->user()->level == 'petugas')
                                        <th>Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($siswa as $i => $sis)
                                    <tr>
                                        <td>{{ $i += 1 }}</td>
                                        <td>{{ $sis->nis }}</td>
                                        <td>{{ $sis->user->name }}</td>
                                        <td>{{ $sis->no_telepon }}</td>
                                        @if (auth()->user()->level == 'admin' || auth()->user()->level == 'petugas')
                                        <td>
                                            <a href="{{ route('siswa.edit', ['siswa' => $sis->id_siswa]) }}" class="btn btn-warning">Edit</a>
                                        @endif
                                         @if (auth()->user()->level == 'admin')
                                            <form action="{{ route('siswa.destroy', ['siswa' => $sis->id_siswa]) }}" method="post" class="d-inline" id="delete{{ $sis->id_siswa }}">
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