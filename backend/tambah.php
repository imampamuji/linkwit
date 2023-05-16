<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
	var_dump($_POST);

	// cek apakah data berhasil di tambahkan atau tidak
	if( tambahNonGambar($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'dashboard.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'dashboard.php';
			</script>
		";
	}


}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Tambah data link</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css">

</head>

<body>

<div class="text-center text-2xl font-bold mb-8 mt-5">Tambah Data</div>

	<div>

	<form action="" method="post" enctype="multipart/form-data" class="w-full max-w-lg mx-auto">

    <ul class="mt-8">
        <li class="mb-4">
            <label for="block_title" class="block text-gray-700 font-bold mb-2">Judul : </label>
            <input type="text" name="block_title" id="block_title" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </li>
        <li class="mb-4">
            <label for="block_emoji" class="block text-gray-700 font-bold mb-2">Emoji : </label>
            <input type="text" name="block_emoji" id="block_emoji" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </li>
        <li class="mb-4">
            <label for="block_link" class="block text-gray-700 font-bold mb-2">Link :</label>
            <input type="text" name="block_link" id="block_link" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </li>
        <!-- <li class="mb-4">
            <label for="gambar" class="block text-gray-700 font-bold mb-2">Gambar :</label> <br>
            <img src="img/<?= $data_link['gambar']; ?>" width="40"> <br>
            <input type="file" name="gambar" id="gambar" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </li> -->
        <li>
            <button type="submit" name="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Tambah Data!
            </button>
        </li>
    </ul>
</form> 

<!-- 
	<form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 max-w-md " action="" method="post"
		enctype="multipart/form-data">
		<div class="mb-4">
			<label class="block text-gray-700 font-bold mb-2" for="nrp">
				NRP :
			</label>
			<input
				class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
				id="nrp" type="text" name="nrp" required>
		</div>
		<div class="mb-4">
			<label class="block text-gray-700 font-bold mb-2" for="nama">
				Nama :
			</label>
			<input
				class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
				id="nama" type="text" name="nama">
		</div>
		<div class="mb-4">
			<label class="block text-gray-700 font-bold mb-2" for="email">
				Email :
			</label>
			<input
				class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
				id="email" type="text" name="email">
		</div>
		<div class="mb-4">
			<label class="block text-gray-700 font-bold mb-2" for="jurusan">
				Jurusan :
			</label>
			<input
				class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
				id="jurusan" type="text" name="jurusan">
		</div>
		<div class="mb-4">
			<label class="block text-gray-700 font-bold mb-2" for="gambar">
				Gambar :
			</label>
			<input
				class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
				id="gambar" type="file" name="gambar">
		</div>
		<div class="flex items-center justify-between">
			<button
				class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
				type="submit" name="submit">
				Tambah Data!
			</button>
		</div>
	</form>

	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li>
				<label for="nrp">NRP : </label>
				<input type="text" name="nrp" id="nrp" required>
			</li>
			<li>
				<label for="nama">Nama : </label>
				<input type="text" name="nama" id="nama">
			</li>
			<li>
				<label for="email">Email :</label>
				<input type="text" name="email" id="email">
			</li>
			<li>
				<label for="jurusan">Jurusan :</label>
				<input type="text" name="jurusan" id="jurusan">
			</li>
			<li>
				<label for="gambar">Gambar :</label>
				<input type="file" name="gambar" id="gambar">
			</li>
			<li>
				<button type="submit" name="submit">Tambah Data!</button>
			</li>
		</ul>

	</form>
 -->



</body>

</html>