<?php 

session_start();

if( !isset($_SESSION["username"]) ) {
	header("Location: ../login");
	exit;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Link ke file CSS Tailwind -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Dashboard</h1>
            <a href="../func/tambah.php" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Tambah Link</a>
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
                    <tr>
                        <td class="border px-4 py-2">Link 1</td>
                        <td class="border px-4 py-2">https://www.link1.com</td>
                        <td class="border px-4 py-2">😀</td>
                        <td class="border px-4 py-2">
                            <a href="#" class="text-blue-500 mr-4">Edit</a>
                            <a href="#" class="text-red-500">Hapus</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">Link 2</td>
                        <td class="border px-4 py-2">https://www.link2.com</td>
                        <td class="border px-4 py-2">👍</td>
                        <td class="border px-4 py-2">
                            <a href="#" class="text-blue-500 mr-4">Edit</a>
                            <a href="#" class="text-red-500">Hapus</a>
                        </td>
                    </tr>
                    <!-- Data dari database bisa ditampilkan menggunakan PHP -->
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
