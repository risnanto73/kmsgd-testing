<div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                        Add Carousel</span>
                </h5>
                
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('carousel.add')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="container">
                    <div class="input-group input-group-outline mb-3 mt-3">
                        <label class="form-label">Gambar Carousel</label>
                        <input id="img" type="file" class="form-control @error('img') is-invalid @enderror" name="img" value="{{ old('img') }}" required autocomplete="img" autofocus>

                        @error('img')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="input-group input-group-outline mb-3 mt-3">
                        <label class="form-label">Text 1 Carousel</label>
                        <input id="text1" type="text" class="form-control @error('text1') is-invalid @enderror" name="text1" value="{{ old('text1') }}" required autocomplete="text1" autofocus>

                        @error('text1')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="input-group input-group-outline mb-3 mt-3">
                        <label class="form-label">Text 2 Carousel</label>
                        <input id="text2" type="text" class="form-control @error('text2') is-invalid @enderror" name="text2" value="{{ old('text2') }}" required autocomplete="text2" autofocus>

                        @error('text2')
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