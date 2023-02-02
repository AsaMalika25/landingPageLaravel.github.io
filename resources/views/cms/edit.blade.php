@extends('layout.backend_layout') 
<!-- START FORM -->
@section('konten')


<form action="{{ url('edit-Cms/'.$data->id) }}" method='post' enctype="multipart/form-data">
@csrf
@method('PUT')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href="{{ url('list-Cms') }}" class="btn-btn-secondary"><< kembali</a>
            @if ($data->image)
                <div class="mb-3 row">
                    <img style="max-width:50px;max-height:50px" src="{{asset('public/image/'.$data->nama_banner)}}" alt="" width="150px">
                </div>
            @endif
            <div class="mb-3 row">
                <label for="nim" class="col-sm-2 col-form-label">judul_halaman</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='judul_halaman' id="judul_halaman">
                </div>
            </div>
            
            <div class="mb-3 row">
                <input type="file" name="nama_banner" id="image" class="form-control">
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
            </div>
        </div>
    </form>
        <!-- AKHIR FORM -->
        @endsection