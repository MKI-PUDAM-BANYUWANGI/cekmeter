@extends('layout.dashboard-layout')

@section('title','Admin Dashboard - Data Staff')

@section('main-content')

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header bg-primary">
            <h3 style="color:white;">Form Ubah Data Staff/User</h3>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
        <div class="card-body">
            <form action="{{ route('staff.update', $staff->id) }}" method="POST">
            @csrf
            @method('PUT')
                <div class="form-group">
                    <label for="nip" class="form-label">NIP</label>
                    <input type="number" class="form-control" id="nip" name="nip" value="{{ $staff->nip }}" required>
                </div>
                <div class="form-group">
                    <label for="namastaff" class="form-label">Nama Staff</label>
                    <input type="text" class="form-control" id="namastaff"  name="nama_staff" value="{{ $staff->nama_staff }}" required>
                </div>
                <div class="form-group">
                    <label for="notelepon" class="form-label">No. Telepon</label>
                    <input type="number" class="form-control" id="notelepon" name="no_telepon" value="{{ $staff->no_telepon }}" required>
                </div>
                <div class="form-group">
                    <label for="wilayah" class="form-label">Wilayah</label>
                    <select id="wilayah" name="wilayah" class="form-control" required>
                        <option selected>Pilih Wilayah</option>
                        <option value="01 - Banyuwangi" {{ $staff->wilayah == '01 - Banyuwangi' ? 'selected' : '' }}>01 - Banyuwangi</option>
                        <option value="02 - Rogojampi" {{ $staff->wilayah == '02 - Rogojampi' ? 'selected' : '' }}>02 - Rogojampi</option>
                        <option value="03 - Muncar" {{ $staff->wilayah == '03 - Muncar' ? 'selected' : '' }}>03 - Muncar</option>
                        <option value="04 - Genteng" {{ $staff->wilayah == '04 - Genteng' ? 'selected' : '' }}>04 - Genteng</option>
                        <option value="05 - Wongsorejo" {{ $staff->wilayah == '05 - Wongsorejo' ? 'selected' : '' }}>05 - Wongsorejo</option>
                        <option value="06 - Tegaldlimo" {{ $staff->wilayah == '06 - Tegaldlimo' ? 'selected' : '' }}>06 - Tegaldlimo</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="{{ $staff->password }}" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection