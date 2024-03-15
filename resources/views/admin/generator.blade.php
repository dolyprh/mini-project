@extends('layouts.template')
@section('content')
<div class="d-flex align-items-center">
    <p class="h1 text-gray-800 mb-2 mr-1 font-weight-bold">Generator Code Baru</p>
</div>
<div class="content-wrapper text-center mt-0">
    <button type="button" class="btn btn-info font-weight-bold" data-toggle="modal" data-target="#generatecode">
        <i class="mdi mdi-plus"></i> Generate Code Baru
    </button>
    <table id="productsTable" class="table table-product" style="width:100%">
        <thead class="table-light">
            <tr>
                <th>KODE</th>
                <th>PEMBUAT KODE</th>
                <th>STATUS KODE</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($code as $co)
            <tr>
                <td>{{ $co->code }}</td>
                <td>{{ $co->name }}</td>
                <td>
                    @if(!empty($co->id_user_get))
                        <button disabled class="btn-sm badge badge-pill badge-danger">sudah terpakai</button>
                    @else 
                        <button disabled class="btn-sm badge badge-pill badge-info">belum terpakai</button>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@include('modal.generate_add')
@include('sweetalert::alert')

@endsection