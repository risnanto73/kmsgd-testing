@extends('layouts.parents.parent')

@section('title')
Tahun Lulus
@endsection

@section('content')
<div class="content">
    <div class="page-inner">
        <div class="mt-5">
            <div class="card-header">
                <h1>Halaman Tahun Masuk</h1>
                <button type="button" class="btn btn-success btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#modal_add">
                    <i class="fas fa-user-plus"></i>&nbsp;
                    Add Masuk
                </button>
                @include('layouts.dashboard.lulus.modal-tahun')
            </div>
            <div class="table-responsive">
                <table class="table table-striped">

                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th scope="col">Tahun</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tahun as $year )
                        <tr>
                            <th class="text-center">{{$loop->iteration}}</th>
                            <td class="text-start">&nbsp;&nbsp;&nbsp;{{$year->tahun}}</td>
                            <td class="text-start">
                                <form action="{{route('tahun.destroy',$year->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a class="text-dark btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal_edit" href="#"><i class="fas fa-edit opacity-10 text-white"></i></a>
                                    <button type="submit" class="btn btn-link btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                                <div class="container">
                                    @include('layouts.dashboard.lulus.modal-edit')
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center"><strong>Tidak ada data anggota yang bisa ditampilkan.</strong></td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end">

            </div>
        </div>
    </div>
</div>

@endsection