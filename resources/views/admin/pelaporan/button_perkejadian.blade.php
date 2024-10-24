@extends('admin.layout.main')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><b>LAPORAN KEJADIAN</b></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="{{ route('DashboardAdmin') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Laporan Kejadian</li>
            </ol>
            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body"><b>KEJADIAN PENYELAMATAN</b></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{ route('Pelaporan.penyelamatan') }}">Masuk tambah data penanganan</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body"><b> KEJADIAN KEBAKARAN</b></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{ route('Pelaporan.kebakaran') }}">Masuk tambah data penanganan</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body"><b> TAMBAH DATA</b></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{ route('Pelaporan.create') }}">Masuk tambah
                                data penanganan</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">Danger Card</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div> --}}
            </div>
            {{-- <div class="row">
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-area me-1"></i>
                            Data Kebakaran dan non-kebakaran 2023
                        </div>
                        <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            Bar Chart Example
                        </div>
                        <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-12 d-flex align-items-center justify-content-between" style="padding-bottom: 20px;">
                            <div class="d-flex align-items-center">
                                <i class="fa-regular fa-newspaper" style="color: #000000;"></i>
                                <b class="ms-2">BERITA</b>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="me-3 ">
                                    <select id="select-month" class="form-select form-select-sm" style="width: 150px;">
                                        <option value="">-Pilih Bulan-</option>
                                        <option value="JA">Januari</option>
                                        <option value="FE">Februari</option>
                                        <option value="MA">Maret</option>
                                        <option value="AP">April</option>
                                        <option value="ME">Mei</option>
                                        <option value="JU">Juni</option>
                                        <option value="JL">Juli</option>
                                        <option value="AG">Agustus</option>
                                        <option value="SE">September</option>
                                        <option value="OK">Oktober</option>
                                        <option value="NO">November</option>
                                        <option value="DE">Desember</option>
                                    </select>
                                </div>
                                <div class="me-3">
                                    <select id="select-year" class="form-select form-select-sm" style="width: 120px;">
                                        <option value="">-Pilih Tahun-</option>
                                        <option value="2023">2023</option>
                                        <option value="2022">2022</option>
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                    </select>
                                </div>
                                <a class="btn btn-success btn-sm" href="#">
                                    <i class="fa fa-plus"></i> &nbsp;Tambah
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered" id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td>2011/04/25</td>
                                <td>$320,800</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div> --}}
        </div>
    </main>
@endsection
