<?php
session_start();

if( !isset($_SESSION["username"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
	
	// cek apakah data berhasil di tambahkan atau tidak
	if( tambah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = '../profile/index.php';
			</script>
		";
	}


}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah data mahasiswa</title>
</head>
<body>
	<h1>Tambah data mahasiswa</h1>
	

	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li>
				<label for="title">title : </label>
				<input type="text" name="title" id="title" required>
			</li>
			<li>
				<label for="emoji">emoji : </label>
				<input type="text" name="emoji" id="emoji">
			</li>
			<li>
				<label for="link">link :</label>
				<input type="text" name="link" id="link">
			</li>
			<li>
				<button type="submit" name="submit">Tambah Data!</button>
			</li>
		</ul>

	</form>




</body>
</html>