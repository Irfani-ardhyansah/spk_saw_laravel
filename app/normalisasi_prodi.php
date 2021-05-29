<?php
function normalisasi_prodi($values, $value)
{            
    // Melakukan pengecekan karakter kriteria
    if($value->criteria->character == 'Cost')
    {
        // memanggil value terkecil dari value mahasiswa
        $minimum = (min($values->where('criteria_id', $value->criteria_id)->pluck('value')->toArray()));
        // melakukan perhitungan rumus
        $cost = $minimum / $value->value;
        // memotong angka dibelakang koma
        return(round($cost, 3));
    } else {
        // memanggil value terbesar dari value mahasiswa
        $maximum = (max($values->where('criteria_id', $value->criteria_id)->pluck('value')->toArray()));
        // melakukan perhitungan rumus
        $benefit = $value->value / $maximum;
        // memotong angka dibelakang koma
        return(round($benefit, 3));
    }
}