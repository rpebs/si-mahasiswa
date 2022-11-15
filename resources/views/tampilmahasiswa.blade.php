@extends('master')

@section('konten')
    <h3>Tampil Data Mahasiswa</h3>
    <a class="btn btn-success" href="{{ route('tambah') }}"><i class="fa fa-plus"></i> Tambah Mahasiswa</a><br><br>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <label for="search" class="form-label"><b>Pencarian</b></label>
    <div class="input-group w-25 mb-3" style="margin-top: -5px">

        <input type="text" name="search" class="form-control" id="search">
        <button type="submit" class="d-flex btn btn-md btn-primary">Cari</button>
    </div>




    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>#ID</th>
                <th>Nama Mahasiswa</th>
                <th>NPM</th>
                <th>Alamat</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
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
        </tbody>
    </table>
    <div class="text-center" id="paginate">
        {{ $mahasiswa->links() }}
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    <script type="text/javascript">
        $('#search').on('keyup', function() {
            $value = $(this).val();
            $.ajax({
                type: 'get',
                url: '{{ URL::to('mahasiswa/search') }}',
                data: {
                    'search': $value
                },
                success: function(data) {
                    $('tbody').html(data);

                }
            });
        })
    </script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'csrftoken': '{{ csrf_token() }}'
            }
        });
    </script>
@endsection
