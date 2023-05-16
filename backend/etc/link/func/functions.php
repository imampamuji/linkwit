
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

function addData($dataPost, $username){
	global $conn;

	$block_title = htmlspecialchars( $dataPost["block_title"]);
	$block_link = htmlspecialchars( $dataPost["block_link"]);
	$block_emoji = htmlspecialchars( $dataPost["block_emoji"]);

	$query = "INSERT INTO data_link VALUES ('','$username', '$block_title', '$block_link', '$block_emoji')";
	mysqli_query($conn, $query);
	echo mysqli_error($conn);
	return mysqli_affected_rows($conn);
}

// function upload() {

// 	$namaFile = $_FILES['gambar']['name'];
// 	$ukuranFile = $_FILES['gambar']['size'];
// 	$error = $_FILES['gambar']['error'];
// 	$tmpName = $_FILES['gambar']['tmp_name'];

// 	// cek apakah tidak ada gambar yang diupload
// 	if( $error === 4 ) {
// 		echo "<script>
// 				alert('pilih gambar terlebih dahulu!');
// 			  </script>";
// 		return false;
// 	}

// 	// cek apakah yang diupload adalah gambar
// 	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
// 	$ekstensiGambar = explode('.', $namaFile);
// 	$ekstensiGambar = strtolower(end($ekstensiGambar));
// 	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
// 		echo "<script>
// 				alert('yang anda upload bukan gambar!');
// 			  </script>";
// 		return false;
// 	}

// 	// cek jika ukurannya terlalu besar
// 	if( $ukuranFile > 1000000 ) {
// 		echo "<script>
// 				alert('ukuran gambar terlalu besar!');
// 			  </script>";
// 		return false;
// 	}

// 	// lolos pengecekan, gambar siap diupload
// 	// generate nama gambar baru
// 	$namaFileBaru = uniqid();
// 	$namaFileBaru .= '.';
// 	$namaFileBaru .= $ekstensiGambar;

// 	move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

// 	return $namaFileBaru;
// }

function tambah($data) {
	global $conn;

	// $title = htmlspecialchars($data["title"]);
	// $emoji = htmlspecialchars($data["emoji"]);
	// $link = htmlspecialchars($data["link"]);
	
	// upload gambar
	// $gambar = upload();
	// if( !$gambar ) {
	// 	return false;
	// }

	$block_title = htmlspecialchars( $dataPost["block_title"]);
	$block_link = htmlspecialchars( $dataPost["block_link"]);
	$block_emoji = htmlspecialchars( $dataPost["block_emoji"]);

	$query = "INSERT INTO data_link VALUES ('','kominfo', '$block_title', '$block_link', '$block_emoji')";
	mysqli_query($conn, $query);
	echo mysqli_error($conn);
	return mysqli_affected_rows($conn);
}


function delete($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM data_link WHERE id = $id");
	return mysqli_affected_rows($conn);
}

?>