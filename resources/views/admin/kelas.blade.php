@extends('layouts.template')
@section('content')
<div class="d-flex align-items-center">
    <p class="h1 text-gray-800 mb-2 mr-1 font-weight-bold">Data Kelas</p>
</div>
<div class="content-wrapper mt-0">
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addKelas">
        <i class="mdi mdi-plus"></i> Kelas Baru
    </button>
    <table id="productsTable" class="table table-product" style="width:100%">
        <thead class="table-light">
            <tr>
                <th>JURUSAN</th>
                <th>FAKULTAS</th>
                <th>TINGKAT</th>
                <th>NAMA KELAS</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $dat)
            <tr>
                <td>{{ $dat->jurusan }}</td>
                <td>{{ $dat->fakultas }} </ /td>
                <td>{{ $dat->tingkat }} </td>
                <td>{{ $dat->nama_kelas }}</td>
                <td class="text-center">
                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#editKelas{{ $dat->id }}">
                        edit
                    </button>
                    <a href="{{ route('datakelas.destroy', $dat->id) }} " class="btn btn-sm btn-danger" data-confirm-delete="true">
                        delete
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@include('modal.kelas_add')
@include('modal.kelas_edit')
@include('sweetalert::alert')

@endsection