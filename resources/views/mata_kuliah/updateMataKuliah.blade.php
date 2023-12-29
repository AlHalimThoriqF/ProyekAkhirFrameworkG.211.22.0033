@extends('layouts.app')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('Update Data Mata Kuliah') }}</h1>
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
                        <h2 class="card-title">Form Edit Data Mata Kuliah</h2>
                    </div>
                    <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url ('editMataKuliah')}}" enctype="multipart/form-data">
                        <div class="card-body">
                            @csrf
                            <div class="form-group">
                                <label for="kode_makul">KODE MAKUL</label>
                                <input type="text" id="kode_makul" name="kode_makul" class="form-control" required="" value="{{$data->kode_makul}}"  readonly>
                            </div>
                            <div class="form-group">
                                <label for="makul">NAMA MAKUL</label>
                                <input type="text" id="makul" name="makul" class="form-control" required="" value="{{$data->nama_makul}}" placeholder="Masukan Nama Makul">
                            </div>
                            <div class="form-group">
                                <label for="dosen_pengampu">DOSEN PENGAMPU</label>
                                <input type="text" id="dosen_pengampu" name="dosen_pengampu" class="form-control" required="" value="{{$data->dosen_pengampu}}" placeholder="Masukan Nama Dosen Pengampu">
                           </div>
                            <div class="form-group">
                                <label for="prasyarat">PRASYARAT</label>
                                <select id="prasyarat" name="prasyarat" class="form-control" required="">
                                    <option value="" disabled selected>Pilih Gender</option>
                                    <<option value="Ya" {{ $data->prasyarat === 'Ya' ? 'selected' : '' }}>Ya</option>
                                        <option value="Tidak" {{ $data->prasyarat === 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sks">SKS</label>
                                <input type="text" id="sks" name="sks" class="form-control" required="" value="{{$data->sks}}" placeholder="Masukan sks">
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

@endsection