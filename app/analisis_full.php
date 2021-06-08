<?php
function analisis_full($prod, $values, $mahasiswas, $criterias_count)
{            
    $hasil = array();
    foreach($mahasiswas->where('prodi_id', $prod->id) as $row) {
        foreach($row->values as $value) {
            if($value->criteria->status == 1)
            {
                if($value->criteria->character == 'Cost')
                {
                    // $minimum = (min($values->where('criteria_id', $value->criteria_id)->pluck('value')->toArray()));
                    $minimum = (min($values->where('criteria_id', $value->criteria_id)->whereIn('mahasiswa_id', $mahasiswas->where('prodi_id', $prod->id)->pluck('id'))->pluck('value')->toArray()));
                    $cost = $minimum / $value->value;
                    $nilai = round($cost, 3) * $value->criteria->weight;
                    array_push($hasil,round($nilai, 3));
                } else {
                    $maximum = (max($values->where('criteria_id', $value->criteria_id)->whereIn('mahasiswa_id', $mahasiswas->where('prodi_id', $prod->id)->pluck('id'))->pluck('value')->toArray()));
                    $benefit = $value->value / $maximum;
                    $nilai = round($benefit, 3) * $value->criteria->weight;   
                    array_push($hasil,round($nilai, 3));
                }
            }
        }
    }

    $nama = array();
    $np = array();
    foreach($mahasiswas->where('prodi_id', $prod->id) as $row){
    // dd($mahasiswas->where('prodi_id', '1'));
        array_push($nama, $row->user->npm);
        array_push($nama, $row->name);
        array_push($nama, $row->prodi->name);
        $coba = array_chunk($nama, 3);
        foreach($coba as $cob){
            $co = implode(" - ",$cob);  
        }
        array_push($np,$co);
    }

    $nilai = array();
    $result = array_chunk($hasil, $criterias_count);
    foreach($result as $r) {
        $hasil_pembobotan = array_sum($r);
        array_push($nilai,$hasil_pembobotan);
    }
    // dd($nilai);
    $hasil = array_combine($np,$nilai);

    return $hasil;
}
