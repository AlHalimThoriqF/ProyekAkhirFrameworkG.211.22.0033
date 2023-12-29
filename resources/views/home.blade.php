@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('Dashboard') }}</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <p class="callout callout-info">
                    {{ __('You are logged in!') }}
                </p>
            </div>
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h4 class="card-text text-center">
                        <i class="fas fa-chart-bar"></i>{{ __(' Jumlah Data Table') }}
                        </h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $jumlahDataUser }}</h3>
                        <p>User Registrasi</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <a href="{{ route('users.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $jumlahDataMhs }}</h3>
                        <p>Mahasiswa</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <a href="{{ route('read.mahasiswa') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $jumlahDataDosen }}</h3>
                        <p>Dosen</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <a href="{{ route('read.dosen') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $jumlahDataMakul }}</h3>

                        <p>Mata Kuliah</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <a href="{{ route('read.mata_kuliah') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-warning card-outline">
                    <div class="card-header">
                        <h4 class="card-text text-center">
                        <i class="fas fa-venus-mars"></i>{{ __(' Diagram Gender') }}
                        </h4>
                    </div>
                </div>
            </div>
             <!-- Mahasiswa (Student) Chart -->
             <div class="col-md-6">
                <div class="card card-success elevation-2">
                <div class="card-header">
                <h3 class="card-title">{{ __('Diagram Pie - Gender Mahasiswa ') }}<i class="fas fa-user-graduate"></i></h3>
              </div>
                    <div class="card-body">
                        <canvas id="studentGenderChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Dosen (Professor) Chart -->
            <div class="col-md-6">
                <div class="card card-warning elevation-2">
                <div class="card-header">
                <h3 class="card-title">{{ __('Diagram Pie - Gender Dosen ') }}<i class="fas fa-chalkboard-teacher"></i></h3>
              </div>
                    <div class="card-body">
                        <canvas id="professorGenderChart"></canvas>
                    </div>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </div>
</div>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Chart.js script to create pie charts for students and professors
    document.addEventListener('DOMContentLoaded', function () {
        // Gender Distribution - Students
        var studentCtx = document.getElementById('studentGenderChart').getContext('2d');
        var studentGenderChart = new Chart(studentCtx, {
            type: 'pie',
            data: {
                labels: [
                    'Laki-laki (Jumlah: <?php echo $LakilakiMahasiswa; ?>)',
                    'Perempuan (Jumlah: <?php echo $PerempuanMahasiswa; ?>)'
                ],
                datasets: [{
                    data: [
                        <?php echo json_encode($LakilakiMahasiswaPersen); ?>,
                        <?php echo json_encode($PerempuanMahasiswaPersen); ?>
                    ],
                    backgroundColor: ['#87CEEB', '#FFC0CB']
                }]
            },
            options: {
                responsive: true,
                legend: {
                    position: 'right'
                },
                title: {
                    display: true,
                    text: 'Gender Distribution - Students'
                },
                maintainAspectRatio: false, // Add this line
                aspectRatio: 1 // Add this line
            }
        });

        // Gender Distribution - Professors
        var professorCtx = document.getElementById('professorGenderChart').getContext('2d');
        var professorGenderChart = new Chart(professorCtx, {
            type: 'pie',
            data: {
                labels: [
                    'Laki-laki (Jumlah: <?php echo $LakilakiDosen; ?>)',
                    'Perempuan (Jumlah: <?php echo $PerempuanDosen; ?>)'
                ],
                datasets: [{
                    data: [
                        <?php echo json_encode($LakilakiDosenPersen); ?>,
                        <?php echo json_encode($PerempuanDosenPersen); ?>
                    ],
                    backgroundColor: ['#87CEEB', '#FFC0CB']
                }]
            },
            options: {
                responsive: true,
                legend: {
                    position: 'right'
                },
                title: {
                    display: true,
                    text: 'Gender Distribution - Professors'
                },
                maintainAspectRatio: false, // Add this line
                aspectRatio: 1 // Add this line
            }
        });
    });
</script>
@endsection
