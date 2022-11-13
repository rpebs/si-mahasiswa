@extends('master')

@section('konten')
    <h3>Form Edit Jurusan</h3>
    @foreach ($dosen as $d)
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="col-md-6" method="post" action="{{ route('updatedosen') }}">
            @csrf
            <input type="hidden" name="id" value="{{ $d->id }}">
            <div class="form-group">
                <label>Nama Dosen</label>
                <input type="text" name="nama_dosen" class="form-control" placeholder="Nama Dosen"
                    value="{{ $d->nama_dosen }}" required="">
            </div>
            <div class="form-group">
                <label>NIP</label>
                <input type="text" name="nip" class="form-control" placeholder="NIP" value="{{ $d->nip }}"
                    required="">
            </div>
            <div class="form-group">
                <label>No HP</label>
                <input type="text" name="no_hp" class="form-control" placeholder="Nomor Handphone"
                    value="{{ $d->no_hp }}" required="">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $d->email }}"
                    required="">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" rows="3" class="form-control" placeholder="Alamat" required="">{{ $d->alamat }}</textarea>
            </div>
            <br>
            <div class="form-group text-right">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
            </div>
        </form>
    @endforeach
@endsection
