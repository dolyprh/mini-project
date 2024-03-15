@foreach($data as $dat)
<div class="modal fade" id="editKelas{{ $dat->id }}" tabindex="-1" role="dialog" aria-labelledby="editKelas" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editKelas">Kelas Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('datakelas.update', $dat->id ) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="id_asisten">JURUSAN</label>
                        <input type="text" class="form-control" value="{{ $dat->jurusan }}" name="jurusan" id="jurusan" aria-describedby="Jurusan" placeholder="Jurusan">
                    </div>
                    <div class="form-group ">
                        <label for="name">FAKULTAS</label>
                        <input type="text" class="form-control" value="{{ $dat->fakultas }}" name="fakultas" id="fakultas" aria-describedby="Fakultas" placeholder="Fakultas">
                    </div>
                    <div class="form-group ">
                        <label for="name">TINGKAT</label>
                        <input type="text" class="form-control" value="{{ $dat->tingkat }}" name="tingkat" id="tingkat" aria-describedby="Tingkat" placeholder="Tingkat">
                    </div>
                    <div class="form-group ">
                        <label for="name">NAMA KELAS</label>
                        <input type="text" class="form-control" value="{{ $dat->nama_kelas }}" name="name" id="name" aria-describedby="Kelas" placeholder="Nama Kelas">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
