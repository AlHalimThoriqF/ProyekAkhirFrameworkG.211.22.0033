@extends('layouts.app')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><i class="nav-icon fas fa-chalkboard-teacher"></i>{{ __(' Create Data Dosen') }}</h1>
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
                        <h2 class="card-title">Form Input Data Dosen</h2>
                    </div>
                    <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url ('saveDosen')}}" enctype="multipart/form-data">
                        <div class="card-body">
                            @csrf
                            <div class="form-group">
                                <label for="id_dosen">ID</label>
                                <input type="text" id="id_dosen" name="id_dosen" class="form-control" required="" placeholder="Masukan ID  { format : DSN123 }">
                            </div>
                            <div class="form-group">
                                <label for="dosen_pengampu">NAMA DOSEN</label>
                                <input type="text" id="dosen_pengampu" name="dosen_pengampu" class="form-control" required="" placeholder="Masukan Nama">
                            </div>

                            <div class="form-group">
                                <label for="foto">FOTO</label>
                                <input type="file" id="foto" name="foto" class="form-control" accept="image/*" required="">
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