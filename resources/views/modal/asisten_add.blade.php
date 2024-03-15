<div class="modal fade" id="addAsisten" tabindex="-1" role="dialog" aria-labelledby="addAsisten" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalFormTitle">Asisten Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('posts.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="id_asisten">ID ASISTEN</label>
                        <input type="text" class="form-control" name="id_asisten" id="id_asisten" aria-describedby="id_asisten" placeholder="Id Asisten">
                    </div>
                    <div class="form-group ">
                        <label for="name">NAME</label>
                        <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelp" placeholder="Name">
                    </div>
                    <div class="form-group input-with-post-icon datepicker">
                        <label for="join_date">JOIN DATE</label>
                        <input placeholder="Select date" type="date" name="join_date" id="join_date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="role">JABATAN</label>
                        <select class="form-control input-lg" name="role" id="role">
                            <option selected disabled>Pilih Role</option>
                            <option value="admin" @if (old('role')=='Admin' ) selected @endif>Admin</option>
                            <option value="pj" @if (old('role')=='PJ' ) selected @endif>PJ</option>
                            <option value="asisten" @if (old('role')=='Asisten' ) selected @endif>Asisten</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="photo">PHOTO</label>
                        <input type="file" class="form-control" name="photo" id="photo" placeholder="photo">
                    </div>
                    <div class="form-group">
                        <label for="email">EMAIL</label>
                        <input type="email" class="form-control" name="email" id="email" aria-describedby="email" placeholder="email">
                    </div>
                    <div class="form-group">
                        <label for="password">PASSWORD</label>
                        <input type="password" class="form-control" name="password" id="password" aria-describedby="password" placeholder="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>