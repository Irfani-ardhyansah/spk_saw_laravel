<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
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
		<h5>Membuat Laporan PDF Dengan DOMPDF Laravel</h4>
		<h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/">www.malasngoding.com</a></h5>
	</center>
 
    <table class="table table-striped table-md">
        <tr>
            <th>#</th>
            <th>NPM</th>
            <th>Nama</th>
            <th>No HP</th>
            <th>Semester</th>
            <th>Prodi</th>
        </tr>
        @foreach($mahasiswas as $row)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$row->user->npm}}</td>
            <td>{{$row->name}}</td>
            <td>{{$row->phone}}</td>
            <td>{{$row->semester}}</td>
            <td>{{$row->prodi}}</td>
        </tr>
        @endforeach
    </table>
 
</body>
</html>