<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Mata_kuliah;
use App\Models\User;
use App\Models\Dosen;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jumlahDataMhs = Mahasiswa::count();
        $jumlahDataUser = User::count();
        $jumlahDataDosen = Dosen::count();
        $jumlahDataMakul = Mata_kuliah::count();
        
        $LakilakiMahasiswa = Mahasiswa::where('jenis_kelamin', 'Laki-laki')->count();
        $PerempuanMahasiswa = Mahasiswa::where('jenis_kelamin', 'Perempuan')->count();
        
        $LakilakiDosen = Dosen::where('jenis_kelamin', 'Laki-laki')->count();
        $PerempuanDosen = Dosen::where('jenis_kelamin', 'Perempuan')->count();

        $totalMahasiswa = $LakilakiMahasiswa + $PerempuanMahasiswa;
        $totalDosen = $LakilakiDosen + $PerempuanDosen;

        $LakilakiMahasiswaPersen = ($totalMahasiswa > 0) ? ($LakilakiMahasiswa / $totalMahasiswa) * 100 : 0;
        $PerempuanMahasiswaPersen = ($totalMahasiswa > 0) ? ($PerempuanMahasiswa / $totalMahasiswa) * 100 : 0;

        $LakilakiDosenPersen = ($totalDosen > 0) ? ($LakilakiDosen / $totalDosen) * 100 : 0;
        $PerempuanDosenPersen = ($totalDosen > 0) ? ($PerempuanDosen / $totalDosen) * 100 : 0;

        return view('home', compact(
            'jumlahDataMhs',
            'jumlahDataDosen',
            'jumlahDataMakul',
            'jumlahDataUser',
            'LakilakiMahasiswa',
            'PerempuanMahasiswa',
            'LakilakiDosen',
            'PerempuanDosen',
            'LakilakiMahasiswaPersen',
            'PerempuanMahasiswaPersen',
            'LakilakiDosenPersen',
            'PerempuanDosenPersen'
        ));
    }
}
