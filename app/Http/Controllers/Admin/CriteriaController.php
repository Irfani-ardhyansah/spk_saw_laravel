<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Criteria;
use App\Weight;
use Auth;
use DB;

class CriteriaController extends Controller
{
    public function index()
    {
        $criterias = Criteria::all();
        return view('admin.criteria.index', compact('criterias'));
    }

    public function save(Request $request) 
    {
        $limit = DB::table('criterias')->select('weight')->sum('weight');
        try {
            //Jika ada inputan dari weight
            if($request->weight && $request->weight + $limit <= '1.0') {
                //memvalidasi inputan
                $this->validate($request, [
                    'code'          => 'required|alpha_num|unique:criterias',
                    'name'          => 'required|max:40',
                    'weight'        => 'required|numeric|between: 0.0 , 0.5',
                    'character'     => 'required',
                    'information'   => 'required'
                ], [
                    'code.alpha_num'=>  'Kode Harus Berupa Karakter dan Angka',
                    'code.required' =>  'Kode Harus Diisi!',
                    'code.unique'   =>  'Kode Harus Unik!',
                    'name.required' =>  'Nama Harus Diisi!',
                    'name.alpha'    =>  'Nama Harus Berupa Karakter',
                    'weight.required' =>  'Bobot Harus Diisi!',
                    'character.alpha'   =>  'Karakter Harus Berupa Karakter',
                    'name.max'          =>  'Nama Maksimal 40 Huruf!',
                    'weight.between'    =>  'Bobot Harus  0 <= 0.5',
                    'information.alpha' =>  'Keterangan Harus Berupa Karakter',
                    'information.required'  => 'Keterangan Harus Diisi!',
                ]);    
                //jika tervalidasi maka menyimpan ke dalam database
                $criteria = Criteria::create([
                    'admin_id'      =>  Auth::user()->id,
                    'code'          =>  $request->code,
                    'name'          =>  $request->name,
                    'weight'        =>  $request->weight,
                    'character'     =>  $request->character,
                    'information'   =>  $request->information,
                    'status'        =>  1
                ]);
            //jika tidak ada inputan weight maka
            } elseif(empty($request->weight)) {
                $this->validate($request, [
                    'code'          => 'required|alpha_num|unique:criterias',
                    'name'          => 'required|max:40',
                    'character'     => 'required',
                    'information'   => 'required'
                ], [
                    'code.alpha_num'=>  'Kode Harus Berupa Karakter dan Angka',
                    'code.required' =>  'Kode Harus Diisi!',
                    'code.unique'   =>  'Kode Harus Unik!',
                    'name.required' =>  'Nama Harus Diisi!',
                    'name.regex'    =>  'Nama Harus Berupa Karakter',
                    'name.max'          =>  'Nama Maksimal 40 Huruf!',
                    'character.regex'   =>  'Karakter Harus Berupa Karakter',
                    'information.regex' =>  'Keterangan Harus Berupa Karakter',
                    'information.required'  => 'Keterangan Harus Diisi!',
                ]);    

                $criteria = Criteria::create([
                    'admin_id'      =>  Auth::user()->id,
                    'code'          =>  $request->code,
                    'name'          =>  $request->name,
                    'weight'        =>  $request->weight,
                    'character'     =>  $request->character,
                    'information'   =>  $request->information,
                    'status'        =>  0
                ]);
            } else {
                return redirect()->back()->with(['error' => 'Weight total sudah 1.0!']);
            }

            return redirect()->back()->with(['success' => 'Berhasil Menambah Data ' . $criteria->name]);
        } catch(\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function delete($id)
    {
        try {
            //Mengambil data berdasarkan id lalu menghapusnya
            $criteria = Criteria::findOrFail($id);
            $criteria -> delete();
            return redirect()->back()->with(['success' => 'Data ' . $criteria->name . ' Berhasil Dihapus!' ]);
        } catch(\Exception $e) {
            return redirect()->back()->with(['error' => 'Gagal Menghapus Data!']);
        }
    }

    public function update(Request $request, $id)
    {
        //jika methode yang dipilih post
        $limit = DB::table('criterias')->select('weight')->sum('weight');
        $weight = DB::table('criterias')->where('id', $id)->select('weight')->sum('weight');
        $criteria_status = Criteria::where('id', $id)->pluck('status')->first();

        if($request->isMethod('post')) {
            $this->validate($request, [
                'code'          => 'required|unique:criterias,code,'.$id,
            ], [
                'code.unique'   =>  'Kode Harus Unik!',
            ]);  
            //melakukan update berdasarkan id data yang dipilih
            $data = $request->all();
            if($criteria_status != 0) {
                if(($limit - $weight) + $data['weight'] <= '1') { 
                    Criteria::where(['id'=>$id])->update(['code'=>$data['code'], 'name'=>$data['name'], 'weight'=>$data['weight'], 'character'=>$data['character'], 'information'=>$data['information']]);
                    return redirect()->back()->with(['success' => 'Update ' . $request->name . ' Berhasil!']);
                } else {
                    return redirect()->back()->with(['error' => 'Weight total sudah Melebihi Batas 1.0']);
                }
            } else {
                Criteria::where(['id'=>$id])->update(['code'=>$data['code'], 'name'=>$data['name'], 'information'=>$data['information']]);
                return redirect()->back()->with(['success' => 'Update ' . $request->name . ' Berhasil!']);
            }
        }
    }
}
