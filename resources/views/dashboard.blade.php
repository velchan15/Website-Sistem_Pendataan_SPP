@extends('layouts.template')
@section('title', 'Dashboard')

@section('content')
<!-- Main Content -->
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
          </div>
          <div class="row">
            <div class="col-lg-4 col-md-9 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-money-bill-alt"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Pelunasan bulan ini</h4>
                  </div>
                  <div class="card-body">
                    {{ $total_pelunasan }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-9 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="fas fa-money-bill-wave"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total tunggakan</h4>
                  </div>
                  <div class="card-body">
                    {{ $total_tunggakan }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Jumlah siswa</h4>
                  </div>
                  <div class="card-body">
                    {{ $jumlah_siswa }}
                  </div>
                </div>
              </div>
            </div>
          </div>
              <div class="card mt-sm-25 mt-md-0">
                <div class="card-header">
                  <h4>Data Pelunasan Terbaru</h4>
                </div>
                <div class="card-body">
                  <div id="table"></div>
                    <style>
                      table {
                        font-family: arial, sans-serif;
                        border-collapse: collapse;
                        width: 101%;
                      }

                      td, th {
                        border: 1px solid #dddddd;
                        text-align: left;
                        padding: 8px;
                      }

                      tr:nth-child(even) {
                        background-color: #dddddd;
                      }
                    </style>
                        <table>
                          <tr>
                            <th class="text-center">No</th>
                            <th>Nama Siswa</th>
                            <th>Tanggal pelunasan</th>
                            <th>Untuk SPP</th>
                            <th>Total</th>
                          </tr>
                          <tr>
                            <td>1</td>
                            <td>Andri</td>
                            <td>08 Maret 2022</td>
                            <td>Maret</td>
                            <td>Rp.450.000</td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>Antonio</td>
                            <td>10 Maret 2022</td>
                            <td>Maret</td>
                            <td>Rp.450.000</td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>Cadra</td>
                            <td>04 Februari 2022</td>
                            <td>Februari</td>
                            <td>Rp.450.000</td>
                          </tr>
                          <tr>
                           <td>4</td>
                            <td>Christopher</td>
                            <td>08 Februari 2022</td>
                            <td>Februari</td>
                            <td>Rp.450.000</td>
                          </tr>
                          <tr>
                           <td>5</td>
                            <td>Dessy</td>
                            <td>10 Januari 2022</td>
                            <td>Januari</td>
                            <td>Rp.450.000</td>
                          </tr>
                          <tr>
                            <td>6</td>
                            <td>Diana</td>
                            <td>10 Januari 2022</td>
                            <td>Januari</td>
                            <td>Rp.450.000</td>
                          </tr>
                        </table>
                </div>
              </div>
            </div>
        </section>
@endsection