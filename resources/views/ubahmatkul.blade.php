@extends('master')

@section('konten')
    <h3>Form Edit Jurusan</h3>
    @foreach ($mata_kuliah as $m)
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="col-md-6" method="post" action="{{ route('updatematkul') }}">
            @csrf
            <input type="hidden" name="id" value="{{ $m->id }}">
            <div class="form-group">
                <label>Nama Jurusan</label>
                <input type="text" name="nama_matkul" class="form-control" placeholder="Nama Matkul"
                    value="{{ $m->nama_matkul }}" required="">
            </div><br>
            <div class="form-group">
                <label>Kode</label>
                <input type="text" name="kode_matkul" class="form-control" placeholder="Kode Matkul"
                    value="{{ $m->kode_matkul }}" required="">
            </div>
            <br>
            <div class="form-group text-right">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
            </div>
        </form>
    @endforeach
@endsection
