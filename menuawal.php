<body bgcolor ='lightskyblue'>
<center><h2>Data-Data Mahasiswa</h2><br><br>
<form method="POST">Cari : &nbsp;<input type="text" name="cari" length=10>&nbsp;<input type="submit" name="nyari" value="Cari">&nbsp;<a href="menuawal.php"><input type="button" name="menu" value="Menu Awal"></a>&nbsp;
<a href="registrasimhs.php"><input type="button" name="regis" value="Registrasi"></a></form>
<br>
<table border="1">
	<tr>
		<th>Nama</th>
		<th>NIM</th>
		<th>Jenis Kelamin</th>
		<th>Prodi</th>
		<th>Fakultas</th>
		<th>Asal</th>
		<th>Moto Hidup</th>
		<th>Aksi</th>
	</tr>

<?php 
		if(isset($_POST['nyari'])){
			
			include 'koneksi.php';
			$nim=$_POST['cari'];
			$query="SELECT nama,nim FROM datamhs WHERE nim =$nim";
			$hasil=mysqli_query($koneksi,$query);	
			foreach($hasil as $row){
		
			echo"<tr>
				<td>".$row['nama']."</td>
				<td>".$row['nim']."</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td><a href='editcari.php?nim=$row[nim]'>Edit | <a href='deletecari.php?nim=$row[nim]'>Delete</td>
			</tr>";
						
		}
		}else{
		
			echo"<center>";
		include'koneksi.php';
		$query="SELECT * FROM datamhs ";
		$hasil=mysqli_query($koneksi,$query);
		foreach($hasil as $row){
		
		echo"<tr>
				<td>".$row['nama']."</td>
				<td>".$row['nim']."</td>
				<td>".$row['jenis_kelamin']."</td>
				<td>".$row['prodi']."</td>
				<td>".$row['fakultas']."</td>
				<td>".$row['asal']."</td>
				<td>".$row['moto']."</td>
				<td><a href='editmhs.php?nim=$row[nim]'>Edit | <a href='deletemhs.php?nim=$row[nim]'>Delete</td>
			</tr>";
					
		} 
		echo "</center>";
		}  
?>
</body>
</table>
</center>