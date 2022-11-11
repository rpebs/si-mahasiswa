@extends('master')

@section('konten')
    <h3>Tampil Data Mahasiswa</h3>
    <a class="btn btn-success" href="{{ route('tambah') }}"><i class="fa fa-plus"></i> Tambah Mahasiswa</a><br><br>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <form class="row g-3" method="get" action="{{ route('search') }}">
        <label for="search" class="form-label"><b>Pencarian</b></label>
        <div class="input-group w-25 mb-3" style="margin-top: -5px">

            <input type="text" name="search" class="form-control" id="search" placeholder="Masukkan Nama Mahasiswa"
                value="{{ request('search') }}">
            <button type="submit" class="d-flex btn btn-md btn-primary">Cari</button>
        </div>




    </form><br>
    <table class="table table-bordered table-hover">
        <tr>
            <th>#ID</th>
            <th>Nama Mahasiswa</th>
            <th>NPM</th>
            <th>Alamat</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>
        @forelse ($mahasiswa as $mhs)
            <tr>
                <td>{{ $mhs->id }}</td>
                <td>{{ $mhs->nama }}</td>
                <td>{{ $mhs->npm }}</td>
                <td>{{ $mhs->alamat }}</td>
                <td>{{ $mhs->jurusan->nama_jurusan }}</td>

                <td>
                    <a href="/mahasiswa/ubah/{{ $mhs->npm }}" class="btn btn-warning btn-sm"><i
                            class="fa fa-pencil"></i></a>
                    <a href="/mahasiswa/hapus/{{ $mhs->id }}"
                        onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-danger btn-sm"><i
                            class="fa fa-trash"></i></a>
                </td>
            </tr>
        @empty
            <div class="alert alert-danger">
                Data Tidak Ditemukan
            </div>
        @endforelse

    </table>
    <div class="text-center">
        {{ $mahasiswa->links() }}
    </div>
@endsection
