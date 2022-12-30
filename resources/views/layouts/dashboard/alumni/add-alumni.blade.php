<div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                        Buat Akun</span>
                </h5>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('addAlumni')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="container">
                    <div class="input-group input-group-outline mb-3 mt-3">
                        <label class="form-label">Nama</label>
                        <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <select required class="form-select" name="gender" aria-label="Default select example" style="border: 1px solid;">
                            <option required selected>&nbsp;-- Pilih Gender --</option>
                            <option value="laki">&nbsp;Laki-Laki</option>
                            <option value="perempuan">&nbsp;Perempuan</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <div class="input-group mb-3">
                            <select required class="form-select" name="jenjang_id" aria-label="Default select example" style="border: 1px solid;">
                                <option required selected>&nbsp;-- Pilih Jabatan --</option>
                                @foreach ($jenjang as $row)
                                <option value="{{$row->id}}">&nbsp;{{$row->jenjang}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="input-group mb-3">
                            <select required class="form-select" name="tahun_id" aria-label="Default select example" style="border: 1px solid;">
                                <option required selected>&nbsp;-- Pilih Tahun Masuk --</option>
                                @foreach ($tahun as $year )
                                <option value="{{$year->id}}">&nbsp; {{$year->tahun}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="input-group mb-3">
                            <select required class="form-select" name="role" aria-label="Default select example" style="border: 1px solid;">
                                <option required selected value="alumni">&nbsp; Role Anggota</option>
                                <!-- <option value="alumni">Alumni</option>
                                <option value="staff">Staff</option> -->
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>