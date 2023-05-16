
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

function delete($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM data_link WHERE id = $id");
	return mysqli_affected_rows($conn);
}

?>