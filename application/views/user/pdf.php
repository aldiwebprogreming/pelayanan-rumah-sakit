<!DOCTYPE html>
<html><head>
	<title></title>
</head><body>
	<center>
		<h5>APLIKASI PELAYANA RUMAH SAKIT MAHKOTA BIDADARI <br>SURAT DAFTAR ANTRIAN </h5>
		<h5> </h5>
		<hr>

		<H4>KODE ANTRIAN : <?= $antri['kode_antrian'] ?> <br>
			NOMOR ANTRIAN : <?= $antri['no_antrian'] ?></H4>
			<H4> </H4>
		</center>

		<table border="1" style=" border-collapse: collapse;">
			<tr style="text-align: center; font-weight: bold;">
				<td width="100">Kode Antrian</td>
				<td  width="100">Nama Pasien</td>
				<td  width="100">Poli </td>
				<td  width="100">Tanggal</td>
				<td width="100">No Antrian</td>
			</tr>

			<tr style="text-align:center;">
				<td><?= $antri['kode_antrian'] ?></td>
				<td><?= $antri['nama_pasien'] ?></td>
				<td><?= $antri['poli'] ?></td>
				<td><?= $antri['tgl_antrian'] ?></td>
				<td><?= $antri['no_antrian'] ?></td>
			</tr>

		</table>
		<br>
		<br>
		
		<p style=>Surat ini adalah bukti bahwasanya anda telah melukan antrian di sistem kami</p>
		<br>
		<br>
		<h4 style="text-align: center;">Terimakasih sudah melakukan antrian</h4>

	</body></html>