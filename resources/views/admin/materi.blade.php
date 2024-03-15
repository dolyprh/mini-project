@extends('layouts.template')
@section('content')
<div class="d-flex align-items-center">
    <p class="h1 text-gray-800 mb-2 mr-1 font-weight-bold">Data Materi</p>
</div>
<div class="content-wrapper text-center mt-0">
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addMateri">
        <i class="mdi mdi-plus"></i> Materi Baru
    </button>
    <table id="productsTable" class="table table-product" style="width:100%">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>MATERI</th>
                <th class="text-center">ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $dat)
            <tr>
                <td>{{ $dat->id }}</td>
                <td>{{ $dat->materi }}</td>
                <td class="text-center">
                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#editMateri{{ $dat->id }}">
                        edit
                    </button>
                    <a href="{{ route('datamateri.destroy', $dat->id)}}" class="btn btn-sm btn-danger" data-confirm-delete="true">
                        delete
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@include('modal.materi_add')
@include('modal.materi_edit')
@include('sweetalert::alert')

@endsection