<?php
include 'db.php';

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = hash('sha256', $_POST['password']);

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if ($conn->query($sql)) {
        echo "<script>alert('Registrasi berhasil! Silakan login');window.location='login.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<form method="post">
    <h2>Registrasi Akun</h2>
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit" name="register">Daftar</button>
</form>

<p>Sudah punya akun? <a href="login.php">Login</a></p>
