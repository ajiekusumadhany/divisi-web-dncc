<?php
	//Koneksi Database
	$server = "localhost";
	$user = "root";
	$pass = "";
	$database = "dbdivisiweb";

	$koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));

	//jika tombol simpan diklik
	if(isset($_POST['bsimpan']))
	{
		//Pengujian Apakah data akan diedit atau disimpan baru
		if($_GET['hal'] == "edit")
		{
			//Data akan di edit
			$edit = mysqli_query($koneksi, "UPDATE tmhs set
											 	nama = '$_POST[tnama]',
												alamat = '$_POST[tras]',
											 	karakter = '$_POST[tkarakter]'
												hobi = '$_POST[Thobi]'
											 WHERE id_anggota = '$_GET[id]'
										   ");
			if($edit) //jika edit sukses
			{
				echo "<script>
						alert('Edit data suksess!');
						document.location='index.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Edit data GAGAL!!');
						document.location='index.php';
				     </script>";
			}
		}
		else
		{
			//Data akan disimpan Baru
			$simpan = mysqli_query($koneksi, "INSERT INTO jtfederation (nama, ras, karakter, hobi)
										  VALUES ('$_POST[tnama]', 
										  		 '$_POST[tras]', 
										  		 '$_POST[tkarakter]', 
										  		 '$_POST[thobi]')
										 ");
			if($simpan) //jika simpan sukses
			{
				echo "<script>
						alert('Simpan data suksess!');
						document.location='index.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Simpan data GAGAL!!');
						document.location='index.php';
				     </script>";
			}
		}


		
	}


	//Pengujian jika tombol Edit / Hapus di klik
	if(isset($_GET['hal']))
	{
		//Pengujian jika edit Data
		if($_GET['hal'] == "edit")
		{
			//Tampilkan Data yang akan diedit
			$tampil = mysqli_query($koneksi, "SELECT * FROM jtfederation WHERE id_anggota = '$_GET[id]' ");
			$data = mysqli_fetch_array($tampil);
			if($data)
			{
				//Jika data ditemukan, maka data ditampung ke dalam variabel
				$vnama = $data['nama'];
				$vras = $data['ras'];
				$vkarakter = $data['karakter'];
				$vhobi = $data['hobi'];
			}
		}
		else if ($_GET['hal'] == "hapus")
		{
			//Persiapan hapus data
			$hapus = mysqli_query($koneksi, "DELETE FROM jtfederation WHERE id_anggota = '$_GET[id]' ");
			if($hapus){
				echo "<script>
						alert('Hapus Data Suksess!!');
						document.location='index.php';
				     </script>";
			}
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
     <link rel="stylesheet" href="style.css" />
    <title>Gabung Jura Tempest</title>
</head>
<body>
    <div class="container">
    <h1 class="text-center mt-5">Jura Tempest Federation</h1>
    <!--Awal-->
    <div class="card mt-3">
    <div class="card-header bg-info text-white">
        Form Untuk Bergabung
    </div>
    <div class="card-body">
	    <form method="post" action="">
	    	<div class="form-group">
	    		<label>Nama Lengkap</label>
	    		<input type="text" name="tnama" value="<?=@$vnama?>" class="form-control" placeholder="Input nama anda disini!" required>
	    	</div>
			<div class="form-group">
	    		<label>Pilih Ras Anda!</label>
	    		<select class="form-control" name="tras">
	    			<option value="<?=@$vras?>"><?=@$vras?></option>
					<option></option>
					<option value="Demon">Demon</option>
					<option value="Dragon">Dragon</option>
					<option value="Dwarf">Dwarf</option>
					<option value="Elf">Elf</option>
					<option value="Goblin">Goblin</option>
					<option value="Demon">Demon</option>
					<option value="Human">Human</option>
					<option value="Orc">Orc</option>
	    		</select>
	    	</div>
	    	<div class="form-group">
	    		<label>Karakter Favorit</label>
	    		<input type="text" name="tkarakter" value="<?=@$vkarakter?>" class="form-control" placeholder="Siapa karakter favoritmu?" required>
	    	</div>
			<div class="form-group">
	    		<label>Hobi</label>
	    		<input type="text" name="thobi" value="<?=@$vhobi?>" class="form-control" placeholder="Apa hobi anda?" required>
	    	</div>
	    	<button type="submit" class="btn btn-info mt-5" name="bsimpan">Gabung</button>
	    	<button type="reset" class="btn btn-secondary mt-5" name="breset">Batal</button>

	    </form>
	  </div>
	</div>
	<!-- Akhir Card Form -->

	<!-- Awal Card Tabel -->
	<div class="card mt-3">
	  <div class="card-header bg-info text-white">
	    Daftar Anggota
	  </div>
	  <div class="card-body">
	    
	    <table class="table table-bordered table-striped">
	    	<tr>
	    		<th>No.</th>
	    		<th>Nama</th>
	    		<th>Ras</th>
	    		<th>Karakter Favorit</th>
	    		<th>Hobi</th>
	    		<th>Aksi</th>
	    	</tr>
	    	<?php
	    		$no = 1;
	    		$tampil = mysqli_query($koneksi, "SELECT * from jtfederation order by id_anggota desc");
	    		while($data = mysqli_fetch_array($tampil)) :

	    	?>
	    	<tr>
	    		<td><?=$no++;?></td>
	    		<td><?=$data['nama']?></td>
	    		<td><?=$data['ras']?></td>
	    		<td><?=$data['karakter']?></td>
	    		<td><?=$data['hobi']?></td>
	    		<td>
	    			<a href="index.php?hal=edit&id=<?=$data['id_anggota']?>" class="btn btn-primary"> Edit </a>
	    			<a href="index.php?hal=hapus&id=<?=$data['id_anggota']?>" 
	    			   onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-secondary"> Hapus </a>
	    		</td>
	    	</tr>
	    <?php endwhile; //penutup perulangan while ?>
	    </table>

	  </div>
	</div>
	<!-- Akhir Card Tabel -->

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>