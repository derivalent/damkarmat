{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Pengguna</h1>
    <form action="{{ route('User.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" required>
        </div>
        <div class="form-group">
            <label for="password_confirmation">Konfirmasi Password</label>
            <input type="password" class="form-control" name="password_confirmation" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection --}}
{{--
@extends('admin.layout.main')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4"><b>KELOLA USER - ADMIN</b></h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Kelola User</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <b>TAMBAH PENGGUNA</b>
                </div>
                <div class="card-body">
                    <form action="{{ route('User.store') }}" method="POST">
                        @csrf
                        <div class="form-group row mb-3">
                            <label for="nip" class="col-sm-2 col-form-label">NIP </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nip" name="nip" required>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Nama </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-sm-2 col-form-label">Jenis Kelamin </label>
                            <div class="col-sm-10">
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin"
                                            id="jenis_kelamin_pria" value="pria" required>
                                        <label class="form-check-label" for="jenis_kelamin_pria">Pria</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin"
                                            id="jenis_kelamin_wanita" value="wanita" required>
                                        <label class="form-check-label" for="jenis_kelamin_wanita">Wanita</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir </label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="pendidikan_terakhir" class="col-sm-2 col-form-label">Pendidikan Terakhir </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="pendidikan_terakhir"
                                    name="pendidikan_terakhir" required>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="jabatan" class="col-sm-2 col-form-label">Jabatan </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="jabatan" name="jabatan" required>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="status_pekerjaan" class="col-sm-2 col-form-label">Status Pekerjaan </label>
                            <div class="col-sm-10">
                                <select class="form-control" id="status_pekerjaan" name="status_pekerjaan" required>
                                    <option value="">-Pilih Status-</option>
                                    <option value="pns">PNS</option>
                                    <option value="pppk">PPPK</option>
                                    <option value="honorer">Honorer</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="role" class="col-sm-2 col-form-label">Role </label>
                            <div class="col-sm-10">
                                <select class="form-control" id="role" name="role" required>
                                    <option value="">-Pilih Role-</option>
                                    @foreach ($roles as $data)
                                        <option value="{{ $data->id_role }}">{{ $data->role }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat </label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Email </label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="telepon" class="col-sm-2 col-form-label">Telepon </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="telepon" name="telepon" required>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="password" class="col-sm-2 col-form-label">Password </label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection --}}

@extends('admin.layout.main')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4"><b>KELOLA USER - ADMIN</b></h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Kelola User</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <b>TAMBAH PENGGUNA</b>
                </div>
                <div class="card-body">
                    <form action="{{ route('User.store') }}" method="POST">
                        @csrf
                        <div class="form-group row mb-3">
                            <label for="nip" class="col-sm-2 col-form-label">NIP </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nip" name="nip" value="{{ old('nip') }}" required>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Nama </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-sm-2 col-form-label">Jenis Kelamin </label>
                            <div class="col-sm-10">
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin"
                                            id="jenis_kelamin_pria" value="pria" {{ old('jenis_kelamin') == 'pria' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="jenis_kelamin_pria">Pria</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin"
                                            id="jenis_kelamin_wanita" value="wanita" {{ old('jenis_kelamin') == 'wanita' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="jenis_kelamin_wanita">Wanita</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir </label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="pendidikan_terakhir" class="col-sm-2 col-form-label">Pendidikan Terakhir </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="pendidikan_terakhir" name="pendidikan_terakhir" value="{{ old('pendidikan_terakhir') }}" required>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="jabatan" class="col-sm-2 col-form-label">Jabatan </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ old('jabatan') }}" required>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="status_pekerjaan" class="col-sm-2 col-form-label">Status Pekerjaan </label>
                            <div class="col-sm-10">
                                <select class="form-control" id="status_pekerjaan" name="status_pekerjaan" required>
                                    <option value="">-Pilih Status-</option>
                                    <option value="pns" {{ old('status_pekerjaan') == 'pns' ? 'selected' : '' }}>PNS</option>
                                    <option value="pppk" {{ old('status_pekerjaan') == 'pppk' ? 'selected' : '' }}>PPPK</option>
                                    <option value="honorer" {{ old('status_pekerjaan') == 'honorer' ? 'selected' : '' }}>Honorer</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="role" class="col-sm-2 col-form-label">Role </label>
                            <div class="col-sm-10">
                                <select class="form-control" id="role" name="role" required>
                                    <option value="">-Pilih Role-</option>
                                    @foreach ($roles as $data)
                                        <option value="{{ $data->id_role }}" {{ old('role') == $data->id_role ? 'selected' : '' }}>{{ $data->role }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat </label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ old('alamat') }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Email </label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="telepon" class="col-sm-2 col-form-label">Telepon </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="telepon" name="telepon" value="{{ old('telepon') }}" required>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="password" class="col-sm-2 col-form-label">Password </label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
