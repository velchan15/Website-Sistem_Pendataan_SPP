@extends('layouts.template')
@section('title', 'Data Pembayaran')

@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
      <div class="section-header">
          <h1>Data Pembayaran</h1>
      </div>
        <div class="section-body">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  @if (auth()->user()->level == 'admin' || auth()->user()->level == 'petugas')
                    <a href="{{ route('pembayaran.create') }}" class="btn btn-primary fas fa-plus">Tambah Data Pembayaran</a>
                  @endif
                 </div>
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
                          @foreach($pembayaran as $i => $byr)
                            <tr>
                              <td>{{ $i += 1 }}</td>
                               <td>{{ $byr->tagihan->siswa->nis }}</td>
                               <td>{{ $byr->tagihan->siswa->user->name }}</td>
                               <td>{{ $byr->jumlah_bayar }}</td>
                               <td>{{ $byr->tanggal_bayar }}</td>
                               @if (auth()->user()->level == 'admin' || auth()->user()->level == 'petugas')
                               <td>
                                 <a href="{{ route('pembayaran.edit', ['pembayaran' => $byr->id_pembayaran]) }}" class="btn btn-warning">Edit</a>
                                 @endif
                                  @if (auth()->user()->level == 'admin')
                                 <form action="{{ route('pembayaran.destroy', ['pembayaran' => $byr->id_pembayaran]) }}" method="post" class="d-inline" id="delete{{ $byr->id_pembayaran }}">
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