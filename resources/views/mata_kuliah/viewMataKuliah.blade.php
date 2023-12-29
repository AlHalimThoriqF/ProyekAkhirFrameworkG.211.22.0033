@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('Data Mata Kuliah Berhasil disimpan') }}</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h2 class="card-title text-center">Data Baru Mata Kuliah</h2>
                    </div>
                    <div class="card-body p-0  text-center">
                        <center>
                            <table class="table text-white table-borderless table-hover mt-4" style='width:35%;'>
                                <tbody>
                                    <tr>
                                        <td>KODE MAKUL</td>
                                        <td>:</td>
                                        <td>{{$data['kode_makul']}}</td>
                                    </tr>
                                    <tr>
                                        <td>NAMA MAKUL</td>
                                        <td>:</td>
                                        <td>{{$data['nama_makul']}}</td>
                                    </tr>
                                    <tr>
                                        <td>DOSEN PENGAMPU</td>
                                        <td>:</td>
                                        <td>{{$data['dosen_pengampu']}}</td>
                                    </tr>
                                    <tr>
                                        <td>PRASYARAT</td>
                                        <td>:</td>
                                        <td>{{$data['prasyarat']}}</td>
                                    </tr>
                                    <tr>
                                        <td>SKS</td>
                                        <td>:</td>
                                        <td>{{$data['sks']}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </center>
                        <div class="card-footer  text-center mt-4">
                            <a href="mata_kuliah/readMataKuliah" class="btn btn-success">Tampilkan Data</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection