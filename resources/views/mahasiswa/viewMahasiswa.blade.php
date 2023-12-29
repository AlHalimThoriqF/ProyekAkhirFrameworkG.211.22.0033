@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('Data Mahasiswa Berhasil disimpan') }}</h1>
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
                        <h2 class="card-title text-center">Data Baru Mahasiswa</h2>
                    </div>
                    <div class="card-body p-0  text-center">
                        <center>
                            <img src="{{ asset('fotomhs/'. $data['foto_mhs']) }}" alt='Foto Mahasiswa' class='img-fluid rounded mt-4' width='200'>
                            <table class="table text-white table-borderless table-hover" style='width:35%;'>
                                <tbody>
                                    <tr>
                                        <td>NIM</td>
                                        <td>:</td>
                                        <td>{{$data['nim']}}</td>
                                    </tr>
                                    <tr>
                                        <td>NAMA MAHASISWA</td>
                                        <td>:</td>
                                        <td>{{$data['nama_mhs']}}</td>
                                    </tr>
                                    <tr>
                                        <td>UMUR</td>
                                        <td>:</td>
                                        <td>{{$data['umur_mhs']}}</td>
                                    </tr>
                                    <tr>
                                        <td>JENIS KELAMIN</td>
                                        <td>:</td>
                                        <td>{{$data['jenis_kelamin']}}</td>
                                    </tr>
                                    <tr>
                                        <td>EMAIL</td>
                                        <td>:</td>
                                        <td>{{$data['email_mhs']}}</td>
                                    </tr>
                                    <tr>
                                        <td>ALAMAT</td>
                                        <td>:</td>
                                        <td>{{$data['alamat_mhs']}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </center>
                        <div class="card-footer  text-center mt-4">
                            <a href="mahasiswa/readMahasiswa" class="btn btn-success">Tampilkan Data</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection