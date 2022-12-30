<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                        Edit Staff</span>
                </h5>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('staff.edit',$row->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="container">
                    <div class="input-group input-group-outline mb-3 mt-3">
                        <label class="form-label">Nama</label>
                        <input id="nama" type="text" class="form-control" name="name" value="{{$row->name}}">
                    </div>

                    <div class="input-group input-group-outline mb-3 mt-3">
                        <label class="form-label">Email</label>
                        <input id="email" type="text" class="form-control" name="email" value="{{$row->email}}">
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

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>