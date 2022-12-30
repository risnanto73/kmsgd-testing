@extends('layouts.parents.parent')

@section('title')
Dashboard
@endsection

@section('content')

@if (Auth::user()->role == 'admin' )
<div class="row mb-4">
    <div class="col-lg-7 mt-4 mb-3">
        <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                    <div class="chart">
                        <canvas id="chart-line-tasks" class="chart-canvas" height="170"></canvas>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h5 class="mb-0 ">Total Anggota</h5>
                <p class="text-sm ">Dari Masing-masing Jurusan</p>
                <hr class="dark horizontal">
                <div class="d-flex ">

                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-5 col-md-6 mt-4 mb-4">
        <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                    <div class="container">
                        <div class="row justify-content-between">
                            <div class="col-md-5 ms-auto me-auto mt-3 mb-3 card">
                                <h1 class="text-center mt-1">{{$genderL}}</h1>
                                <strong>
                                    <h6 class="text-center text-uppercase mt-1 mb-1">Laki-Laki</h6>
                                </strong>
                            </div>

                            <div class="col-md-5 ms-auto me-auto mt-3 mb-3 card">
                                <h1 class="text-center mt-1">{{$genderP}}</h1>
                                <strong>
                                    <h6 class="text-center text-nowrap text-uppercase mt-1 mb-1">Perempuan</>
                                </strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h5 class="mb-0 ">Total Anggota</h5>
                <p class="text-sm ">Berdasarkan Gender</p>
                <hr class="dark horizontal">
                <div class="d-flex ">

                </div>
            </div>
        </div>
    </div>
    <!-- <div class="col-lg-4 col-md-6 mt-4 mb-4">
        <div class="card z-index-2  ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
                    <div class="container">
                        <div class="row justify-content-between">
                            <div class="col-md-5 ms-auto me-auto mt-3 mb-3 card">
                                <h1 class="text-center mt-1">#</h1>
                                <strong>
                                    <h6 class="text-center text-uppercase mt-1 mb-1">Lulus</h6>
                                </strong>
                            </div>

                            <div class="col-md-5 ms-auto me-auto mt-3 mb-3 card">
                                <h1 class="text-center mt-1">#</h1>
                                <strong>
                                    <h6 class="text-center text-uppercase mt-1 mb-1 text-nowrap">Tidak Lulus</h6>
                                </strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h5 class="mb-0 "> Perhitungan Kelulusan Siswa</h5>
                <p class="text-sm "> Berdasarkan Status Lulus (<span class="font-weight-bolder">&</span>) Tidak Lulus
                </p>
                <hr class="dark horizontal">
                <div class="d-flex ">

                </div>
            </div>
        </div>
    </div> -->
</div>

<div class="row">
    <div class="card-header">
        <h1>Halaman Anggota</h1>
        <button type="button" class="btn btn-success btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#modal_add">
            <i class="fas fa-user-plus"></i>&nbsp;
            Add Anggota
        </button>
        @include('layouts.dashboard.alumni.add-alumni')
    </div>
    <form class="form mt-3" method="get" action="{{ route('searchAlumniDashboard') }}">
        <div class="form-group mb-3 ">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8 d-flex justify-content-end">
                    <input type="text" name="search" class="form-control w-50 me-1" style="border: 1px solid;" id="search" placeholder=" Search by Name">
                    <button type="submit" class="btn btn-primary mt-1 mb-1">Cari</button>
                </div>
            </div>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th class="text-center p-1">No</th>
                    <th scope="col">Nama</th>
                    <th class="text-start">Email</th>
                    <th class="text-start">Jabatan</th>
                    <th scope="col">Tahun Masuk</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($alumni as $row )
                <tr>
                    <th class="text-center">{{$loop->iteration}}</th>
                    <td class="text-start">&nbsp;&nbsp;&nbsp;{{$row->name}}</td>
                    <td>
                        &nbsp;&nbsp;&nbsp;{{$row->email}}
                    </td>
                    <td>
                        &nbsp;&nbsp;&nbsp;{{$row->jenjang->jenjang}}
                    </td>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;{{$row->tahun->tahun}}
                    </td>
                    <td class="text-start">
                        <form action="{{route('destroy',$row->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <a class="text-dark btn btn-success" href="{{route('detailSiswa',$row->slug)}}"><i class="fas fa-eye opacity-10 text-white"></i></a>
                            <button type="button" class="btn btn-warning btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#modal_edit{{$row->id}}">
                                <i class="fas fa-edit opacity-10 text-white"></i>
                            </button>
                            <button type="submit" class="btn btn-link btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                        @include('layouts.dashboard.alumni.modal-edit-profile')
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center"><strong>Tidak ada data alumni yang bisa ditampilkan.</strong></td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-end mt-2 mb-5">
        {{ $alumni->links('pagination::bootstrap-4') }}
    </div>
</div>





@elseif (Auth::user()->role == 'staff')
@if (Auth::user()->status_daftar == 'pending')
<div class="container">
    <div class="container">
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-success btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#modal_update">
                <i class="fas fa-edit"></i>&nbsp;
                Update
            </button>
            @include('layouts.dashboard.staff.create-modal')
        </div>
    </div>
    <div class="p-3 pt-2 d-flex justify-content-center mt-5">
        <img src="https://ui-avatars.com/api/?name={{$user->name}}" alt="..." class="img-thumbnail w-25">
    </div>
    <div class="container text-center">
        <p>{{$user->name}}</p>
        <p>{{$user->email}}</p>
        <p>{{$user->jabatan->jabatan}}</p>
    </div>
</div>
@else
<div class="container">
    <div class="container">
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-success btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#modal_update">
                <i class="fas fa-edit"></i>&nbsp;
                Update
            </button>
            @include('layouts.dashboard.staff.update-modal')
        </div>
    </div>

    <div class="container text-center card">
        <div class="p-3 pt-2 d-flex justify-content-center mt-5">
            <img src="{{url('storage', $user->staff->photo)}}" alt="" class="img-thumbnail w-25">
        </div>
        <h5 class="mt-3">{{$user->name}}</h5>
        <h5>{{$user->email}}</h5>
        <h5 class="mb-3">{{$user->jabatan->jabatan}}</h5>
    </div>
</div>
@endif




@else
@if (Auth::user()->status_daftar == 'pending')
<div class="card mt-5">
    <div class="p-3 pt-2 d-flex justify-content-center">
        <img src="https://ui-avatars.com/api/?name={{$user->name}}" alt="..." class="img-thumbnail w-25">
    </div>
    <div class="conatiner mt-3">
        <div class="table-responsive container mt-5">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Name </th>
                        <th scope="col">: <span>{{$user->name}}</span></th>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th scope="col">Email</th>
                        <th scope="col" class="text-lowercase">: <span>{{$user->email}}</span></th>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th scope="col">Jabatan</th>
                        <th scope="col">: <span>{{$user->jenjang->jenjang}}</span></th>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th scope="col">Tahun Masuk</th>
                        <th scope="col">: <span>{{$user->tahun->tahun}}</span></th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="container d-flex justify-content-end">
            <a href="{{route('viewTambahAlumni',$user->slug)}}" class="btn btn-outline-success">Tambah Data</a>
        </div>
    </div>
