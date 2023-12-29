<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\move;

class DosenController extends Controller

{
    public function createDosen(){
        return view('dosen/createDosen');
    }
    
    public function updateDosen($id_dosen){
        if($data=Dosen::find($id_dosen)) {
            return view('dosen/updateDosen', ['data'=>$data]);
        } else return redirect('/readDosen');
    }
    
    public function editDosen(Request $request){
        
        if($data=Dosen::find($request->id_dosen)) {
            $validateData = $request ->validate([
                'dosen_pengampu'=> 'required|string|max:40',
                'alamat'=> 'required|min:3',
                'email'=> 'required|email',
                ]);

            $data->nama_dosen=@$request->dosen_pengampu;
            if ($request->hasFile('foto')) {
                $foto=$request->file('foto');
                $fotodosen=$foto->getClientOriginalName();
                $foto->move(public_path('/fotodosen'),$fotodosen );
                $data->foto_dosen = $fotodosen;
            }
            $data->jenis_kelamin=@$request->jenis_kelamin;
            $data->email_dosen=@$request->email;
            $data->alamat_dosen=@$request->alamat;
            $data->updated_at=date("Y-m-d H:i:s");
            $data->save();
            return redirect('dosen/readDosen')->with('pesan', 'data dengan ID : '.$request->id_dosen. ' berhasil diupdate');
        } else {
            return redirect('dosen/readDosen')->with ('pesan', 'data tidak ditemukan/gagal diupdate');
        }
    }

    public function saveDosen(Request $request)
    {
        $validateData = $request ->validate([
            'id_dosen' => 'required|regex:/^DSN\d{3}$/|unique:dosen,id_dosen|max:15',
            'dosen_pengampu'=> 'required|string|max:40',
            'foto'=> 'required',
            'alamat'=> 'required|min:3',
            'email'=> 'required|email',
            ]);

        $model = new Dosen();
        if ($request->hasFile('foto')) {
            $foto=$request->file('foto');
            $fotodosen=$foto->getClientOriginalName();
            $foto->move(public_path('/fotodosen'),$fotodosen );
            $model->foto = $fotodosen;
        }
        $modelData =[
            'id_dosen'=>@$request->id_dosen,
            'nama_dosen'=>@$request->dosen_pengampu,
            'foto_dosen'=>@$model->foto,
            'jenis_kelamin'=>@$request->jenis_kelamin,
            'alamat_dosen'=>@$request->alamat,
            'email_dosen'=>@$request->email,
            'created_at'=>date("Y-m-d H:i:s")];

        $model::insert($modelData);

        return view('dosen/viewDosen',['data'=>$modelData]);
    }
    
    public function readDosen(){
        $model = new Dosen();
        $dataAll=$model->all();
        return view('dosen/readDosen',['dataAll'=>$dataAll]);
    }


    public function deleteDosen($id_dosen){
        if($data = Dosen::find($id_dosen))
        {
            $data->delete();
        } else{
            return redirect('dosen/readDosen')->with('pesan','Data ID : '.@$id_dosen.' tidak ditemukan');
        }
        
        return redirect('dosen/readDosen')->with('pesan','Data ID : '.@$id_dosen.' Berhasil dihapus');
    }
    
    public function logout()
    {
        return view('logout');
    }
}