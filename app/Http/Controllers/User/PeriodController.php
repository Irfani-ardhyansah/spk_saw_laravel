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
        $user_periods = User_period::where('user_id', Auth()->user()->id)->get();
        foreach($user_periods as $row) {
            $period_id = $row->id;
        }
        // dd($period_id);
        return view('user.period.index', compact('periods', 'period_id'));
    }

    public function create($id)
    {
        $criterias = Criteria::all();
        $weight = Weight::first();
        return view('user.period.daftar', compact('criterias', 'weight'));
    }

    public function save(Request $request, $id)
    {
        try {
            // $this->validate($request, [
            //     'value'     => 'required',
            //     'file'     => 'mimes:jpeg,pdf|max:20000'
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
