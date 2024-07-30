@extends('layout.dashboard-layout')

@section('title','Admin Dashboard - Merk Meter')

@section('main-content')


<div class="container-fluid">
    
    @if(session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
      {{ session('success') }}
    </div>
    @endif

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Merk Meter</h1>
        <a href="{{ route('merkmeter.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Tambah Data <i></i></a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama Merk</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($merks as $merk)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $merk->nama_merk }}</td>
                            <td>
                                <!-- Update Button -->
                                <a href="{{ route('merkmeter.edit', $merk->id) }}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                <!-- Delete Button -->
                                <form action="{{ route('merkmeter.destroy', $merk->id) }}" method="POST" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger" onclick="return confirm('Yakin menghapus post?')"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
