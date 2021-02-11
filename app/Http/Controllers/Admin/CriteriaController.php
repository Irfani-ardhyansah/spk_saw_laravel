<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Criteria;
use App\Weight;
use Auth;

class CriteriaController extends Controller
{
    public function index()
    {
        $criterias = Criteria::all();
        // foreach(Auth::user()->criterias as $criteria) {
        //     $criteria_id = $criteria->id;
        // }
        // $criteria_weights = Criteria::with('weights')->orderBy('value', 'DESC')->get();
        // dd($criteria_weights);
        // $weights = Weight::where('criteria_id', $criteria_id)->orderBy('value', 'DESC')->get();
        return view('admin.criteria.index', compact('criterias'));
    }

    public function save(Request $request) 
    {

        try {
            $this->validate($request, [
                'code'          => 'required|unique:criterias',
                'name'          => 'required|max:40',
                'weight'        => 'required|between:0.0,5',
                'character'     => 'required',
                'information'   => 'required'
            ]);    

            $criteria = Criteria::create([
                'admin_id'      =>  Auth::user()->id,
                'code'          =>  $request->code,
                'name'          =>  $request->name,
                'weight'        =>  $request->weight,
                'character'     =>  $request->character,
                'information'   =>  $request->information
            ]);

            return redirect()->back()->with(['success' => 'Berhasil Menambah Data ' . $criteria->name]);
        } catch(\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function delete($id)
    {
        try {
            $criteria = Criteria::findOrFail($id);
            $criteria -> delete();
            return redirect()->back()->with(['success' => 'Data ' . $criteria->name . ' Berhasil Dihapus!' ]);
        } catch(\Exception $e) {
            return redirect()->back()->with(['error' => 'Gagal Menghapus Data!']);
        }
    }

    public function update(Request $request, $id)
    {
        if($request->isMethod('post')) {
            $data = $request->all();
            Criteria::where(['id'=>$id])->update(['code'=>$data['code'], 'name'=>$data['name'], 'weight'=>$data['weight'], 'character'=>$data['character'], 'information'=>$data['information']]);
            return redirect()->back()->with(['success' => 'Update ' . $request->name . ' Berhasil!']);
        }
    }
}
