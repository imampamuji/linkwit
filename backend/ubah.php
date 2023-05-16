<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';

// ambil data di URL
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$data_link = query("SELECT * FROM data_link WHERE id = $id")[0];


// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
	
	// cek apakah data berhasil diubah atau tidak
	if( ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'dashboard.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal diubah!');
				document.location.href = 'dashboard.php';
			</script>
		";
	}


}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ubah data link</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css">
<body>

	<h1 class="text-2xl font-bold text-center mb-8 mt-5">Ubah data block link</h1>

	<form action="" method="post" enctype="multipart/form-data" class="w-full max-w-lg mx-auto">
		<input type="hidden" name="id" value="<?= $data_link["id"]; ?>">
		<!-- <input type="hidden" name="gambarLama" value="<?= $data_link["gambar"]; ?>"> -->
		<ul class="mt-8">
			<li class="mb-4">
				<label for="block_title" class="block text-gray-700 font-bold mb-2">Judul : </label>
				<input type="text" name="block_title" id="block_title" required value="<?= $data_link["block_title"]; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
			</li>
			<li class="mb-4">
				<label for="block_emoji" class="block text-gray-700 font-bold mb-2">Emoji : </label>
				<input type="text" name="block_emoji" id="block_emoji" value="<?= $data_link["block_emoji"]; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
			</li>
			<li class="mb-4">
				<label for="block_link" class="block text-gray-700 font-bold mb-2">Link :</label>
				<input type="text" name="block_link" id="block_link" value="<?= $data_link["block_link"]; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
			</li>
			<!-- <li class="mb-4">
				<label for="gambar" class="block text-gray-700 font-bold mb-2">Gambar :</label> <br>
				<img src="img/<?= $data_link['gambar']; ?>" width="40"> <br>
				<input type="file" name="gambar" id="gambar" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
			</li> -->
			<li>
				<button type="submit" name="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
					Ubah Data!
				</button>
			</li>
		</ul>

	</form>


</body>
</html>