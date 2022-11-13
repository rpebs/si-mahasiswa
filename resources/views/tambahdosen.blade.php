@extends('master')

@section('konten')
    <h3>Form Edit Jurusan</h3>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="col-md-6" method="post" action="{{ route('simpandosen') }}">
        @csrf
        <div class="form-group">
            <label>Nama Dosen</label>
            <input type="text" name="nama_dosen" class="form-control" placeholder="Nama Dosen" required="">
        </div>
        <div class="form-group">
            <label>NIP</label>
            <input type="text" name="nip" class="form-control" placeholder="NIP" required="">
        </div>
        <div class="form-group">
            <label>No HP</label>
            <input type="text" name="no_hp" class="form-control" placeholder="Nomor Handphone" required="">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Email" required="">
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" rows="3" class="form-control" placeholder="Alamat" required=""></textarea>
        </div>
        <br>
        <div class="form-group text-right">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
        </div>
    </form>
@endsection
