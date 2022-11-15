@extends('master')

@section('konten')
    <h3>Form Input Jadwal</h3>
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
    <form class="col-md-6" method="post" action="{{ route('simpanjadwal') }}">
        @csrf
        <div class="form-group">
            <label>Hari</label>
            <input type="text" name="hari" class="form-control" placeholder="Hari" required="">
        </div>
        <label>Dosen</label>
        <select class="form-select" aria-label="Default select example" name="dosen_id">
            @foreach ($dosen as $d)
                <option value="{{ $d->id }}">{{ $d->nama_dosen }}</option>
            @endforeach
        </select>
        <label>Mata Kuliah</label>
        <select class="form-select" aria-label="Default select example" name="matkul_id">
            @foreach ($mata_kuliah as $m)
                <option value="{{ $m->id }}">{{ $m->nama_matkul }}</option>
            @endforeach
        </select>
        <div class="form-group">
            <label>Jam Mulai</label>
            <input type="time" name="jam_mulai" class="form-control" placeholder="Jam Mulai" required="">
        </div>
        <div class="form-group">
            <label>Jam Selesai</label>
            <input type="time" name="jam_selesai" class="form-control" placeholder="Jam Selesai" required="">
        </div>


        <br>
        <div class="form-group text-right">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
        </div>
    </form>
@endsection
