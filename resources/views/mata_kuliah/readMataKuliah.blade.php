@extends('layouts.app')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><i class="nav-icon fas fa-book"></i> {{ __(' Table Mata Kuliah') }}</h1>
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
                                        <th scope="col">KODE MAKUL</th>
                                        <th scope="col">NAMA MAKUL</th>
                                        <th scope="col">DOSEN PENGAMPU</th>
                                        <th scope="col">PRASYARAT</th>
                                        <th scope="col">SKS</th>
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
                                            <td><?= $datax->kode_makul ?></td>
                                            <td><?= $datax->nama_makul ?></td>
                                            <td><?= $datax->dosen_pengampu ?></td>
                                            <td><?= $datax->prasyarat ?></td>
                                            <td><?= $datax->sks ?></td>
                                            <td><?= $datax->created_at ?></td>
                                            <td><?= $datax->updated_at ?></td>
                                            <td>
                                                <a href="/updateMataKuliah/<?= $datax->kode_makul ?>" onclick="return confirm('Yakin mau diedit/diupdate ?');" class="btn btn-warning btn-block elevation-2">Update</a>
                                                <a href="/deleteMataKuliah/<?= $datax->kode_makul ?>" onclick="return confirm('Yakin mau dihapus ?');" class="btn btn-danger btn-block elevation-2">Delete</a>
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
                        <a href="createMataKuliah" class="btn btn-success elevation-2">Tambah Data</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection