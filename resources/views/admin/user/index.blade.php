@extends('admin.layout.main')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4"><b>KELOLA PENGGUNA</b></h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Kelola Pengguna</li>
            </ol>
            <div class="card mb-4">
                {{-- <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-12 d-flex align-items-center justify-content-between flex-wrap"
                            style="padding-bottom: 20px;">
                            <div class="d-flex align-items-center">
                                <i class="fa-regular fa-user" style="color: #000000;"></i> &nbsp;
                                <b class="ms-2">KELOLA PENGGUNA</b>
                            </div>
                            <div class="d-flex align-items-center flex-wrap">
                                <a class="btn btn-success btn-sm mb-2" href="{{ route('User.create') }}">
                                    <i class="fa fa-plus"></i> &nbsp;Tambah
                                </a>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-12 d-flex align-items-center justify-content-between flex-wrap">
                            <div class="d-flex align-items-center">
                                <i class="fa-regular fa-user" style="color: #000000;"></i> &nbsp;
                                <b class="ms-2">KELOLA PENGGUNA</b>
                            </div>
                            <nav class="d-flex align-items-center">
                                <a class="btn btn-success btn-sm mb-2" href="{{ route('User.create') }}">
                                    <i class="fa fa-plus"></i> &nbsp;Tambah
                                </a>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <table class="table table-striped table-bordered" id="datatablesSimple">
                        <thead>
                            <tr class="tampilantabel">
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>Jabatan</th>
                                <th>Detail</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->nip }}</td>
                                    <td>{{ $user->jabatan }}</td>
                                    <td><button class="btn btn-sm" style="background: none; border: none; color: blue;"
                                            data-bs-toggle="modal" data-bs-target="#userDetailModal-{{ $user->id }}">
                                            <i class="fas fa-eye" style="font-size: 15px;"></i>
                                        </button></td>
                                    <td style="white-space: nowrap;">
                                        <div
                                            style="display: flex; justify-content: space-around; align-items: center; gap: 4px;">
                                            {{-- <button class="btn btn-sm" style="background: none; border: none; color: blue;"
                                                data-bs-toggle="modal"
                                                data-bs-target="#userDetailModal-{{ $user->id }}">
                                                <i class="fas fa-eye" style="font-size: 15px;"></i>
                                            </button> --}}
                                            <a class="btn btn-sm" href="{{ route('User.edit', $user->id) }}"
                                                style="background: none; border: none; color: orange; padding: 0;">
                                                <i class="fas fa-edit" style="font-size: 15px;"></i>
                                            </a>
                                            <form action="{{ route('User.destroy', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm"
                                                    style="background: none; border: none; color: red; padding: 0;"
                                                    onclick="return confirm('Yakin ingin menghapus?')">
                                                    <i class="fas fa-trash-alt" style="font-size: 15px;"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal for user details -->
                                {{-- <div class="modal fade" id="userDetailModal-{{ $user->id }}" tabindex="-1"
                                    aria-labelledby="userDetailModalLabel-{{ $user->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="userDetailModalLabel-{{ $user->id }}">
                                                    <b>DETAIL PENGGUNA</b>
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="detail-item">
                                                    <span class="detail-label" style="font-weight: bold;">NIP</span>
                                                    <span class="detail-value">: &nbsp;{{ $user->nip }}</span>
                                                </div>
                                                <div class="detail-item">
                                                    <span class="detail-label" style="font-weight: bold;">Jabatan</span>
                                                    <span class="detail-value">: &nbsp;{{ $user->jabatan }}</span>
                                                </div>
                                                <div class="detail-item">
                                                    <span class="detail-label" style="font-weight: bold;">Jenis Kelamin</span>
                                                    <span class="detail-value">: &nbsp;{{ $user->jenis_kelamin }}</span>
                                                </div>
                                                <div class="detail-item">
                                                    <span class="detail-label" style="font-weight: bold;">Tempat Lahir</span>
                                                    <span class="detail-value">: &nbsp;{{ $user->tempat_lahir }}</span>
                                                </div>
                                                <div class="detail-item">
                                                    <span class="detail-label" style="font-weight: bold;">Tanggal Lahir</span>
                                                    <span class="detail-value">: &nbsp;{{ \Carbon\Carbon::parse($user->tanggal_lahir)->format('d-m-Y') }}</span>
                                                </div>
                                                <div class="detail-item">
                                                    <span class="detail-label" style="font-weight: bold;">Pendidikan Terakhir</span>
                                                    <span class="detail-value">: &nbsp;{{ $user->pendidikan_terakhir }}</span>
                                                </div>
                                                <div class="detail-item">
                                                    <span class="detail-label" style="font-weight: bold;">Status Pekerjaan</span>
                                                    <span class="detail-value">: &nbsp;{{ $user->status_pekerjaan }}</span>
                                                </div>
                                                <div class="detail-item">
                                                    <span class="detail-label" style="font-weight: bold;">Alamat</span>
                                                    <span class="detail-value">: &nbsp;{{ $user->alamat }}</span>
                                                </div>
                                                <div class="detail-item">
                                                    <span class="detail-label" style="font-weight: bold;">Email</span>
                                                    <span class="detail-value">: &nbsp;{{ $user->email }}</span>
                                                </div>
                                                <div class="detail-item">
                                                    <span class="detail-label" style="font-weight: bold;">Telepon</span>
                                                    <span class="detail-value">: &nbsp;{{ $user->telepon }}</span>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="modal fade" id="userDetailModal-{{ $user->id }}" tabindex="-1"
                                    aria-labelledby="userDetailModalLabel-{{ $user->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="userDetailModalLabel-{{ $user->id }}">
                                                    <b>DETAIL PENGGUNA</b>
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                {{-- <div class="card">
                                                    <div class="card-header">
                                                        <b>Informasi Pengguna</b>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="detail-item mb-2">
                                                            <span class="detail-label" style="font-weight: bold;">NIP</span>
                                                            <span class="detail-value">: &nbsp;{{ $user->nip }}</span>
                                                        </div>
                                                        <div class="detail-item mb-2">
                                                            <span class="detail-label"
                                                                style="font-weight: bold;">Jabatan</span>
                                                            <span class="detail-value">: &nbsp;{{ $user->jabatan }}</span>
                                                        </div>
                                                        <div class="detail-item mb-2">
                                                            <span class="detail-label" style="font-weight: bold;">Jenis
                                                                Kelamin</span>
                                                            <span class="detail-value">:
                                                                &nbsp;{{ $user->jenis_kelamin }}</span>
                                                        </div>
                                                        <div class="detail-item mb-2">
                                                            <span class="detail-label" style="font-weight: bold;">Tempat
                                                                Lahir</span>
                                                            <span class="detail-value">:
                                                                &nbsp;{{ $user->tempat_lahir }}</span>
                                                        </div>
                                                        <div class="detail-item mb-2">
                                                            <span class="detail-label" style="font-weight: bold;">Tanggal
                                                                Lahir</span>
                                                            <span class="detail-value">:
                                                                &nbsp;{{ \Carbon\Carbon::parse($user->tanggal_lahir)->format('d-m-Y') }}</span>
                                                        </div>
                                                        <div class="detail-item mb-2">
                                                            <span class="detail-label" style="font-weight: bold;">Pendidikan
                                                                Terakhir</span>
                                                            <span class="detail-value">:
                                                                &nbsp;{{ $user->pendidikan_terakhir }}</span>
                                                        </div>
                                                        <div class="detail-item mb-2">
                                                            <span class="detail-label" style="font-weight: bold;">Status
                                                                Pekerjaan</span>
                                                            <span class="detail-value">:
                                                                &nbsp;{{ $user->status_pekerjaan }}</span>
                                                        </div>
                                                        <div class="detail-item mb-2">
                                                            <span class="detail-label"
                                                                style="font-weight: bold;">Alamat</span>
                                                            <span class="detail-value">: &nbsp;{{ $user->alamat }}</span>
                                                        </div>
                                                        <div class="detail-item mb-2">
                                                            <span class="detail-label"
                                                                style="font-weight: bold;">Email</span>
                                                            <span class="detail-value">: &nbsp;{{ $user->email }}</span>
                                                        </div>
                                                        <div class="detail-item mb-2">
                                                            <span class="detail-label"
                                                                style="font-weight: bold;">Telepon</span>
                                                            <span class="detail-value">: &nbsp;{{ $user->telepon }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                                <div class="modal-body">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <b>Informasi Pengguna</b>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row mb-2">
                                                                <div class="col-4">
                                                                    <span class="detail-label"
                                                                        style="font-weight: bold;">NIP</span>
                                                                </div>
                                                                <div class="col-8">
                                                                    <span class="detail-value">:
                                                                        &nbsp;{{ $user->nip }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2">
                                                                <div class="col-4">
                                                                    <span class="detail-label"
                                                                        style="font-weight: bold;">Jabatan</span>
                                                                </div>
                                                                <div class="col-8">
                                                                    <span class="detail-value">:
                                                                        &nbsp;{{ $user->jabatan }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2">
                                                                <div class="col-4">
                                                                    <span class="detail-label"
                                                                        style="font-weight: bold;">Jenis Kelamin</span>
                                                                </div>
                                                                <div class="col-8">
                                                                    <span class="detail-value">:
                                                                        &nbsp;{{ $user->jenis_kelamin }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2">
                                                                <div class="col-4">
                                                                    <span class="detail-label"
                                                                        style="font-weight: bold;">Tempat Lahir</span>
                                                                </div>
                                                                <div class="col-8">
                                                                    <span class="detail-value">:
                                                                        &nbsp;{{ $user->tempat_lahir }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2">
                                                                <div class="col-4">
                                                                    <span class="detail-label"
                                                                        style="font-weight: bold;">Tanggal Lahir</span>
                                                                </div>
                                                                <div class="col-8">
                                                                    <span class="detail-value">:
                                                                        &nbsp;{{ \Carbon\Carbon::parse($user->tanggal_lahir)->format('d-m-Y') }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2">
                                                                <div class="col-4">
                                                                    <span class="detail-label"
                                                                        style="font-weight: bold;">Pendidikan
                                                                        Terakhir</span>
                                                                </div>
                                                                <div class="col-8">
                                                                    <span class="detail-value">:
                                                                        &nbsp;{{ $user->pendidikan_terakhir }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2">
                                                                <div class="col-4">
                                                                    <span class="detail-label"
                                                                        style="font-weight: bold;">Status Pekerjaan</span>
                                                                </div>
                                                                <div class="col-8">
                                                                    <span class="detail-value">:
                                                                        &nbsp;{{ $user->status_pekerjaan }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2">
                                                                <div class="col-4">
                                                                    <span class="detail-label"
                                                                        style="font-weight: bold;">Alamat</span>
                                                                </div>
                                                                <div class="col-8">
                                                                    <span class="detail-value">:
                                                                        &nbsp;{{ $user->alamat }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2">
                                                                <div class="col-4">
                                                                    <span class="detail-label"
                                                                        style="font-weight: bold;">Email</span>
                                                                </div>
                                                                <div class="col-8">
                                                                    <span class="detail-value">:
                                                                        &nbsp;{{ $user->email }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2">
                                                                <div class="col-4">
                                                                    <span class="detail-label"
                                                                        style="font-weight: bold;">Telepon</span>
                                                                </div>
                                                                <div class="col-8">
                                                                    <span class="detail-value">:
                                                                        &nbsp;{{ $user->telepon }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Tutup</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <script>
        setTimeout(function() {
            document.getElementById('success-alert').style.display = 'none';
        }, 2000); // 2000 milidetik = 2 detik
    </script>
@endsection
