@extends('layouts.template')
@section('content')
<div class="d-flex align-items-center">
    <p class="h1 text-gray-800 mb-0 mr-1 font-weight-bold">Dashboard</p>
</div>

@if(auth()->user()->role == "admin" || auth()->user()->role == "pj")
<div class="row">
    <div class="col-xl-6">
        <div class="card card-default" id="user-acquisition">
            <div class="card-header font-weight-bold border-bottom">
                <h2>Generate Code</h2>
            </div>

            <div class="card-footer d-flex flex-wrap bg-white justify-align-center">
                <button type="button" class="btn btn-danger font-weight-bold" data-toggle="modal" data-target="#generate">
                    <i class="mdi mdi-plus"></i> Generate Code
                </button>
            </div>
        </div>
    </div>

    <div class="col-xl-6">
        <div class="card card-default">
            <div class="card-header border-bottom">
                <h2 class="mdi mdi-desktop-mac">Form Absen</h2>
            </div>
            <div class="text-center">
                <div class="card py-3 mb-4">
                    <div class="card-body">
                        <h3 class="card-title ">Selamat Datang {{ Auth::User()->name }} </h3>
                        <span class="h2 font-weight-bold" id="current-time"></span> <br>
                        <span class="h4" id="current-date"></span>
                    </div>
                </div>
            </div>
            <div class="card-body pt-6">
                <form action="{{ route('absen.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="id_asisten">ID ASISTEN</label>
                        <input type="id_asisten" value="{{ Auth::User()->id_asisten }}" name="id_asisten" class="form-control rounded-0" id="id_asisten" readonly />
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <select class="form-control rounded-0" name="kelas" id="kelas" @if(!empty($cekAbsen)) disabled @endif>
                            <option disabled selected> Pilih Kelas</option>
                            @foreach ($kelas as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Materi</label>
                        <select class="form-control rounded-0" name="materi" id="materi" @if(!empty($cekAbsen)) disabled @endif>
                            <option disabled selected>Pilih Materi</option>
                            @foreach ($materi as $item)
                            <option value="{{ $item->id }}">{{ $item->materi }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Peran Jaga</label>
                        <select class="form-control rounded-0" name="peranJaga" id="peranJaga" @if(!empty($cekAbsen)) disabled @endif>
                            <option disabled selected>Silahkan Dipilih</option>
                            <option value="Asisten Baris">Asisten Baris</option>
                            <option value="Ketua">Ketua</option>
                            <option value="Tutor">Tutor</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Kode Absen </label>
                        <input name="kode" required class="form-control mb-2 input-credit-card" @if(!empty($cekAbsen)) disabled @endif required type="text" placeholder="Ex: 87ADsds0" />
                        <a>*Silahkan minta PJ atau Staff untuk kode absennya</a>
                    </div>
                    @if(empty($cekAbsen))
                    <div class="form-footer text-center">
                        <button type="submit" class="btn btn-info">Absen</button>
                    </div>
                    @endif

                </form>


                @if(!empty($cekAbsen))
                <form action="{{ route('absen.update', $cekAbsen['id']) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-warning">Clock Out</button>
                            </div>
                        </div>
                    </div>
                </form>
                @endif
            </div>
        </div>

    </div>
</div>
@endif

@if(auth()->user()->role == "asisten")
<div class="row justify-content-center">
    <div class="col-xl-8">
        <div class="card card-default">
            <div class="card-header border-bottom">
                <h2 class="mdi mdi-desktop-mac">Form Absen</h2>
            </div>
            <div class="text-center">
                <div class="card py-3 mb-4">
                    <div class="card-body">
                        <h3 class="card-title ">Selamat Datang {{ Auth::User()->name }} </h3>
                        <span class="h2 font-weight-bold" id="current-time"></span> <br>
                        <span class="h4" id="current-date"></span>
                    </div>
                </div>
            </div>
            <div class="card-body pt-6">
                <form action="{{ route('absen.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="id_asisten">ID ASISTEN</label>
                        <input type="id_asisten" value="{{ Auth::User()->id_asisten }}" name="id_asisten" class="form-control rounded-0" id="id_asisten" readonly />
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <select class="form-control rounded-0" name="kelas" id="kelas" @if(!empty($cekAbsen)) disabled @endif>
                            <option disabled selected> Pilih Kelas</option>
                            @foreach ($kelas as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Materi</label>
                        <select class="form-control rounded-0" name="materi" id="materi" @if(!empty($cekAbsen)) disabled @endif>
                            <option disabled selected> Pilih Materi</option>

                            @foreach ($materi as $item)
                            <option value="{{ $item->id }}">{{ $item->materi }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Peran Jaga</label>
                        <select class="form-control rounded-0" name="peranJaga" id="peranJaga" @if(!empty($cekAbsen)) disabled @endif>
                            <option disabled selected>Silahkan Dipilih</option>
                            <option value="Asisten Baris">Asisten Baris</option>
                            <option value="Ketua">Ketua</option>
                            <option value="Tutor">Tutor</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_asisten">Kode Absen</label>
                        <input type="id_asisten" required name="kode" class="form-control rounded-0" id="id_asisten" placeholder="Kode Absen">
                    </div>
                    @if(empty($cekAbsen))
                    <div class="form-footer text-center">
                        <button type="submit" class="btn btn-info">Absen</button>
                    </div>
                    @endif

                </form>

                @if(!empty($cekAbsen))
                <form action="{{ route('absen.update', $cekAbsen['id']) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-warning">Clock Out</button>
                            </div>
                        </div>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endif

@include('sweetalert::alert')

<script>
    // Function to update time and date
    function updateTimeAndDate() {
        // Get current time and date
        var now = new Date();
        var hours = now.getHours();
        var minutes = now.getMinutes();
        var seconds = now.getSeconds();
        var day = now.getDate();
        var month = now.getMonth() + 1; // Month is zero-based
        var year = now.getFullYear();

        // Add leading zero if needed
        hours = ('0' + hours).slice(-2);
        minutes = ('0' + minutes).slice(-2);
        seconds = ('0' + seconds).slice(-2);
        month = ('0' + month).slice(-2);
        day = ('0' + day).slice(-2);

        // Update HTML elements
        document.getElementById('current-time').textContent = hours + ':' + minutes + ':' + seconds;
        document.getElementById('current-date').textContent = 'Tanggal ' + day + ' ' + month + ' ' + year;
    }

    // Update time and date initially
    updateTimeAndDate();

    // Update time and date every second
    setInterval(updateTimeAndDate, 1000);
</script>


<div class="modal fade" id="generate" tabindex="-1" role="dialog" aria-labelledby="generate" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="generatecode">Modal Title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('dashboard.store') }}" class="text-center" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary btn-lg">Generate Code</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark btn-pill" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection