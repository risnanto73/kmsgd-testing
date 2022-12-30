@extends('layouts.parents.parent')

@section('title')
Loker Add
@endsection

@section('content')
<div class="container">
    <form action="{{route('loker.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="input-group input-group-outline mb-3 mt-3">
            <label class="form-label text-primary">Nama Program</label>
            <input id="tahun" required type="text" class="form-control" name="name_pt">
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
        
        <label class="text-primary ms-3">Photo</label>
        <div class="input-group input-group-outline mb-3">
            <input id="img_pt" type="file" class="form-control" name="img_pt" required autocomplete="img_pt" autofocus>
        </div>
        
        <textarea required class="form-control" id="editor1" name="isi_pt" cols="5" rows="5" style="resize: none !important; width: 100%; height: 100px;"></textarea>
        
        <script>
            CKEDITOR.replace('editor1');
        </script>

        <div class="d-flex justify-content-end mt-3">
            <button class="btn btn-success">Add</button>
        </div>
    </form>
</div>

@endsection