@extends('master')

@section('konten')
    <h3>Form Input Mahasiswa</h3>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="col-md-6" method="post" action="{{ route('simpanjurusan') }}">
        @csrf
        <div class="form-group">
            <label>Nama Jurusan</label>
            <input type="text" name="nama_jurusan" class="form-control" placeholder="Nama Jurusan" required="">
        </div><br>
        <div class="form-group">
            <label>Kode</label>
            <input type="text" name="kode" class="form-control" placeholder="Kode Jurusan" required="">
        </div>
        <br>
        <div class="form-group text-right">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
        </div>
    </form>
@endsection
