<div class="modal fade" id="modal_view" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                        View Staff</span>
                </h5>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="container">
                <div class="d-flex jsuitfy-content-end">
                    @if(empty($user->staff->photo))
                    <img src="{{url('storage',$user->staff)}}" style="border-radius: 20% !important; width:200px; height:200px;" class="rounded shadow" alt="">
                    @else
                    <img src="https://ui-avatars.com/api/?name={{$user->name}}" alt="..." class="img-thumbnail w-75">
                    @endif
                </div>
                <div class="input-group input-group-outline mb-3 mt-3">
                    <label class="form-label">Nama</label>
                    <input id="nama" readonly type="text" class="form-control" name="name" value="{{$row->name}}">
                </div>

                <div class="input-group input-group-outline mb-3 mt-3">
                    <label class="form-label">Email</label>
                    <input id="email" readonly type="text" class="form-control" name="email" value="{{$row->email}}">
                </div>


                <div class="input-group">
                    <div class="input-group mb-3">
                        <select required class="form-select" name="jabatan_id" aria-label="Default select example" style="border: 1px solid;">
                            @foreach ($jabatan as $j)
                            @if ($j->id == $row->jabatan_id)
                            <option value="{{$j->id}}" selected='selected'>{{$j->jabatan}}</option>
                            @else
                            <option value="{{$j->id}}">{{$j->jabatan}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer mt-3">

            </div>
        </div>
    </div>
</div>