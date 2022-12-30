@extends('layouts.parents.parent')

@section('title')
Detail Alumni
@endsection

@section('content')
<h4>Profile Alumni</h4>

<div class="mt-3">
    <div class="container d-flex justify-content-center">
        @if(empty($alumni->alumni->photo))
        <img src="https://ui-avatars.com/api/?name={{$alumni->name}}" alt="..." class="img-thumbnail w-25">
        @else
        <img src="{{url('storage', $alumni->alumni->photo)}}" style="border-radius: 20% !important; width:200px; height:200px;" class="rounded shadow" alt="">
        @endif
    </div>
    <div class="d-flex justify-content-center mt-3">
        <span class="text-center text-dark">{{$alumni->name}}</span>
    </div>

    <div class="card">
        <div class="row mt-3 bg-secondary py-1 px-1 d-flex justify-content-center" style="border-radius: 25px!important;">

            @if ($alumni->status_daftar == 'update')
            <div class="col-md-3 card mt-3 ms-1 me-1">
                <div class="form-group label-floating">
                    <label for="phone" class="control-label mt-3">Email</label>
                    <p class="mt-3 text-dark">{{$alumni->email}}</p>
                    <hr class="bg-primary">
                </div>
            </div>
            <div class="col-md-3 card mt-3 ms-1 me-1">
                <div class="form-group label-floating">
                    <label for="hafalan" class="control-label mt-3">Jenjang</label>
                    <p class="mt-3 text-dark">{{$alumni->jenjang->jenjang}}<span>Juz</span></p>
                    <hr class="bg-primary">
                </div>
            </div>
            <div class="col-md-3 card mt-3 ms-1 me-1">
                <div class="form-group label-floating">
                    <label for="youtube" class="control-label mt-3">Tahun Lulus</label>
                    <p class="mt-3 text-dark">{{$alumni->tahun->tahun}}</p>
                    <hr class="bg-primary">
                </div>
            </div>
            <div class="col-md-3 card mt-3 ms-1 me-1">
                <div class="form-group label-floating">
                    <label for="phone" class="control-label mt-3">Phone</label>
                    <p class="mt-3 text-dark">{{$alumni->alumni->phone}}</p>
                    <hr class="bg-primary">
                </div>
            </div>
            <div class="col-md-3 card mt-3 ms-1 me-1">
                <div class="form-group label-floating">
                    <label for="hafalan" class="control-label mt-3">Hafalan</label>
                    <p class="mt-3 text-dark">{{$alumni->alumni->hafalan}}<span>Juz</span></p>
                    <hr class="bg-primary">
                </div>
            </div>
            <div class="col-md-3 card mt-3 ms-1 me-1">
                <div class="form-group label-floating">
                    <label for="youtube" class="control-label mt-3">Tanggal Lahir</label>
                    <p class="mt-3 text-dark">{{$alumni->alumni->salary}}</p>
                    <hr class="bg-primary">
                </div>
            </div>

            <div class="col-md-8 d-flex justify-content-center card mt-3">
                <div class="form-group label-floating">
                    <label for="address" class="control-label mt-3">Address</label>
                    <br>
                    <p>{{$alumni->alumni->address}}</p>
                </div>
                <hr class="bg-primary">
            </div>

            <div class="col-md-8 card mt-3 ms-1 me-1">
                <div class="form-group label-floating">
                    <label class="control-label mt-3">Experience</label>
                    <br>
                    <p>{{$alumni->alumni->experience}}</p>
                </div>
                <hr class="bg-primary">
            </div>

            <div class="col-md-8 card mt-3 ms-1 me-1">
                <div class="form-group label-floating">
                    <label for="address" class="control-label mt-3">Specialist</label>
                    <br>
                    <p>{{$alumni->alumni->specialist}}</p>
                </div>
                <hr class="bg-primary">
            </div>

            {{-- <div class="container d-flex justify-content-center mb-3 mt-3 ms-1 me-1">
                <div class="row">
                    <a href="{{url('storage')}}/{{$alumni->alumni->cv}}" target="_blank" class="timeline-title btn btn-sm btn-primary"> CV</a>
                    <a href="{{url('storage')}}/{{$alumni->alumni->portofolio}}" target="_blank" class="timeline-title btn btn-sm btn-success"> Portofolio</a>
                    <a href="{{url('storage')}}/{{$alumni->alumni->linkedin}}" target="_blank" class="timeline-title btn btn-sm btn-warning"> LinkedIn</a>
                    <a href="{{url('storage')}}/{{$alumni->alumni->youtube}}" target="_blank" class="timeline-title btn btn-sm btn-light"> Youtube</a>
                </div>
            </div> --}}

            @elseif ($alumni->status_daftar == 'pending')
            <div class="col-md-3 card mt-3 ms-1 me-1 mb-3">
                <div class="form-group label-floating">
                    <label for="phone" class="control-label mt-3">Email</label>
                    <p class="mt-3 text-dark">{{$alumni->email}}</p>
                    <hr class="bg-primary">
                </div>
            </div>
            <div class="col-md-3 card mt-3 ms-1 me-1 mb-3">
                <div class="form-group label-floating">
                    <label for="hafalan" class="control-label mt-3">Jenjang</label>
                    <p class="mt-3 text-dark">{{$alumni->jenjang->jenjang}}</p>
                    <hr class="bg-primary">
                </div>
            </div>
            <div class="col-md-3 card mt-3 ms-1 me-1 mb-3">
                <div class="form-group label-floating">
                    <label for="youtube" class="control-label mt-3">Tahun Lulus</label>
                    <p class="mt-3 text-dark">{{$alumni->tahun->tahun}}</p>
                    <hr class="bg-primary">
                </div>
            </div>
            @endif

        </div>
    </div>

</div>

@endsection