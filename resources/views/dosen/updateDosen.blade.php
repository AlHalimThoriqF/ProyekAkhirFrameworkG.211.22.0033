@extends('layouts.app')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('Update Data Dosen') }}</h1>
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
                        <h2 class="card-title">Form Edit Data Dosen</h2>
                    </div>
                    <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url ('editDosen')}}" enctype="multipart/form-data">
                        <div class="card-body">
                            @csrf
                            <div class="form-group">
                                <label for="id_dosen">ID</label>
                                <input type="text" id="id_dosen" name="id_dosen" class="form-control" required="" value="{{$data->id_dosen}}" placeholder="Masukan ID" readonly>
                            </div>
                            <div class="form-group">
                                <label for="dosen_pengampu">NAMA DOSEN</label>
                                <input type="text" id="dosen_pengampu" name="dosen_pengampu" class="form-control" required="" value="{{$data->nama_dosen}}" placeholder="Masukan Nama">
                            </div>

                            <div class="form-group">
                                <label for="foto">FOTO</label> <br>
                                <img id="foto-preview" src="{{ asset('fotodosen/'. $data['foto_dosen']) }}" alt='Foto Dosen' width='100'>
                                <input type="text" class="form-control" value="{{ $data->foto_dosen }}" readonly>
                                <input type="file" id="foto" name="foto" class="form-control" onchange="previewImage(this)">
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
                                <input type="email" id="email" name="email" class="form-control" required="" value="{{$data->email_dosen}}" placeholder="Masukan Email">
                            </div>
                            <div class="form-group">
                                <label for="alamat">ALAMAT</label>
                                <textarea name="alamat" class="form-control" required="" placeholder="Masukan Alamat">{{$data->alamat_dosen}}</textarea>
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