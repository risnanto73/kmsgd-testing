@extends('layouts.parents.parent')

@section('title')
Loker Edit
@endsection

@section('content')
<div class="container">
    <form action="{{route('loker.update',$loker->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h6>Nama Program</h6>
        <div class="input-group input-group-outline mb-3 mt-3">
            <input id="tahun" type="text" class="form-control" value="{{$loker->name_pt}}" name="name_pt">
        </div>

        <div class="input-group mb-3">
            <select required class="form-select" name="penerbit_pt" aria-label="Default select example" style="border: 1px solid;">
                <option required selected>&nbsp;-- Pilih Program --</option>
                <option value="Ketua Umum">&nbsp;Ketua Umum</option>
                <option value="Sektretaris Umum">&nbsp;Sektretaris Umum</option>
                <option value="Sektretaris Umum">&nbsp;Sektretaris Umum</option>
                <option value="BK Staf Ahli">&nbsp;BK Staf Ahli</option>
            </select>
        </div>

        <div class="input-group mb-3">
            <select required class="form-select" name="status" aria-label="Default select example" style="border: 1px solid;">
                <option required selected>&nbsp;-- Pilih Status --</option>
                <option value="Terlaksana">&nbsp;Terlaksana</option>
                <option value="Belum Terlaksana<">&nbsp;Belum Terlaksana</option>
            </select>
        </div>

        <img src="{{url('/storage',$loker->img_pt)}}" class="img-thumbnail" alt="">
        <label class="text-primary ms-3">Photo</label>
        <div class="input-group input-group-outline mb-3">
            <input id="img_pt" type="file" class="form-control" name="img_pt" autocomplete="img_pt" autofocus>
        </div>

        <textarea class="form-control" id="editor1" name="isi_pt" cols="5" rows="5" style="resize: none !important; width: 100%; height: 100px;">{!! $loker->isi_pt !!}</textarea>

        <script>
            CKEDITOR.replace('editor1');
        </script>

        <div class="d-flex justify-content-end mt-3">
            <button class="btn btn-success">Edit</button>
        </div>
    </form>
</div>
@endsection