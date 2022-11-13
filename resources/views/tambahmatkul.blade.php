@extends('master')

@section('konten')
    <h3>Form Input Matkul</h3>
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
    <form class="col-md-6" method="post" action="{{ route('simpanmatkul') }}">
        @csrf
        <div class="form-group">
            <label>Nama Mata Kuliah</label>
            <input type="text" id="nama_matkul" name="nama_matkul" class="form-control" placeholder="Nama Matkul"
                onfocusout="get_value()" required="">
        </div><br>
        <div class="form-group">
            <label>Kode Matkul</label>
            <input type="text" name="kode_matkul" class="form-control" placeholder="Kode Matkul" id="code"
                required="">
        </div>
        <br>
        <div class="form-group text-right">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
        </div>
    </form>
@endsection

<script>
    function get_value() {
        var nilai = document.getElementById("nama_matkul").value;
        var detect = nilai.charAt(nilai.indexOf(" ") + 1);
        var code = nilai.charAt(0);



        document.getElementById("code").value = code + detect;
    }
</script>
