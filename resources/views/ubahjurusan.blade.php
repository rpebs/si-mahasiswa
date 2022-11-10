@extends('master')

@section('konten')
    <h3>Form Edit Jurusan</h3>
    @foreach ($jurusan as $j)
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="col-md-6" method="post" action="{{ route('updatejurusan') }}">
            @csrf
            <input type="hidden" name="id" value="{{ $j->id }}">
            <div class="form-group">
                <label>Nama Jurusan</label>
                <input type="text" name="nama_jurusan" class="form-control" placeholder="Nama Jurusan"
                    value="{{ $j->nama_jurusan }}" required="">
            </div><br>
            <div class="form-group">
                <label>Kode</label>
                <input type="text" name="kode" class="form-control" placeholder="Kode Jurusan"
                    value="{{ $j->kode }}" required="">
            </div>
            <br>
            <div class="form-group text-right">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
            </div>
        </form>
    @endforeach
@endsection
