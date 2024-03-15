@foreach ($data as $dat)
<div class="modal fade" id="editAsisten{{$dat->id}}" tabindex="-1" role="dialog" aria-labelledby="editAsisten" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAsistan">Asisten Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('dataasisten.update', $dat->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="id_asisten">ID ASISTEN</label>
                        <input type="text" disabled class="form-control" value="{{$dat->id_asisten}}" name="update_id_asisten" id="id_asisten" aria-describedby="id_asisten" placeholder="Id Asisten">
                    </div>
                    <div class="form-group ">
                        <label for="name">NAME</label>
                        <input type="text" class="form-control" value="{{ $dat->name }}" name="update_name" id="name" aria-describedby="nameHelp" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="join_date">JOIN DATE</label>
                        <input type="text" disabled value="{{ $dat->join_date }}" name="join_date" id="join_date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="role">JABATAN</label>
                        <select class="form-control input-lg" name="update_role" id="role">
                            <option disabled>Pilih Role</option>
                            <option value="admin" {{ $dat->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="pj" {{ $dat->role == 'pj' ? 'selected' : '' }}>PJ</option>
                            <option value="asisten" {{ $dat->role == 'asisten' ? 'selected' : ''}}>Asisten</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="photo">PHOTO</label>
                        <input type="file" class="form-control" name="photo" id="photo" placeholder="photo">
                    </div>
                    <div class="form-group">
                        <label for="email">EMAIL</label>
                        <input type="email" class="form-control" value="{{ $dat->email }}" name="update_email" id="email" aria-describedby="email" placeholder="email">
                    </div>
                    <div class="form-group">
                        <label for="password">PASSWORD</label>
                        <input type="password" class="form-control" value="{{ $dat->password }}" id="password" aria-describedby="password" placeholder="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach