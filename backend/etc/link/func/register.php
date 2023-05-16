<?php
// include koneksi ke database
require_once "koneksi.php";

if (isset($_POST["register"])) {
    // ambil data dari form
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // validasi input
    if (empty($username) || empty($password) || empty($confirm_password)) {
        header("location: register.php?error=empty_fields");
        exit();
    } elseif ($password !== $confirm_password) {
        header("location: register.php?error=password_mismatch");
        exit();
    } else {
        // hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // simpan data ke database
        $query = "INSERT INTO users (username, password) VALUES (?, ?)";
        $stmt = mysqli_prepare($koneksi, $query);
        mysqli_stmt_bind_param($stmt, "ss", $username, $hashed_password);
        mysqli_stmt_execute($stmt);

        header("location: ../login/index.php?success=registered");
        exit();
    }
}
?>
