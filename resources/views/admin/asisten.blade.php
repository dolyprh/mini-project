@extends('layouts.template')
@section('content')
<div class="d-flex align-items-center">
    <p class="h1 text-gray-800 mb-2 mr-1 font-weight-bold">Data Asisten</p>
</div>
<div class="content-wrapper mt-0">
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addAsisten">
        <i class="mdi mdi-plus"></i> Asisten Baru
    </button>
    <table id="productsTable" class="table table-product" style="width:100%">
        <thead class="table-light">
            <tr>
                <th>ID ASISTEN</th>
                <th>NAMA</th>
                <th>JOIN DATE</th>
                <th>JABATAN</th>
                <th>EMAIL</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $dat)
            <tr>
                <td>{{ $dat->id_asisten}}</td>
                <td>{{ $dat->name}}</td>
                <td>{{ $dat->join_date }}</td>
                <td>{{ $dat->role }}</td>
                <td>{{ $dat->email }}</td>
                <td>
                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#editAsisten{{ $dat->id }}">
                        edit
                    </button>

                    <a href="{{ route('dataasisten.destroy', $dat->id)}}" class="btn btn-sm btn-danger" data-confirm-delete="true">
                        delete
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@include('modal.asisten_add')
@include('modal.asisten_edit')

@include('sweetalert::alert')

@endsection