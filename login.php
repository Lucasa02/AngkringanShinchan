<?php
session_start();
include 'db.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query untuk mendapatkan user berdasarkan email
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['email'];
            header("Location: dashboard.html"); // Redirect ke halaman dashboard
        } else {
            header("Location: login.html?error=password"); // Redirect dengan parameter error untuk password salah
        }
    } else {
        header("Location: login.html?error=user"); // Redirect dengan parameter error untuk user tidak ditemukan
    }
}
?>
