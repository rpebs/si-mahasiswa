@extends('master')

@section('konten')
    <h3>Tampil Data Mata Kuliah</h3>
    <a class="btn btn-success" href="{{ route('tambahmatkul') }}"><i class="fa fa-plus"></i> Tambah Matkul</a><br><br>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
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
            <th>Mata Kuliah</th>
            <th>Kode</th>
            <th>Aksi</th>
        </tr>
        @forelse ($mata_kuliah as $m)
            <tr>
                <td>{{ $m->id }}</td>
                <td>{{ $m->nama_matkul }}</td>
                <td>{{ $m->kode_matkul }}</td>
                <td>
                    <a href="/matkul/ubah/{{ $m->kode_matkul }}" class="btn btn-warning btn-sm"><i
                            class="fa fa-pencil"></i></a>
                    <a href="/matkul/hapus/{{ $m->kode_matkul }}"
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
        {{ $mata_kuliah->links() }}
    </div>
@endsection
