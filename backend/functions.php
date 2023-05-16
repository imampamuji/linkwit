<?php

// koneksi ke database
$conn = mysqli_connect("db_mysql", "root", "root", "linkwit");


function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}


function tambah($data) {
	global $conn;

	$block_title = htmlspecialchars($data["block_title"]);
	$block_emoji = htmlspecialchars($data["block_emoji"]);
	$block_link = htmlspecialchars($data["block_link"]);
	$jurusan = htmlspecialchars($data["jurusan"]);

	// upload gambar
	$gambar = upload();
	if( !$gambar ) {
		return false;
	}

	$query = "INSERT INTO mahasiswa VALUES (null, '$block_title', '$block_emoji', '$block_link', '$jurusan', '$gambar')";
	mysqli_query($conn, $query);

	echo "returnan";
	var_dump(mysqli_affected_rows($conn));
	echo mysqli_error($conn);
	return mysqli_affected_rows($conn);
}

function tambahNonGambar($data) {
	global $conn;

	$block_title = htmlspecialchars($data["block_title"]);
	$block_emoji = htmlspecialchars($data["block_emoji"]);
	$block_link = htmlspecialchars($data["block_link"]);
	// $jurusan = htmlspecialchars($data["jurusan"]);

	// upload gambar
	// $gambar = upload();
	// if( !$gambar ) {
	// 	return false;
	// }

	$query = "INSERT INTO data_link VALUES (null, 'kominfo', '$block_title', '$block_link', '$block_emoji')";
	mysqli_query($conn, $query);

	echo "returnan";
	var_dump(mysqli_affected_rows($conn));
	echo mysqli_error($conn);
	return mysqli_affected_rows($conn);
}


function upload() {

	$block_emojiFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if( $error === 4 ) {
		echo "<script>
				alert('pilih gambar terlebih dahulu!');
			  </script>";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $block_emojiFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('yang anda upload bukan gambar!');
			  </script>";
		return false;
	}

	// cek jika ukurannya terlalu besar
	if( $ukuranFile > 1000000 ) {
		echo "<script>
				alert('ukuran gambar terlalu besar!');
			  </script>";
		return false;
	}

	// lolos pengecekan, gambar siap diupload
	// generate block_emoji gambar baru
	$block_emojiFileBaru = uniqid();
	$block_emojiFileBaru .= '.';
	$block_emojiFileBaru .= $ekstensiGambar;

	// echo exec('whoami'); 



	move_uploaded_file($tmpName, 'img/' . $block_emojiFileBaru);

	return $block_emojiFileBaru;
}




function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM data_link WHERE id = $id");
	return mysqli_affected_rows($conn);
}


function ubah($data) {
	global $conn;

	$id = $data["id"];
	$block_title = htmlspecialchars($data["block_title"]);
	$block_emoji = htmlspecialchars($data["block_emoji"]);
	$block_link = htmlspecialchars($data["block_link"]);
	// $jurusan = htmlspecialchars($data["jurusan"]);
	// $gambarLama = htmlspecialchars($data["gambarLama"]);
	
	// // cek apakah user pilih gambar baru atau tidak
	// if( $_FILES['gambar']['error'] === 4 ) {
	// 	$gambar = $gambarLama;
	// } else {
	// 	$gambar = upload();
	// }
	

	$query = "UPDATE data_link SET
				block_title = '$block_title',
				block_emoji = '$block_emoji',
				block_link = '$block_link'
			  WHERE id = $id
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);	
}


function ubahNoGambar($data) {
	global $conn;

	$id = $data["id"];
	$block_title = htmlspecialchars($data["block_title"]);
	$block_emoji = htmlspecialchars($data["block_emoji"]);
	$block_link = htmlspecialchars($data["block_link"]);
	// $jurusan = htmlspecialchars($data["jurusan"]);
	// $gambarLama = htmlspecialchars($data["gambarLama"]);
	
	// cek apakah user pilih gambar baru atau tidak
	// if( $_FILES['gambar']['error'] === 4 ) {
	// 	$gambar = $gambarLama;
	// } else {
	// 	$gambar = upload();
	// }
	

	$query = "UPDATE data_link SET block_title = '$block_title', block_emoji = '$block_emoji',
				block_link = '$block_link'
			  WHERE id = $id
			";

	mysqli_query($conn, $query);
	echo mysqli_error($conn);
	var_dump(mysqli_affected_rows($conn));
	return mysqli_affected_rows($conn);	
}


function cari($keyword) {
	$query = "SELECT * FROM mahasiswa
				WHERE
			  block_emoji LIKE '%$keyword%' OR
			  block_title LIKE '%$keyword%' OR
			  block_link LIKE '%$keyword%' OR
			  jurusan LIKE '%$keyword%'
			";
	return query($query);
}


function registrasi($data) {
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('username sudah terdaftar!')
		      </script>";
		return false;
	}


	// cek konfirmasi password
	if( $password !== $password2 ) {
		echo "<script>
				alert('konfirmasi password tidak sesuai!');
		      </script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan userbaru ke database
	mysqli_query($conn, "INSERT INTO user VALUES(null, '$username', '$password')");

	return mysqli_affected_rows($conn);

}









?>