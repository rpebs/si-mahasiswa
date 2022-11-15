@extends('master')

@section('konten')
    <h3>Tampil Data Mahasiswa</h3>
    <a class="btn btn-success" href="{{ route('tampil') }}"><i class="fa fa-plus"></i> Tambah Jadwal</a><br><br>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <table class="table table-bordered table-hover">
        <tr>
            <th>#ID</th>
            <th>Hari</th>
            <th>Dosen</th>
            <th>Mata Kuliah</th>
            <th>Jam Mulai</th>
            <th>Jam Selesai</th>
            <th>Aksi</th>
        </tr>
        @forelse ($jadwal as $jd)
            <tr>
                <td>{{ $jd->id }}</td>
                <td>{{ $jd->hari }}</td>
                <td>{{ $jd->dosen->nama_dosen ?? 'none' }}</td>
                <td>{{ $jd->mata_kuliah->nama_matkul ?? 'none' }}</td>
                <td>{{ $jd->jam_mulai }}</td>
                <td>{{ $jd->jam_selesai }}</td>

                <td>
                    <a href="/mahasiswa/ubah/{{ $jd->hari }}" class="btn btn-warning btn-sm"><i
                            class="fa fa-pencil"></i></a>
                    <a href="/mahasiswa/hapus/{{ $jd->hari }}"
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
        {{ $jadwal->links() }}
    </div>
@endsection
