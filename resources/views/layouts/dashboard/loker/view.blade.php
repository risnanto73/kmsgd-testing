@extends('layouts.parents.parent')

@section('title')
Loker Detail
@endsection


@section('content')
<h1 class="mt-3 text-center">{{$loker->name_pt}}</h1>
<h1 class="mt-3 text-center">{{$loker->status}}</h1>
<h1 class="mt-3 text-center">{{$loker->penerbit_pt}}</h1>
<div class="container d-flex justify-content-center">
    <img src="{{url('/storage',$loker->img_pt)}}" class="img-thumbnail w-75" alt="">
</div>
<div class="container card mt-3 bg-light shadow-lg">
    <p class="mt-3" style="text-align: justify !important ;text-justify: inter-word !important; ">{!! $loker->isi_pt !!}</p>
</div>

@endsection