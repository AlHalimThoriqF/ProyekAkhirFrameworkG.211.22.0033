@extends('layouts.app')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><i class="nav-icon fas fa-user-graduate"></i>{{ __(' Create Data Mahasiswa') }}</h1>
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
                <div class="card card-info">
                    <div class="card-header">
                        <h2 class="card-title">Form Input Data Mahasiswa</h2>
                    </div>
                    <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url ('saveMahasiswa')}}" enctype="multipart/form-data">
                        <div class="card-body">
                            @csrf
                            <div class="form-group">
                                <label for="nim">NIM</label>
                                <input type="text" id="nim" name="nim" class="form-control" required="" placeholder="Masukan NIM { format : G.123.12.1234 }">
                            </div>
                            <div class="form-group">
                                <label for="nama">NAMA MAHASISWA</label>
                                <input type="text" id="nama" name="nama" class="form-control" required="" placeholder="Masukan Nama">
                            </div>

                            <div class="form-group">
                                <label for="foto">FOTO</label>
                                <input type="file" id="foto" name="foto" class="form-control" accept="image/*" required="">
                            </div>

                            <div class="form-group">
                                <label for="umur">UMUR</label>
                                <input type="number" id="umur" name="umur" class="form-control" required="" placeholder="Masukan Umur">

                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">JENIS KELAMIN</label>
                                <select id="jenis_kelamin" name="jenis_kelamin" class="form-control" required="">
                                    <option value="" disabled selected>Pilih Gender</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="email">EMAIL</label>
                                <input type="email" id="email" name="email" class="form-control" required="" placeholder="Masukan Email">
                            </div>
                            <div class="form-group">
                                <label for="alamat">ALAMAT</label>
                                <textarea name="alamat" class="form-control" required="" placeholder="Masukan Alamat"></textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection