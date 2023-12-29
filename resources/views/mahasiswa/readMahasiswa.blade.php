@extends('layouts.app')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><i class="nav-icon fas fa-user-graduate"></i>{{ __(' Table Mahasiswa') }}</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                @if (session('pesan'))
                <div class="alert alert-success text-center">
                    {{ session('pesan') }}
                </div>
                @endif

                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover" style="width: 100%; overflow-x: auto;">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">NIM</th>
                                        <th scope="col">NAMA</th>
                                        <th scope="col">FOTO</th>
                                        <th scope="col">UMUR</th>
                                        <th scope="col">GENDER</th>
                                        <th scope="col">EMAIL</th>
                                        <th scope="col">ALAMAT</th>
                                        <th scope="col">CREATED AT</th>
                                        <th scope="col">UPDATED AT</th>
                                        <th scope="col">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody class="tables">
                                    <?php
                                    $num = 1;
                                    foreach ($dataAll as $datax) {
                                        $rowColorClass = ($num % 2 == 1) ?: '';
                                    ?>
                                        <tr class="<?= $rowColorClass ?>">
                                            <th scope="row"><?= $num ?></th>
                                            <td><?= $datax->nim ?></td>
                                            <td><?= $datax->nama_mhs ?></td>
                                            <td><img src="<?= asset('fotomhs/' . $datax->foto_mhs) ?>" alt="Foto Mahasiswa" class="mx-auto d-block rounded" width="160" height="100"></td>
                                            <td><?= $datax->umur_mhs ?></td>
                                            <td><?= $datax->jenis_kelamin ?></td>
                                            <td><?= $datax->email_mhs ?></td>
                                            <td><?= $datax->alamat_mhs ?></td>
                                            <td><?= $datax->created_at ?></td>
                                            <td><?= $datax->updated_at ?></td>
                                            <td>
                                                <a href="/updateMahasiswa/<?= $datax->nim ?>" onclick="return confirm('Yakin mau diedit/diupdate ?');" class="btn btn-warning btn-block elevation-2">Update</a>
                                                <a href="/deleteMahasiswa/<?= $datax->nim ?>" onclick="return confirm('Yakin mau dihapus ?');" class="btn btn-danger btn-block elevation-2">Delete</a>
                                            </td>
                                        </tr>
                                    <?php
                                        $num++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <a href="createMahasiswa" class="btn btn-success elevation-2">Tambah Data</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection