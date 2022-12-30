@extends('layouts.parents.parent')

@section('title')
Staff
@endsection

@section('content')
<div class="container mt-5">
    <div class="">
        <div class="card-header">
            <h1>Halaman Staff</h1>
            <button type="button" class="btn btn-success btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#modal_add">
                <i class="fas fa-user-plus"></i>&nbsp;
                Add staff
            </button>
            @include('layouts.dashboard.staff.modal-add')
        </div>
        <form class="form" method="get" action="{{route('searchStaff')}}">
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
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th scope="col">Nama</th>
                        <th class="text-start">Email</th>
                        <th class="text-start">Jabatan</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($staff as $row )
                    <tr>
                        <th class="text-center">{{$loop->iteration}}</th>
                        <td class="text-start">&nbsp;&nbsp;&nbsp;{{$row->name}}</td>
                        <td>
                            &nbsp;&nbsp;&nbsp;{{$row->email}}
                        </td>
                        <td class="text-wrap">{{$row->jabatan->jabatan}}
                        </td>
                        <td class="text-start">
                            <form action="{{route('staff.delete',$row->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-success ms-auto" data-bs-toggle="modal" data-bs-target="#modal_view">
                                    <i class="fas fa-eye opacity-10 text-white"></i>
                                </button>
                                <button type="button" class="btn btn-warning btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#modal_edit">
                                    <i class="fas fa-edit opacity-10 text-white"></i>
                                </button>
                                <button type="submit" class="btn btn-link btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                            <div class="container">
                                @include('layouts.dashboard.staff.modal-edit')
                            </div>
                            <div class="container">
                                @include('layouts.dashboard.staff.modal-view')
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center"><strong>Tidak ada data staff yang bisa ditampilkan.</strong></td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-end mt-2">
            {{ $staff->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
@endsection