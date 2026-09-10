@extends('layouts.template')
@section('title', 'Data Tunggakan')

@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
      <div class="section-header">
          <h1>Data Tunggakan</h1>
      </div>
        <div class="section-body">
          <div class="row">
            <div class="col-12">
              <div class="card">
                  <div class="card-body p-0">
                  <div class="card-body p-0">
                    <div class="table-responsive px-5">
                      <table class="table table-striped" id="siswaTable">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>SPP Bulan</th>
                        <th>Jumlah Tunggakan</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                        $i = 1;
                      @endphp
                      @foreach($tagihan as $t)
                        @php
                          $total_bayar = $t->pembayaran->reduce(function ($sum, $item) {
                            return $sum + $item->jumlah_bayar;
                          }, 0);
                          $tunggakan = $t->jumlah_tagihan - $total_bayar;
                        @endphp
                        @if ($tunggakan > 0)
                        <tr>
                          <td>{{ $i += 1 }}</td>
                          <td>{{ $t->siswa->nis }}</td>
                          <td>{{ $t->siswa->user->name }}</td>
                          <td>{{ $t->tanggal_bayar }}</td>
                          <td>{{ $tunggakan }}</td>
                        </tr>
                        @endif
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
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>

<script>
  $(document).ready(function() {
    $('#siswaTable').DataTable();
  });
</script>
@endpush