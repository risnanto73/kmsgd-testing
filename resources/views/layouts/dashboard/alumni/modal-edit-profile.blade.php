<div class="modal fade" id="modal_edit{{$row->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                        Upload Ijazah</span>
                </h5>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('editDataAlumni',$row->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="container">
                    <div class="input-group input-group-outline mb-3 mt-3">
                        <label class="form-label">Nama</label>
                        <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $row->name }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $row->email }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <select required class="form-select" name="gender" aria-label="Default select example" style="border: 1px solid;">
                            @if($row->gender == "laki")
                            <option selected value="laki">&nbsp; Laki-Laki </option>
                            <option value="perempuan">&nbsp; Perempuan </option>
                            @elseif($row->gender == "perempuan")
                            <option value="laki">&nbsp; Laki-Laki </option>
                            <option selected value="perempuan">&nbsp; Perempuan </option>
                            @endif
                        </select>
                    </div>
                    <div class="input-group">
                        <div class="input-group mb-3">
                            <select required class="form-select" name="jenjang_id" aria-label="Default select example" style="border: 1px solid;">
                                <option required selected>-- Pilih Jenjang --</option>
                                @foreach ($jenjang as $j)
                                @if ($j->id == $row->jenjang_id)
                                <option value="{{$j->id}}" selected='selected'>{{$j->jenjang}}</option>
                                @else
                                <option value="{{$j->id}}">{{$j->jenjang}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="input-group mb-3">
                            <select required class="form-select" name="tahun_id" aria-label="Default select example" style="border: 1px solid;">
                                <option required selected>-- Pilih Tahun Lulus --</option>
                                @foreach ($tahun as $year )
                                @if ($year->id == $row->tahun_id)
                                <option value="{{$year->id}}" selected='selected'>{{$year->tahun}}</option>
                                @else
                                <option value="{{$year->id}}">{{$year->tahun}}</option>
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