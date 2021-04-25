<?php
function normalisasi_prodi($values, $value)
{            
    if($value->criteria->status == 1)
    {
        if($value->criteria->character == 'Cost')
        {
            $minimum = (min($values->where('criteria_id', $value->criteria_id)->pluck('value')->toArray()));
            $cost = $minimum / $value->value;
            return(round($cost, 3));
        } else {
            $maximum = (max($values->where('criteria_id', $value->criteria_id)->pluck('value')->toArray()));
            $benefit = $value->value / $maximum;
            return(round($benefit, 3));
        }
    }
}