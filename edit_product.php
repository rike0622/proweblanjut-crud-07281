<?php
include 'config.php'; // pastikan nama file koneksi sesuai (config.php atau koneksi.php)

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM products WHERE id = $id");
$data = $result->fetch_assoc();

if (!$data) {
    die("Data produk tidak ditemukan!");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Edit Produk</h2>
        <form action="update_product.php" method="POST">
            <input type="hidden" name="id" value="<?= $data['id'] ?>">
            
            <label>Nama Produk:</label>
            <input type="text" name="nama_produk" value="<?= $data['nama_produk'] ?>" required>
            
            <label>Harga:</label>
            <input type="number" name="harga" value="<?= $data['harga'] ?>" required>
            
            <label>Stok:</label>
            <input type="number" name="stok" value="<?= $data['stok'] ?>" required>
            
            <button type="submit">Simpan Perubahan</button>
            <a href="index.php" style="margin-left: 10px;">Batal</a>
            
            <a href="index.php?page=products" style="display: block; text-align: center; margin-top: 15px; text-decoration: none; color: #777;">← Kembali</a>
        </form>
        </form>
    </div>
</body>
</html>