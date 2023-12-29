@extends('layouts.app')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('Update Data Mahasiswa') }}</h1>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Error:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="card card-warning">
                    <div class="card-header">
                        <h2 class="card-title">Form Edit Data Mahasiswa</h2>
                    </div>
                    <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url ('editMahasiswa')}}" enctype="multipart/form-data">
                        <div class="card-body">
                            @csrf
                            <div class="form-group">
                                <label for="nim">NIM</label>
                                <input type="text" id="nim" name="nim" class="form-control" required="" value="{{$data->nim}}" placeholder="Masukan NIM" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nama">NAMA</label>
                                <input type="text" id="nama" name="nama" class="form-control" required="" value="{{$data->nama_mhs}}" placeholder="Masukan Nama">
                            </div>

                            <div class="form-group">
                                <label for="foto">FOTO</label> <br>
                                <img id="foto-preview" src="{{ asset('fotomhs/'. $data['foto_mhs']) }}" alt='Foto Mahasiswa' width='100'>
                                <input type="text" class="form-control" value="{{ $data->foto_mhs }}" readonly>
                                <input type="file" id="foto" name="foto" class="form-control" onchange="previewImage(this)">
                            </div>

                            <div class="form-group">
                                <label for="umur">UMUR</label>
                                <input type="number" id="umur" name="umur" class="form-control" required="" value="{{$data->umur_mhs}}" placeholder="Masukan Umur">

                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select id="jenis_kelamin" name="jenis_kelamin" class="form-control" required="">
                                    <option value="" disabled selected>Pilih Gender</option>
                                    <<option value="Laki-laki" {{ $data->jenis_kelamin === 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="Perempuan" {{ $data->jenis_kelamin === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="email">EMAIL</label>
                                <input type="email" id="email" name="email" class="form-control" required="" value="{{$data->email_mhs}}" placeholder="Masukan Email">
                            </div>
                            <div class="form-group">
                                <label for="alamat">ALAMAT</label>
                                <textarea name="alamat" class="form-control" required="" placeholder="Masukan Alamat">{{$data->alamat_mhs}}</textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-warning">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function previewImage(input) {
        var preview = document.getElementById('foto-preview');
        var fileName = input.value.split('\\').pop();
        input.previousElementSibling.value = fileName;

        var reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
        };

        if (input.files.length > 0) {
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

@endsection