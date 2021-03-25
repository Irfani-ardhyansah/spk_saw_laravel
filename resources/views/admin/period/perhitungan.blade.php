<!DOCTYPE html>
<html>
<head>
	<title>Hasil Hitung SAW</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Hasil Hitung SAW</h4>
	</center>
 
    @php($hasil = array())
    @foreach($user_periods as $row)

        @foreach($row->user->mahasiswa->values as $value)

            @if($value->period_id == $period_id && $value->criteria->status == 1)
                @if($value->criteria->character == 'Cost')
                    @php($minimum = (min($values->where('criteria_id', $value->criteria_id)->pluck('value')->toArray())))
                    @php($cost = $minimum / $value->value)
                    @php($nilai = $cost * $value->criteria->weight)                                      
                    @php(array_push($hasil,$nilai))
            

                @elseif($value->criteria->character == 'Benefit')
                    @php($maximum = (max($values->where('criteria_id', $value->criteria_id)->pluck('value')->toArray())))
                    @php($benefit = $value->value / $maximum)
                    @php($nilai = $benefit * $value->criteria->weight)                     
                    @php(array_push($hasil,$nilai))

                @endif
            @endif

        @endforeach
    @endforeach

    <table class="table table-striped table-md">
        <tr>
            <th>Urutan</th>
            <th>Nama</th>
            <th>Nilai</th>
        </tr>
        @php($nama = array())
            @foreach($user_periods as $row)
                @php(array_push($nama,$row->user->mahasiswa->name))
            @endforeach

        @php($nilai = array())
        @php($result = array_chunk($hasil, $criterias_count))
            @foreach($result as $r)
                @php($hasil_pembobotan = array_sum($r))
                @php(array_push($nilai,$hasil_pembobotan))
            @endforeach

            @php($hasil = array_combine($nama,$nilai))
                @php(arsort($hasil))
                @foreach($hasil as $name => $value) 
                <tr id="tr{{ $no }}">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $name }}</td>
                    <td>{{ $value }}</td>
                </tr>
            @endforeach

    </table>

</body>

</html>