@extends('layouts.parents.parent')

@section('title')
Loker
@endsection

@section('content')

<div class="content">
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner">
            <div class="mt-0">
                <div class="card-header">
                    <h1>Halaman Loker</h1>
                    <a class="btn btn-success btn-round ms-auto" href="{{route('loker.viewAdd')}}"><i class="fas fa-user-plus"></i>&nbsp;
                        Add Loker</a>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-start">Image</th>
                                <th scope="col">Nama PT</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($loker as $lokers )
                            <tr>
                                <th class="text-center">{{$loop->iteration}}</th>
                                <td class="text-start">&nbsp;&nbsp;&nbsp;<img src="{{url('storage', $lokers->img_pt)}}" style="border-radius: 20% !important; width:200px; height:200px;" class="rounded shadow" alt=""></td>
                                <td class="text-start">&nbsp;&nbsp;&nbsp;{{$lokers->name_pt}}</td>
                                <td class="text-start">
                                    <form action="{{route('loker.destroy',$lokers->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{route('loker.view',$lokers->slug)}}" class="btn btn-success"><i class="fas fa-eye"></i></a>
                                        <a href="{{route('loker.edit',$lokers->slug)}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                        <button type="submit" class="btn btn-link btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center"><strong>Tidak ada data staff yang bisa ditampilkan.</strong></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end">
                    {{$loker->links('pagination::bootstrap-4')}}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection