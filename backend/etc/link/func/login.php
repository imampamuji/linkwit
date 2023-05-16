<?php
// include koneksi ke database
require_once "koneksi.php";

if (isset($_POST["login"])) {
    // ambil data dari form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // validasi input
    if (empty($username) || empty($password)) {
        header("location: login.php?error=empty_fields");
        exit();
    } else {
        // cari data user berdasarkan username
        $query = "SELECT * FROM users WHERE username = ?";
        $stmt = mysqli_prepare($koneksi, $query);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        // cek apakah user ditemukan
        if ($row = mysqli_fetch_assoc($result)) {
            // verifikasi password
            $password_check = password_verify($password, $row["password"]);
            if ($password_check == true) {
                session_start();
                $_SESSION["user_id"] = $row["id"];
                $_SESSION["username"] = $row["username"];

                header("location: ../profile");
                exit();
            } else {
                header("location: login.php?error=invalid_password");
                exit();
            }
        } else {
            header("location: login.php?error=user_not_found");
            exit();
        }
    }
}
?>
