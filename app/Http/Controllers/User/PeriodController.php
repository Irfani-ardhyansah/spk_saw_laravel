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

    public function register($id)
    {
        $criterias = Criteria::orderBy('code', 'ASC')->get();
        $weight = Weight::first();
        $period_id =  $id;
        $period = Period::where('id', $id)->first();
        return view('user.period.daftar', compact('criterias', 'weight', 'period_id', 'period'));
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

                $criteria = Criteria::findOrFail($data['criteria_id'][$item]);
                $period = Period::findOrFail($id);
                
                $extension =  $data['file'][$item]->extension(); //mengambil ekstensi oroginal dari inputan
                $nama_file = Auth::user()->npm. '_' .$criteria->name.  '.'. $extension; //merename file\
                // $request->file('file')->move('periode/' . $request->start . '_' . $request->end . '/' . Auth::user()->npm . '/', $nama_file);
                
                $data['file'][$item]->move('periode/' . $period->start . '_' . $period->end . '/' . Auth::user()->npm . '/', $nama_file);
                // $file->store('periode/' . $request->start . '_' . $request->end . '/' . Auth::user()->npm . '/', $nama_file);
                $file_upload = $nama_file; //memasukkan dalam variable

                $data2 = array(
                    'period_id' => $id,
                    'criteria_id' => $data['criteria_id'][$item],
                    'mahasiswa_id'  =>  Auth::user()->mahasiswa->id,
                    'value'  => $data['value'][$item],
                    'file' => $file_upload,
                );
                Value::create($data2);
            }
    
            User_period::create([
                'user_id'   =>  Auth::user()->id,
                'period_id' =>  $id,
            ]);
            return redirect()->route('user.period')->with(['success' => 'Berhasil Mendaftar Beasiswa!']);
        } catch(\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
