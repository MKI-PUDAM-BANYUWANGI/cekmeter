@extends('layout.dashboard-layout')

@section('title','Admin Dashboard - Data Staff')

@section('main-content')

{{-- Tabel Data User --}}
<div class="container-fluid">
    <div class="d-flex flex-wrap justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Petugas Lapangan - CekMeter Air PUDAM Banyuwangi</h1>
        <a href="{{ route('staff.create') }}" class="btn btn-sm btn-primary shadow-sm d-sm-inline-block d-block"><i
                class="fas fa-plus fa-sm text-white-50"></i> Tambah Data <i></i></a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width:"100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">NIP</th>
                            <th scope="col">Nama</th>
                            <th scope="col">No.Telp</th>
                            <th scope="col">Wilayah</th>
                            <th scope="col">Password</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($staffs as $i => $object)
                        <tr class="text-center">
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $object->nip }}</td>
                            <td>{{ $object->nama_staff }}</td>
                            <td>{{ $object->no_telepon }}</td>
                            <td>{{ $object->wilayah->nama_wilayah }}</td>
                            <td>{{ $object->password }}</td>
                            <td>
                                <!-- Update Button -->
                                <a href="{{ route('staff.edit', $object->nip)}}" class="btn btn-info"><i
                                        class="fas fa-edit"></i></a>
                                <!-- Delete Button -->
                                <form id="delete-form-{{ $object->nip }}" action="{{route('staff.destroy', $object->nip)}}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger" onclick="confirmDeleteStaff({{ $object->nip }})">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        {{-- @empty
                        <tr>
                            <td colspan="10" class="text-center">Data Masih Kosong</td>
                        </tr> --}}
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>


@endsection


