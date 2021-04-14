<?php
function normalisasi($values, $value, $period_id)
{            
    if($value->period_id == $period_id && $value->criteria->status == 1)
    {
        if($value->criteria->character == 'Cost')
        {
            $minimum = (min($values->where('criteria_id', $value->criteria_id)->pluck('value')->toArray()));
            $cost = $minimum / $value->value;
            return($cost);
        } else {
            $maximum = (max($values->where('criteria_id', $value->criteria_id)->pluck('value')->toArray()));
            $benefit = $value->value / $maximum;
            return($benefit);
        }
    }
}