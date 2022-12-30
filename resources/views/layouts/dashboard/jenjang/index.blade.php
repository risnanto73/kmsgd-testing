@extends('layouts.parents.parent')

@section('title')
Jenjang
@endsection

@section('content')
<div class="content">
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner">
            <div class="mt-5">
                <div class="card-header">
                    <h1>Halaman Jabatan</h1>
                    <button type="button" class="btn btn-success btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#modal_add">
                        <i class="fas fa-user-plus"></i>&nbsp;
                        Add Jabatan
                    </button>
                    @include('layouts.dashboard.jenjang.modal-jenjang')
                </div>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($jenjang as $jen )
                            <tr>
                                <th class="text-center">{{$loop->iteration}}</th>
                                <td class="text-start">&nbsp;&nbsp;&nbsp;{{$jen->jenjang}}</td>
                                <td class="text-start">
                                    <form action="{{route('jenjang.delete',$jen->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-warning ms-auto" data-bs-toggle="modal" data-bs-target="#modal_edit_jenjang">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button type="submit" class="btn btn-link btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                    @include('layouts.dashboard.jenjang.modal-edit')
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center"><strong>Tidak ada data yang bisa ditampilkan.</strong></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection