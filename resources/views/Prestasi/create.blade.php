@extends('layout.backend_layout') 
<!-- START FORM -->
@section('konten')


<form action='' method='post' enctype="multipart/form-data" >
@csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href="{{ url('list-cms') }}" class="btn-btn-secondary"><< kembali</a>
            <div class="mb-3 row">
                <label for="nim" class="col-sm-2 col-form-label">judul_halaman</label>
                <div class="col-sm-10">
                    <input type="text"  name="judul_prestasi" value="{{ isset($data_prestasi->judul) ? $data_prestasi->judul : ''}}" class="form-control">
                </div>
            </div>
            {{-- <div class="mb-3 row">
                <label for="deskripsi" class="col-sm-2 col-form-label">deskripsi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control"value="{{ isset($data_kompetensi->deskripsi) ? $data_kompetensi->deskripsi : ''}}" name='deskripsi' id="deskripsi">
                </div>
            </div> --}}
            {{-- <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama_banner</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama'value="{{ Session::get('nama_banner') }}" id="nama">
                </div>
            </div> --}}
            {{-- <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='jurusan' value="{{ Session::get('jurusan') }}"id="jurusan">
                </div>
            </div> --}}
            <div class="mb-3 row">
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
            </div>
        </div>
    </form>
        <!-- AKHIR FORM -->
        @endsection