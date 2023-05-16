<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';
$data_link = query("SELECT * FROM data_link ORDER BY id DESC");

// tombol cari ditekan
// if( isset($_POST["cari"]) ) {
// 	$data_link = cari($_POST["keyword"]);
// }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Dashboard</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css">

</head>
<body>

<a href="logout.php">Logout</a>

<br>



<div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Dashboard</h1>
            <a href="tambah.php" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Tambah Link</a>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <table class="w-full table-fixed">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="w-1/3 px-4 py-2 text-left font-medium">Judul</th>
                        <th class="w-1/3 px-4 py-2 text-left font-medium">Link</th>
                        <th class="w-1/6 px-4 py-2 text-left font-medium">Emoji</th>
                        <th class="w-1/6 px-4 py-2 text-left font-medium">Aksi</th>
                    </tr>
                </thead>
                <tbody>
				<?php $i = 1; ?>
				<?php foreach( $data_link as $row ) : ?>
                    <tr>
                        <td class="border px-4 py-2"><?= $row["block_title"]; ?></td>
                        <td class="border px-4 py-2"><?= $row["block_link"]; ?></td>
                        <td class="border px-4 py-2"><?= $row["block_emoji"]; ?></td>
                        <td class="border px-4 py-2">
                            <a href="ubah.php?id=<?= $row["id"]; ?>" class="text-blue-500 mr-4">Edit</a>
                            <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');" class="text-red-500">Hapus</a>
                        </td>
                    </tr>
                    <!-- Data dari database bisa ditampilkan menggunakan PHP -->
				<?php $i++; ?>
				<?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>


</body>
</html>