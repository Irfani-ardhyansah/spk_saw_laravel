<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Period;
use App\Criteria;
use App\Weight;
use App\Value;
use App\User_period;
use Auth;

class PeriodController extends Controller
{
    public function index()
    {
        $periods = Period::where('status', 1)->get();
        return view('user.period.index', compact('periods'));
    }

    public function create($id)
    {
        $criterias = Criteria::all();
        $weight = Weight::first();
        $period_id =  $id;
        return view('user.period.daftar', compact('criterias', 'weight', 'period_id'));
    }

    public function save(Request $request, $id)
    {
        try {
            // $this->validate($request, [
            //     'file'     => 'mimes:pdf|max:20000'
            // ], [
            //     'file.mimes'    =>  'File Harus Berjenis JPEG atau PDF'
            // ]);

            $data = $request->all();

            foreach ($data['criteria_id'] as $item => $value) {
                $data2 = array(
                    'period_id' => $id,
                    'criteria_id' => $data['criteria_id'][$item],
                    'mahasiswa_id'  =>  Auth::user()->mahasiswa->id,
                    'value'  => $data['value'][$item],
                    'file' => $data['file'][$item],
                );
                Value::create($data2);
            }
    
            User_period::create([
                'user_id'   =>  Auth::user()->id,
                'period_id' =>  $id,
                'status'    =>  0,
            ]);
            return redirect()->route('user.period')->with(['success' => 'Berhasil Mendaftar Beasiswa!']);
        } catch(\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
