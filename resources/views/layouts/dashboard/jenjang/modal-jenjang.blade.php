<div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                        Add  Jabatan</span>
                </h5>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('jenjang.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="container">
                    <div class="input-group input-group-outline mb-3 mt-3">
                        <label class="form-label">Nama Jabatan</label>
                        <input id="jenjang" type="name" class="form-control @error('jenjang') is-invalid @enderror" name="jenjang" value="{{ old('jenjang') }}" required autocomplete="jenjang" autofocus>

                        @error('jenjang')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>