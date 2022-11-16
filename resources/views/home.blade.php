@extends('master')

@section('konten')
    <div class="row">
        <h4 class="col-md-6">Selamat Datang <b>{{ Auth::user()->name }}</b>, Anda Login sebagai
            <b>{{ Auth::user()->role }}</b>.
        </h4>
    </div>


    <div class="row">
        <div class="ms-5 col-md-2 p-4 bg-primary text-light text-center">
            Data Mahasiswa
            <a href="mahasiswa/tampil" class="btn btn-sm btn-success">Cek Data</a>
        </div>

        <div class="ms-3 col-md-2 p-4 bg-success text-light text-center">
            Data Jurusan
            <a href="jurusan/tampil" class="btn btn-sm btn-primary">Cek Data</a>
        </div>

        <div class="ms-3 col-md-2 p-4 bg-danger text-light text-center">
            Data Dosen
            <a href="dosen/tampil" class="btn btn-sm btn-success">Cek Data</a>
        </div>
        <div class="ms-3  col-md-2 p-4 bg-warning text-light text-center">
            Data Mata Kuliah
            <a href="matkul/tampil" class="btn btn-sm btn-danger">Cek Data</a>
        </div>
        <div class="ms-3  col-md-2 p-4 bg-dark text-light text-center">
            Data Jadwal Kuliah
            <a href="jadwal/tampil" class="btn btn-sm btn-danger">Cek Data</a>
        </div>
    </div>
@endsection
