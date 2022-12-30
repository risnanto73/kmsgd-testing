@extends('layouts.parents.parent')

@section('title')
Detail Update
@endsection

@section('content')
<div class="card mt-5">
    <div class="card-body pt-3 bg-secondary card">
        <form action="{{route('updateAlumni',$user->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="container">
                <h5 class="card-title mt-3">Profil Akun</h5>
                <div class="container-fluid d-flex jusitfy-content-center">
                    <div class="row text-center">

                        <!-- ===== IMG SANTRI ===== -->
                        <div class="col-md-3 mt-5 d-flex-justify-content-start">
                            <img src="https://ui-avatars.com/api/?name={{$user->name}}" alt="..." class="img-thumbnail" style="width:200px">
                            <br>
                            <input class="mt-3" style="width:100px;" name="photo" type="file">
                        </div>
                        <!-- ===== END IMG SANTRI ===== -->

                        <!-- ===== DATA DIRI SANTRI -->
                        <div class="col-md-9 mt-3 ms-auto">
                            <h6 class="text-start"><i class="fas fa-id-card-alt opacity-10"></i>&nbsp; Nama Lengkap</h6>
                            <p class="text-start text-white">{{$user->name}}</p>
                            <h6 class="text-start "><i class="fas fa-envelope-open opacity-10"></i>&nbsp; Email</h6>
                            <p class="text-start text-white">{{$user->email}}</p>
                            <h6 class="text-start"><i class="fas fa-store-alt opacity-10"></i>&nbsp; Marhalah</h6>
                            <p class="text-start text-white">{{$user->jenjang->jenjang}}</p>
                            <h6 class="text-start"><i class="fas fa-store-alt opacity-10"></i>&nbsp; Tahun Lulus</h6>
                            <p class="text-start text-white">{{$user->tahun->tahun}}</p>
                        </div>
                        <!-- ===== END DATA DIRI SANTRI ===== -->
                        <h6 class="text-danger mt-3 text-center"><strong>Profile akun hanya dapat diubah oleh
                                admin</strong></h6>
                    </div>
                </div>
            </div>
            <hr>
            <hr>
            <div class="container">
                <hr>
            </div>

            <h5 class="mt-3 text-white">Data Diri {{$user->name}}</h5>
            <div class="bg-white js-active " data-animation="FadeIn">

                <div class="row mt-3 bg-secondary d-flex justify-content-center">
                    <div class="col-md-3 card mt-3 ms-1 me-1">
                        <div class="form-group label-floating">
                            <label for="phone" class="control-label mt-3">Phone<span class="text-danger">*</span></label>
                            <input id="phone" value="{{$user->alumni->phone}}" name="phone" type="number" class="form-control @error('phone') is-invalid @enderror">
                            @error('phone')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <hr class="bg-primary">
                        </div>
                    </div>

                    {{-- <div class="col-md-3 card mt-3 ms-1 me-1">
                        <div class="form-group label-floating">
                            <label for="hafalan" class="control-label mt-3">Hafalan<span class="text-danger">*</span></label>
                            <input id="hafalan" value="{{$user->alumni->hafalan}}" name="hafalan" type="number" max="30" required="min:16" class="form-control @error('hafalan') is-invalid @enderror">
                            @error('hafalan')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <hr class="bg-primary">
                        </div>
                    </div>

                    <div class="col-md-3 card mt-3 ms-1 me-1">
                        <div class="form-group label-floating">
                            <label for="youtube" class="control-label mt-3">Youtube<span class="text-danger">*</span></label>
                            <input id="youtube" value="{{$user->alumni->youtube}}" name="youtube" type="text" required="min:16" class="form-control @error('youtube') is-invalid @enderror">
                            @error('youtube')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <hr class="bg-primary">
                        </div>
                    </div> --}}

                    <div class="col-md-3 card mt-3 ms-1 me-1">
                        <div class="form-group label-floating">
                            <label for="linkedin" class="control-label mt-3">Tempat Lahir<span class="text-danger">*</span></label>
                            <input id="linkedin" value="{{$user->alumni->linkedin}}" name="linkedin" type="text" required="min:16" class="form-control @error('linkedin') is-invalid @enderror">
                            @error('youtube')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <hr class="bg-primary">
                        </div>
                    </div>

                    <div class="col-md-3 card mt-3 ms-1 me-1">
                        <div class="form-group label-floating">
                            <label for="salary" class="control-label mt-3">Tanggal Lahir<span class="text-danger">*</span></label>
                            <input id="salary" value="{{$user->alumni->salary}}" name="salary" type="date" required="min:16" class="form-control @error('salary') is-invalid @enderror">
                            @error('salary')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <hr class="bg-primary">
                        </div>
                    </div>

                    <div class="col-md-8 d-flex justify-content-center card mt-3">
                        <div class="form-group label-floating">
                            <label for="address" class="control-label mt-3">Address<span class="text-danger">*</span></label>
                            <br>
                            <textarea name="address" required class="form-control" style=" resize: none;" id="address" cols="15" rows="1">{{$user->alumni->address}}</textarea>
                        </div>
                        <hr class="bg-primary">
                    </div>
                    <div class="col-md-8 d-flex justify-content-center card mt-3">
                        <div class="form-group label-floating">
                            <label for="address" class="control-label mt-3">Kampus - Fakultas<span class="text-danger">*</span></label>
                            <br>
                            <textarea name="specialist" required class="form-control" style=" resize: none;" id="address" cols="15" rows="1">{{$user->alumni->specialist}}</textarea>
                        </div>
                        <hr class="bg-primary">
                    </div>

                    {{-- <div class="col-md-8 card mt-3">
                        <div class="form-group label-floating">
                            <label for="experience" class="control-label mt-3">Experience<span class="text-danger">*</span></label>
                            <br>
                            <textarea name="experience" required class="form-control" style=" resize: none;" id="experience" cols="15" rows="1">{{$user->alumni->experience}}</textarea>
                        </div>
                        <hr class="bg-primary">
                    </div>

                    <div class="col-md-8 card mt-3">
                        <div class="form-group label-floating">
                            <label for="specialist" class="control-label mt-3">Specialist<span class="text-danger">*</span></label>
                            <br>
                            <textarea name="specialist" required class="form-control" style=" resize: none;" id="specialist" cols="15" rows="1">{{$user->alumni->specialist}}</textarea>
                        </div>
                        <hr class="bg-primary">
                    </div> --}}

                    {{-- <div class="container d-flex justify-content-center">
                        <div class="col-md-3 card mt-3 ms-1 me-1">
                            <h6 class="text-center mt-3">CV</h6>
                            <input class="mt-3 mb-3 ms-1 me-1" name="cv" type="file">
                        </div>

                        <div class="col-md-3 card mt-3 ms-1 me-1">
                            <h6 class="text-center mt-3">Portofolio</h6>
                            <input class="mt-3 mb-3 ms-1 me-1" name="portofolio" type="file">
                        </div>
                    </div> --}}

                </div>
            </div>

            <div class="col-md-12 mt-3 d-flex justify-content-end">
                <button type="submit" class="btn btn-info"><i class="fab fa-telegram-plane"></i>&nbsp;
                    Update</button>
            </div>
        </form>
    </div>
</div>


@endsection