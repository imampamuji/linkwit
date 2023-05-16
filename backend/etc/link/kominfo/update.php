<?php 

require "functions.php";

$id = $_GET["id"];
var_dump($id);

    // cek tombol submit data ud di tekan/blm
if (isset($_POST["submit"])) {
    if (addData($_POST, $username) > 0) {
        echo "<script>
                alert('Data link baru berhasil ditambahkan');
                document.location.href = 'index.php';
                </script>  
        ";
    } else {
        echo "<script>
                alert('Data link baru gagal ditambahkan');
                document.location.href = 'index.php';
                </script>  
        ";
    }
}
?>

