@extends('master')

@section('konten')
    <h3>Ubah Data Mahasiswa</h3>
    @foreach ($mahasiswa as $mhs)
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="col-md-6" method="post" action="{{ route('update') }}">
            @csrf
            <input type="hidden" name="id" value="{{ $mhs->id }}">
            <div class="form-group">
                <label>Nama Mahasiswa</label>
                <input type="text" name="nama" value="{{ $mhs->nama }}" class="form-control"
                    placeholder="Nama Mahasiswa" required="">
            </div>
            <div class="form-group">
                <label>NPM</label>
                <input type="number" name="npm" value="{{ $mhs->npm }}" class="form-control" placeholder="NPM"
                    required="">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" rows="3" class="form-control" placeholder="Alamat" required="">{{ $mhs->alamat }}</textarea>
            </div>
            <label>Jurusan</label>
            <select class="form-select" aria-label="Default select example" name="jurusan_id">
                <option value="{{ $mhs->jurusan_id }}">{{ $mhs->jurusan->nama_jurusan }}</option>
                @foreach ($jurusan as $j)
                    <option value="{{ $j->id }}">{{ $j->nama_jurusan }}</option>
                @endforeach
            </select>
            <br>
            <div class="form-group text-right">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update Data</button>
            </div>
        </form>
    @endforeach
@endsection
