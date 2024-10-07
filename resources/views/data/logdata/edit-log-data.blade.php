@extends('layout.dashboard-layout')

@section('title','Admin Dashboard - Edit Pelanggan')

@section('main-content')
<div class="container-fluid">
    <div class="card card-info card-outline">
        <div class="card-header bg-primary">
            <h3 style="color:white;">Form Ubah Log Data Cek Meter</h3>
            @if ($errors->any())
            <div class="alert alert-danger my-3">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if (Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if (Session::get('error'))
            <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                {{ Session::get('danger') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
        </div>
        <div class="card-body">
            <form action="{{ route('logdata.update', $logdata->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="petugas_id">ID Petugas</label>
                    <select class="form-control" id="petugas_id" name="petugas_id">
                        <option value="">Pilih ID</option>
                        @foreach($staff as $petugas)
                        <option value="{{ $petugas->id }}" {{ $petugas->id == $logdata->merk_meter_id ? 'selected' : ''
                            }}>{{ $petugas->nip }}-{{ $petugas->nama_staff }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="pelanggan_id">No SP Pelanggan</label>
                    <select class="form-control" id="pelanggan_id" name="pelanggan_id">
                        <option value="">No SP Pelanggan</option>
                        @foreach($pelanggan as $pelanggans)
                        <option value="{{ $pelanggans->id }}" {{ $pelanggans->id == $logdata->pelanggan_id ? 'selected'
                            : '' }}>{{ $pelanggans->no_sp }}-{{ $pelanggans->nama_pelanggan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="merk_meter_id">Merk Meter</label>
                    <select class="form-control" id="merk_meter_id" name="merk_meter_id">
                        <option value="">Pilih Merk Meter</option>
                        @foreach($merkmeter as $meter)
                        <option value="{{ $meter->id }}" {{ $meter->id == $logdata->merk_meter_id ? 'selected' : ''
                            }}>{{ $meter->nama_merk }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="kondisi_meter">Kondisi Meter</label>
                    <div>
                        <input type="radio" id="baik" name="kondisi_meter" value="Baik" {{ old('kondisi_meter',
                            $logdata->kondisi_meter) == 'Baik' ? 'checked' : '' }}>
                        <label for="baik">Baik</label>
                    </div>
                    <div>
                        <input type="radio" id="rusak" name="kondisi_meter" value="Rusak" {{ old('kondisi_meter',
                            $logdata->kondisi_meter) == 'Rusak' ? 'checked' : '' }}>
                        <label for="rusak">Rusak</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ket_kondisi">Keterangan Kondisi Merk Meter <span>(Opsional)</span></label>
                    <textarea name="ket_kondisi" id="ket_kondisi" class="form-control" rows="3"
                        placeholder="Masukan Keterangan Kondisi Merk Meter">{{old('ket_kondisi', $logdata->ket_kondisi)}}</textarea>
                </div>
                <div class="form-group">
                    <label for="foto_meter">Foto Meter</label>
                    <input type="file" class="form-control" id="foto_meter" name="foto_meter">
                    @if ($logdata->foto_meter)
                    <img src="{{ asset('storage/' . $logdata->foto_meter) }}" alt="Foto Meter"
                        style="max-width: 100px; margin-top: 10px;">
                    @endif
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                    <button type="reset" class="btn btn-danger">Reset Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection