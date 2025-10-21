<?php
require 'db.php';
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Kasir</title>
</head>
<body>
    <h1>Selamat datang, <?= htmlspecialchars($user['username']) ?>!</h1>
    <a href="logout.php">Logout</a>
    <hr>

    <h2>Daftar Produk</h2>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
        </tr>
        <?php
        $stmt = $pdo->query("SELECT * FROM products");
        while ($row = $stmt->fetch()) {
            echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>Rp {$row['price']}</td>
                <td>{$row['stock']}</td>
            </tr>";
        }
        ?>
    </table>
</body>
</html>
