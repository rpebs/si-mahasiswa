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

    <label for="search" class="form-label"><b>Pencarian</b></label>
    <div class="input-group w-25 mb-3" style="margin-top: -5px">

        <input type="text" name="search" class="form-control" id="search" placeholder="Masukkan Nama Dosen">

    </div>

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>#ID</th>
                <th>Nama Dosen</th>
                <th>NIP</th>
                <th>Alamat</th>
                <th>No. HP</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($dosen as $d)
                <tr>
                    <td>{{ $d->id }}</td>
                    <td>{{ $d->nama_dosen }}</td>
                    <td>{{ $d->nip }}</td>
                    <td>{{ $d->alamat }}</td>
                    <td>{{ $d->no_hp }}</td>
                    <td>{{ $d->email }}</td>
                    <td>
                        <a href="/dosen/ubah/{{ $d->nip }}" class="btn btn-warning btn-sm"><i
                                class="fa fa-pencil"></i></a>
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
        </tbody>


    </table>
    <div class="text-center">
        {{ $dosen->links() }}
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    <script type="text/javascript">
        $('#search').on('keyup', function() {
            $value = $(this).val();
            $.ajax({
                type: 'get',
                url: '{{ URL::to('dosen/search') }}',
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
