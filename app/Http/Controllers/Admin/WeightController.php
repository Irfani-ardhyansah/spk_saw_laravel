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
        $this->validate($request, [
            'criteria_id'   => 'required|exists:criterias,id',
            'information'   => 'required',
            'value'         => 'required'
        ]);

        try {
            $weight = Weight::create([
                'criteria_id'   =>  $request->criteria_id,
                'information'   =>  $request->information,
                'value'         =>  $request->value
            ]);
            return redirect()->back()->with(['success' => 'Berhasil Menambah Data ' . $weight->information]);
        } catch(\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id) 
    {
        if($request->isMethod('post')) {
            $data = $request->all();
            Weight::where(['id'=>$id])->update(['information'=>$data['information'], 'value'=>$data['value']]);
            return redirect()->back()->with(['success' => 'Update ' . $request->information . ' Berhasil!']);
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
