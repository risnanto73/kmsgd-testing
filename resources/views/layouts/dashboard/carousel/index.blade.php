@extends('layouts.parents.parent')

@section('title')
Halaman Carousel
@endsection

@section('content')
<div class="content">
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner">
            <div class="mt-5">
                <div class="card-header">
                    <h1>Halaman Carousel</h1>
                    <button type="button" class="btn btn-success btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#modal_add">
                        <i class="fas fa-user-plus"></i>&nbsp;
                        Add Carousel
                    </button>
                    @include('layouts.dashboard.carousel.modal-carousel')
                </div>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-start">#</th>
                                <th class="text-start">Text 1</th>
                                <th class="text-start">Text 2</th>
                                <th class="text-start">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($carousel as $row )
                            <tr>
                                <th class="text-start">
                                    <img src="{{url('/storage',$row->img)}}" alt="..." style="width: 200px;">
                                </th>
                                <td class="text-start">
                                    <p>{{$row->text1}}</p>
                                </td>
                                <td class="text-start">
                                    <p>{{$row->text2}}</p>
                                </td>
                                <td class="text-start">
                                    <form action="{{route('carousel.delete',$row->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                    <!--  -->
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