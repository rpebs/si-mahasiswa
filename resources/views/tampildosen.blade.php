@extends('master')

@section('konten')
    <h3>Tampil Data Dosen</h3>
    <a class="btn btn-success" href="{{ route('tambahdosen') }}"><i class="fa fa-plus"></i> Tambah Dosen</a><br><br>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    @if (session('failed'))
        <div class="alert alert-danger">
            {{ session('failed') }}
        </div>
    @endif
    {{-- <form class="row g-3" method="get" action="{{ route('search') }}">
        <label for="search" class="form-label"><b>Pencarian</b></label>
        <div class="input-group w-25 mb-3" style="margin-top: -5px">

            <input type="text" name="search" class="form-control" id="search" placeholder="Masukkan Nama Mahasiswa"
                value="{{ request('search') }}">
            <button type="submit" class="d-flex btn btn-md btn-primary">Cari</button>
        </div>




    </form><br> --}}
    <table class="table table-bordered table-hover">
        <tr>
            <th>#ID</th>
            <th>Nama Dosen</th>
            <th>NIP</th>
            <th>Alamat</th>
            <th>No. HP</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
        @forelse ($dosen as $d)
            <tr>
                <td>{{ $d->id }}</td>
                <td>{{ $d->nama_dosen }}</td>
                <td>{{ $d->nip }}</td>
                <td>{{ $d->alamat }}</td>
                <td>{{ $d->no_hp }}</td>
                <td>{{ $d->email }}</td>
                <td>
                    <a href="/dosen/ubah/{{ $d->nip }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                    <a href="/dosen/hapus/{{ $d->nip }}"
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
        {{ $dosen->links() }}
    </div>
@endsection
