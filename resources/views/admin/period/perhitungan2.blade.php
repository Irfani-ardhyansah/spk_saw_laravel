<!DOCTYPE html>
<html>
<head>
	<title>Pengumuman PPA {{date('Y', strtotime($period->start))}}.pdf</title>
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
            <th style="border: 1px solid #999; padding: 8px 15px;">No</th>
            <th style="border: 1px solid #999; padding: 8px 15px;">NPM</th>
            <th style="border: 1px solid #999; padding: 8px 15px;">Nama Mahasiswa</th>
            <th style="border: 1px solid #999; padding: 8px 15px;">Prodi</th>
            <th style="border: 1px solid #999; padding: 8px 15px;">Nilai</th>
        </tr>

        @php($no = 0)
        @foreach($prodi as $prod)
            @php($hasil = analisis_full($prod, $values, $mahasiswas, $criterias_count))
            @php(arsort($hasil))
            @php($result = array_slice($hasil, 0, session()->get('kuota_'.$prod->name)))
            @foreach($result as $name => $value) 
            <tr>
                <td style="border: 1px solid #999; padding: 8px 15px;">{{ $no += 1 }}.</td>
                @php($prodi = explode(" - ",$name) )
                <td style="border: 1px solid #999; padding: 8px 15px;">{{ $prodi[0] }}</td>
                <td style="border: 1px solid #999; padding: 8px 15px;">{{$prodi[1]}}</td>
                <td style="border: 1px solid #999; padding: 8px 15px;">{{$prodi[2]}}</td>
                <td style="border: 1px solid #999; padding: 8px 15px;">{{ $value }}</td>
            </tr>
            @endforeach
        @endforeach

    </table>

</body>
</html>