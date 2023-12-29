<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mata_kuliah;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\move;

class MakulController extends Controller

{
    public function createMataKuliah(){
        return view('mata_kuliah/createMataKuliah');
    }
    
    public function updateMataKuliah($nim){
        if($data=Mata_kuliah::find($nim)) {
            return view('mata_kuliah/updateMataKuliah', ['data'=>$data]);
        } else return redirect('/readMataKuliah');
    }
    
    public function editMataKuliah(Request $request){
        
        if($data=Mata_kuliah::find($request->kode_makul)) {
            $validateData = $request ->validate([
                'makul'=> 'required|string|max:25',
                'dosen_pengampu'=> 'required|string|max:30',
                'prasyarat'=> 'required',
                'sks'=> 'required|integer',
                ]);

            $data->nama_makul=@$request->makul;
            $data->dosen_pengampu=@$request->dosen_pengampu;
            $data->prasyarat=@$request->prasyarat;
            $data->sks=@$request->sks;
            $data->updated_at=date("Y-m-d H:i:s");
            $data->save();
            return redirect('mata_kuliah/readMataKuliah')->with('pesan', 'data dengan Kode_Makul : '.$request->kode_makul. ' berhasil diupdate');
        } else {
            return redirect('mata_kuliah/readMataKuliah')->with ('pesan', 'data tidak ditemukan/gagal diupdate');
        }
    }

    public function saveMataKuliah(Request $request)
    {
        $validateData = $request ->validate([
            'kode_makul' => 'required|regex:/^TIS\d{5}P$/|unique:mata_kuliah,kode_makul',
            'makul'=> 'required|string|max:25',
            'dosen_pengampu'=> 'required|string|max:30',
            'prasyarat'=> 'required',
            'sks'=> 'required|integer',
            ]);

        $model = new Mata_kuliah();
       
        $modelData =[
            'kode_makul'=>@$request->kode_makul,
            'nama_makul'=>@$request->makul,
            'dosen_pengampu'=>@$request->dosen_pengampu,
            'prasyarat'=>@$request->prasyarat,
            'sks'=>@$request->sks,
            'created_at'=>date("Y-m-d H:i:s")];

        $model::insert($modelData);

        return view('mata_kuliah/viewMataKuliah',['data'=>$modelData]);
    }
    
    public function readMataKuliah(){
        $model = new Mata_kuliah();
        $dataAll=$model->all();
        return view('mata_kuliah/readMataKuliah',['dataAll'=>$dataAll]);
    }


    public function deleteMataKuliah($kode_makul){
        if($data = Mata_kuliah::find($kode_makul))
        {
            $data->delete();
        } else{
            return redirect('mata_kuliah/readMataKuliah')->with('pesan','Data Kode_Makul : '.@$kode_makul.' tidak ditemukan');
        }
        
        return redirect('mata_kuliah/readMataKuliah')->with('pesan','Data Kode_Makul : '.@$kode_makul.' Berhasil dihapus');
    }
    
    public function logout()
    {
        return view('logout');
    }
}