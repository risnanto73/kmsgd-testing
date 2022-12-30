<div class="modal fade" id="modal_update" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                        Update</span>
                </h5>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('staff.update',$user->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="container">
                    <h6 class="mt-3 mb-0">Photo</h6>
                    <div class="input-group input-group-outline mb-3 mt-3">
                        <input id="nama" type="file" class="form-control" name="photo">
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>