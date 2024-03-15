@extends('layouts.template')
@section('content')

<div class="d-flex align-items-center">
    <p class="h1 text-gray-800 mb-2 mr-1 font-weight-bold">Riwayat Absen Anda</p>
</div>
<div class="content-wrapper mt-0">
    <table id="productsTable" class="table " style="width:100%">
        <thead class="table-light">
            <tr>
                <th>ID ASISTEN</th>
                <th>NAMA ASISTEN</th>
                <th>KELAS</th>
                <th>MATERI</th>
                <th>JAGA SEBAGAI</th>
                <th>TANGGAL</th>
                <th>WAKTU MULAI</th>
                <th>WAKTU AKHIR</th>
                <th>DURASI</th>
                <th>APPROVED BY</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_absen as $item)
            <tr>
                <td>{{ $item->id_asisten }}</td>
                <td>{{ $item->user_get_name }}</td>
                <td>{{ $item->nama_kelas }}</td>
                <td>{{ $item->materi }}</td>
                <td><span class="badge badge-primary"> {{ $item->teaching_role }} </span></td>
                <td>{{ $item->date }}</td>
                <td>{{ $item->start }}</td>
                <td>{{ $item->end }}</td>
                <td>{{ $item->duration }}</td>
                <td>{{ $item->name_approve }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<a href="/export-absen" type="submit" class="btn btn-warning">Export Excel</a>


@include('sweetalert::alert')


<script>
  $(function () {
    $("#tableProduct").DataTables({
      dom  : 'Bfrtip',
      buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
    })
  });
</script>

@endsection