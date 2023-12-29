<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\move;

class MahasiswaController extends Controller

{
    public function createMahasiswa(){
        return view('mahasiswa/createMahasiswa');
    }
    
    public function updateMahasiswa($nim){
        if($data=Mahasiswa::find($nim)) {
            return view('mahasiswa/updateMahasiswa', ['data'=>$data]);
        } else return redirect('/readMahasiswa');
    }
    
    public function editMahasiswa(Request $request){
        
        if($data=Mahasiswa::find($request->nim)) {
            $validateData = $request ->validate([
                'nama'=> 'required|string|max:40',
                'umur'=> 'required|integer|between:1,100',
                'alamat'=> 'required|min:6',
                'email'=> 'required|email',
                ]);

            $data->nama_mhs=@$request->nama;
            if ($request->hasFile('foto')) {
                $foto=$request->file('foto');
                $fotomhs=$foto->getClientOriginalName();
                $foto->move(public_path('/fotomhs'),$fotomhs );
                $data->foto_mhs = $fotomhs;
            }
            $data->umur_mhs=@$request->umur;
            $data->jenis_kelamin=@$request->jenis_kelamin;
            $data->email_mhs=@$request->email;
            $data->alamat_mhs=@$request->alamat;
            $data->updated_at=date("Y-m-d H:i:s");
            $data->save();
            return redirect('mahasiswa/readMahasiswa')->with('pesan', 'data dengan NIM : '.$request->nim. ' berhasil diupdate');
        } else {
            return redirect('mahasiswa/readMahasiswa')->with ('pesan', 'data tidak ditemukan/gagal diupdate');
        }
    }

    public function saveMahasiswa(Request $request)
    {
        $validateData = $request ->validate([
            'nim' => 'required|regex:/^G.\d{3}.\d{2}.\d{4}$/|unique:mahasiswa,nim',
            'nama'=> 'required|string|max:40',
            'foto'=> 'required',
            'umur'=> 'required|integer|between:1,100',
            'alamat'=> 'required|min:5',
            'email'=> 'required|email',
            ]);

        $model = new Mahasiswa();
        if ($request->hasFile('foto')) {
            $foto=$request->file('foto');
            $fotomhs=$foto->getClientOriginalName();
            $foto->move(public_path('/fotomhs'),$fotomhs );
            $model->foto = $fotomhs;
        }
        $modelData =[
            'nim'=>@$request->nim,
            'nama_mhs'=>@$request->nama,
            'foto_mhs'=>@$model->foto,
            'jenis_kelamin'=>@$request->jenis_kelamin,
            'alamat_mhs'=>@$request->alamat,
            'umur_mhs'=>@$request->umur,
            'email_mhs'=>@$request->email,
            'created_at'=>date("Y-m-d H:i:s")];

        $model::insert($modelData);

        return view('mahasiswa/viewMahasiswa',['data'=>$modelData]);
    }
    
    public function readMahasiswa(){
        $model = new Mahasiswa();
        $dataAll=$model->all();
        return view('mahasiswa/readMahasiswa',['dataAll'=>$dataAll]);
    }


    public function deleteMahasiswa($nim){
        if($data = Mahasiswa::find($nim))
        {
            $data->delete();
        } else{
            return redirect('mahasiswa/readMahasiswa')->with('pesan','Data NIM : '.@$nim.' tidak ditemukan');
        }
        
        return redirect('mahasiswa/readMahasiswa')->with('pesan','Data NIM : '.@$nim.' Berhasil dihapus');
    }
    
    public function logout()
    {
        return view('logout');
    }
}