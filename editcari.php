<?php 
	include'koneksi.php';
	$nim=$_GET['nim'];

	$query="SELECT * FROM datamhs WHERE nim=$nim";
	$hasil=mysqli_query($koneksi,$query);
	$row=mysqli_fetch_array($hasil);
 ?>

<form method="POST">
	<table>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><input type="text" name="nama" length=25 value="<?php echo $row[0]; ?>"></td>
		</tr>
		<tr>
			<td>NIM</td>
			<td>:</td>
			<td><input type="number" name="nim" length=10 value="<?php echo $nim; ?>"></td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td>:</td>
			<td><input type="radio" name="jeniskelamin" value="Laki-Laki">Laki-Laki &nbsp; <input type="radio" name="jeniskelamin" value="Perempuan">Perempuan</td>
		</tr>
		<tr>
			<td>Program Studi</td>
			<td>:</td>
			<td><select name ="prodi">
				<option>-</option>
				<option value="Desain Interior"<?php if($row[3]=='Desain Interior'){echo 'selected';}?>>DESAIN INTERIOR</option>
				<option value="Akuntansi" <?php if($row[3]=='MBTI'){echo 'selected';} ?>>AKUNTANSI</option>
				<option value="Manajemen Informatika" <?php if($row[3]=='Manajemen Informatika'){echo 'selected';} ?>>MI</option>
				<option value="Teknik Komputer" <?php if($row[3]=='Teknik Komputer'){echo 'selected';} ?>>TEKNIK KOMPUTER</option>
				</select></td>
		</tr>
		<tr>
			<td>Fakultas</td>
			<td>:</td>
			<td><select name="fakultas">
				<option>-</option>
				<option value="Fakultas Ilmu Terapan" <?php if($row[4]=='Fakultas Ilmu Terapan'){echo 'selected';} ?>>Fakultas Ilmu Terapan</option>
				<option value="Fakultas Ekonomi Bisnis" <?php if($row[4]=='Fakultas Ekonomi Bisnis'){echo'selected';} ?>>Fakultas Ekonomi Bisnis</option>
				<option value="Fakultas Komunikasi Bisnis" <?php if($row[4]=='Fakultas Komunikasi Bisnis'){echo 'selected';} ?>>Fakultas Komunikasi Bisnis</option>
				<option value="Fakultas Industri Kreatif" <?php if($row[4]=='Fakultas Industri Kreatif'){echo 'selected';} ?>>Fakultas Industri Kreatif</option>
				</select></td>
		</tr>
		<tr>
			<td>Asal</td>
			<td>:</td>
			<td><input type="text" name="asal" length=25 value="<?php echo $row[5];?>"></td>
		</tr>
		<tr>
			<td>Moto</td>
			<td>:</td>
			<td><textarea cols=25 rows=8 name="moto"><?php echo $row[6]; ?></textarea></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td><input type="submit" name="update" value="Update"></td>
		</tr>
	</table>
</form>

<?php 
		if(isset($_POST['update'])){
			include'koneksi.php';

			$nama=$_POST['nama'];
			$nimm=$_POST['nim'];
			$jeniskelamin=$_POST['jeniskelamin'];
			$prodi=$_POST['prodi'];
			$fakultas=$_POST['fakultas'];
			$asal=$_POST['asal'];
			$moto=$_POST['moto'];

			$query="UPDATE datamhs SET nama = '$nama',nim='$nimm',jenis_kelamin='$jeniskelamin',prodi='$prodi',fakultas='$fakultas',asal='$asal',moto='$moto' WHERE nim='$nim'";

			$hasil=mysqli_query($koneksi,$query);

			if($hasil){
				echo "Data Berhasil Update"."<br>";
				header("location: menuawal.php");
			}else{
				echo "Update Gagal Gagal";
			}
		}
 ?>