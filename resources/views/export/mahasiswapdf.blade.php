<table class="table">
	<thead>
		<tr>
			<th>NAMA LENGKAP</th>
			<th>JENIS KELAMIN</th>
			<th>AGAMA</th>
			<th>ALAMAT</th>
			<th>NILAI</th>
		</tr>
	</thead>
	<tbody>
		@foreach($mahasiswa as $m)
		<tr>
			<td>{{$m->nama_lengkap()}}</td>
			<td>{{$m->jenis_kelamin}}</td>
			<td>{{$m->agama}}</td>
			<td>{{$m->alamat}}</td>
			<td>{{$m->rataRataNilai()}}</td>			
		</tr>
		@endforeach
	</tbody>
</table>