@foreach($data as $dat)
<div class="modal fade" id="editMateri{{ $dat->id }}" tabindex="-1" role="dialog" aria-labelledby="editMateri" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editMateri">Update Kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('datamateri.update', $dat->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="materi">MATERI</label>
                        <input type="text" class="form-control" value="{{ $dat->materi }}" name="materi" id="materi" aria-describedby="materi" placeholder="materi">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
