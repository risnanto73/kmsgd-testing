<div class="modal fade" id="modal_edit_jenjang" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                        Edit Jenjang</span>
                </h5>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('jenjang.update',$jen->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="container">
                    <div class="input-group input-group-outline mb-3 mt-3">
                        <label class="form-label">Nama Jenjang</label>
                        <input type="name" class="form-control" name="jenjang" value="{{$jen->jenjang}}">
                    </div>
                    
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>