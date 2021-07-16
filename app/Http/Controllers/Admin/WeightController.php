<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Weight;
use Auth;

class WeightController extends Controller
{
    public function save(Request $request) 
    {
        try {
            //melakukan validasi data
            $this->validate($request, [ 
                'criteria_id'   => 'required|exists:criterias,id',
                'information'   => 'required',
                'value'         => 'required|numeric|between:0,1'
            ],[
                'information.required'  =>  'Keterangan harus Diisi!',
                'value.required'        =>  'Nilai Harus Diisi!',
                'value.between'         =>  'Nilain Harus Bernilai 0 =< 1'
            ]);
            //menyimpan data
            $weight = Weight::create([
                'criteria_id'   =>  $request->criteria_id,
                'information'   =>  $request->information,
                'value'         =>  $request->value
            ]);
            return redirect()->back()->with(['success' => 'Berhasil Menambah Nilai Kriteria ' . $weight->information]);
        } catch(\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id) 
    {
        if($request->isMethod('post')) { //jika method post
            try {
                $this->validate($request, [
                    'information'          => 'required',
                    'value'          => 'required',
                ], [
                    'information.unique'   =>  'Keterangan Tidak Boleh Sama!',
                    'value.unique'   =>  'Nilai Tidak Boleh Sama!',
                ]);  
                $data = $request->all(); //menyimpan semua inputan dari view
                Weight::where(['id'=>$id])->update(['information'=>$data['information'], 'value'=>$data['value']]); //melakukan update pada databse
                return redirect()->back()->with(['success' => 'Update ' . $request->information . ' Berhasil!']);
            } catch(\Exception $e) {
                return redirect()->back()->with(['error' => $e->getMessage()]);
            }
        }
    }

    public function delete($id)
    {
        try {
            $weight = Weight::findOrFail($id);
            $weight -> delete();
            return redirect()->back()->with(['success' => 'Data ' . $weight->information . ' Berhasil Dihapus!']);
        } catch(\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
