<!DOCTYPE html>
<html>
<head>
	<title>Hasil Hitung SAW</title>
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

    <table align="center" style="border-collapse: collapse;">
        <tr>
            <th style="border: 1px solid #999; padding: 8px 15px;">Urutan</th>
            <th style="border: 1px solid #999; padding: 8px 15px;">Nama</th>
            <th style="border: 1px solid #999; padding: 8px 15px;">Prodi</th>
            <th style="border: 1px solid #999; padding: 8px 15px;">Nilai</th>
        </tr>

        @php($hasil = analisis($values, $period_id, $user_periods, $criterias_count))
        @php(arsort($hasil))
        @php($result = array_slice($hasil, 0, $batas))
        @foreach($result as $name => $value) 
        <tr>
            <td style="border: 1px solid #999; padding: 8px 15px;">{{ $loop->iteration }}</td>
            @php($prodi = explode(" - ",$name) )
            <td style="border: 1px solid #999; padding: 8px 15px;">{{ $prodi[0] }}</td>
            <td style="border: 1px solid #999; padding: 8px 15px;">{{$prodi[1]}}</td>
            <td style="border: 1px solid #999; padding: 8px 15px;">{{ $value }}</td>
        </tr>
        @endforeach

    </table>

</body>
</html>