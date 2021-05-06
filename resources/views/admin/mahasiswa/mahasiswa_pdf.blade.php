<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Mahasiswa Tahun {{ $now->year }}</title>
</head>

<table align="center">
    <tr>
        <td><img src="{{ public_path('assets/img/logo.jpg') }}" width="80" height="80"></td>
        <td><center>
            <font size="3"> KEMENTERIAN RISET, TEKNOLOGI, DAN PENDIDIKAN TINGGI</font><br>
            <font size="4"> <b>POLITEKNIK NEGERI MADIUN</b></font><br>
            <font size="3"> Jalan Serayu Nomor 84 Madiun KodePos 63133 </font><br>
            <font size="3"> Telepon +62 351 452970 Faksimile +62 351 452960 </font><br>
            <font size="3"> www.pnm.ac.id </font><br>
        </center></td>
    </tr>
    <tr>
        <td colspan="2"><hr style="border: 1px solid;"></td>
    </tr>
</table>

<body>
    <table align="center" style="border-collapse: collapse;">
        <tr>
            <th style="border: 1px solid #999; padding: 8px 15px;">#</th>
            <th style="border: 1px solid #999; padding: 8px 15px;">NPM</th>
            <th style="border: 1px solid #999; padding: 8px 15px;">Nama</th>
            <th style="border: 1px solid #999; padding: 8px 15px;">No HP</th>
            <th style="border: 1px solid #999; padding: 8px 15px;">Semester</th>
            <th style="border: 1px solid #999; padding: 8px 15px;">Prodi</th>
        </tr>
        @foreach($mahasiswas as $row)
        <tr>
            <td style="border: 1px solid #999; padding: 8px 15px;">{{$loop->iteration}}</td>
            <td style="border: 1px solid #999; padding: 8px 15px;">{{$row->user->npm}}</td>
            <td style="border: 1px solid #999; padding: 8px 15px;">{{$row->name}}</td>
            <td style="border: 1px solid #999; padding: 8px 15px;"> {{$row->phone}}</td>
            <td style="border: 1px solid #999; padding: 8px 15px;">{{$row->semester}}</td>
            <td style="border: 1px solid #999; padding: 8px 15px;">{{$row->prodi->name}}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>