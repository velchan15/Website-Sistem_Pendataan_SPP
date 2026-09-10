@extends('layouts.template')
@section('title', 'Data Tagihan')

@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
      <div class="section-header">
          <h1>Data Tagihan</h1>
      </div>
        <div class="section-body">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  @if (auth()->user()->level == 'admin' || auth()->user()->level == 'petugas')
                    <a href="{{ route('tagihan.create') }}" class="fas fa-plus btn btn-primary">Tambah Data Tagihan</a>
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
                            <th>Jumlah Tagihan</th>
                            <th>Tanggal Bayar</th>
                            @if (auth()->user()->level == 'admin' || auth()->user()->level == 'petugas')
                            <th>Action</th>
                            @endif
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($tagihan as $i => $t)
                            <tr>
                              <td>{{ $i += 1 }}</td>
                               <td>{{ $t->siswa->nis }}</td>
                               <td>{{ $t->siswa->user->name }}</td>
                               <td>{{ $t->jumlah_tagihan }}</td>
                               <td>{{ $t->tanggal_bayar }}</td>
                               <td>
                                @if (auth()->user()->level == 'admin' || auth()->user()->level == 'petugas')
                                <a href="{{ route('pembayaran.create', ['tagihan' => $t->id_tagihan]) }}" class="btn btn-success">Bayar</a>
                                @endif
                                @if (auth()->user()->level == 'admin')
                                 <a href="{{ route('tagihan.edit', ['tagihan' => $t->id_tagihan]) }}" class="btn btn-warning">Edit</a>
                                 <form action="{{ route('tagihan.destroy', ['tagihan' => $t->id_siswa]) }}" method="post" class="d-inline" id="delete{{ $t->id_siswa }}">
                                   @method('delete')
                                   @csrf
                                   <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Hapus</button>
                                 </form>
                                 @endif
                               </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                       @if (auth()->user()->level == 'admin' || auth()->user()->level == 'petugas')
                       <button type="button" class="btn btn-info" id="print-button">Print</button>
                       @endif
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
  </section>
</div>

<script>
    document.getElementById('print-button').addEventListener('click', (event) => {
        window.print();
    });
</script>

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