</div>
@else
<div class="card">
    <div class="container d-flex justify-content-end mt-3">
        <a href="{{route('detailUpdateAlumni',$user->id)}}" class="btn btn-danger">Update</a>
    </div>
    <div class="container d-flex justify-content-center">
        @if(empty($user->alumni->image))
        <img src="{{url('storage',$user->alumni->photo)}}" style="border-radius: 20% !important; width:200px; height:200px;" class="rounded shadow" alt="">
        @else
        <img src="https://ui-avatars.com/api/?name={{$user->name}}" alt="..." class="img-thumbnail w-75">
        @endif
    </div>
    <div class="conatiner mt-1">
        <div class="row">
            <p class="mt-5 text-center">{{$user->email}}</p>
            <h4 class="page-title mt-0 text-center" style="text-decoration: underline;">{{$user->name}}</h4>
            <div class="col-md-12 card bg-dark">
                <ul class="timeline">
                    <li>
                        <div class="timeline-badge"><i class="fas fa-building"></i></div>
                        <div class="timeline-panel">
                            <div class="timeline-body">
                                <p><strong>Jabatan</strong></p>
                            </div>
                            <div class="timeline-heading">
                                <h4 class="timeline-title">{{($user->jenjang->jenjang)}}</h4>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-inverted mt-3">
                        <div class="timeline-badge warning"><i class="fas fa-vote-yea"></i></div>
                        <div class="timeline-panel">
                            <div class="timeline-body">
                                <p><strong>Tahun Masuk</strong></p>
                            </div>
                            <div class="timeline-heading">
                                <h4 class="timeline-title">{{$user->tahun->tahun}}</h4>
                            </div>
                        </div>
                    </li>
                    <li class="mt-3">
                        <div class="timeline-badge danger"><i class="fas fa-phone"></i></div>
                        <div class="timeline-panel">
                            <div class="timeline-body">
                                <p><strong>Phone</strong></p>
                            </div>
                            <div class="timeline-heading">
                                <h4 class="timeline-title">{{$user->alumni->phone}}</h4>
                            </div>

                        </div>
                    </li>
                    <li class="timeline-inverted mt-3">
                        <div class="timeline-badge success"><i class="fas fa-address-card"></i></div>
                        <div class="timeline-panel">
                            <div class="timeline-body">
                                <p><strong>Tempat Lahir</strong></p>
                            </div>
                            <div class="timeline-heading">
                                <h4 class="timeline-title">{{$user->alumni->linkedin}}</h4>
                            </div>
                        </div>
                    </li>
                    <li class="mt-3">
                        <div class="timeline-badge info"><i class="far fa-money-bill-alt"></i></div>
                        <div class="timeline-panel">
                            <div class="timeline-body">
                                <p><strong>Tanggal Lahir</strong></p>
                            </div>
                            <div class="timeline-heading">
                                <h4 class="timeline-title">{{$user->alumni->salary}}</h4>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-inverted mt-3">
                        <div class="timeline-badge primary"><i class="fas fa-external-link-alt"></i></div>
                        <div class="timeline-panel">
                            <div class="timeline-body">
                                <p><strong>Address</strong></p>
                            </div>
                            <div class="timeline-heading">
                                <h4 class="timeline-title"> {{$user->alumni->address}}</h4>
                            </div>

                        </div>
                    </li>
                    <li class="mt-3">
                        <div class="timeline-badge info"><i class="fas fa-school"></i></div>
                        <div class="timeline-panel">
                            <div class="timeline-body">
                                <p><strong>Kampus - Fakultas</strong></p>
                            </div>
                            <div class="timeline-heading">
                                <h4 class="timeline-title">{{$user->alumni->specialist}}</h4>
                            </div>
                        </div>
                    </li>
                    
                </ul>
                {{-- <div class="mt-5 d-flex justify-content-end">
                    <div class="timeline-heading mt-5">
                        <a href="{{url('storage')}}/{{$user->alumni->cv}}" target="_blank" class="timeline-title btn btn-sm btn-outline-primary"> CV</a>
                        <a href="{{url('storage')}}/{{$user->alumni->portofolio}}" target="_blank" class="timeline-title btn btn-sm btn-outline-success"> Portofolio</a>
                        <a href="{{$user->alumni->linkedin}}" target="_blank" class="timeline-title btn btn-sm btn-outline-secondary"> LinkedIn</a>
                        <a href="{{$user->alumni->youtube}}" target="_blank" class="timeline-title btn btn-sm btn-outline-light"> Youtube</a>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endif


@endif

@endsection