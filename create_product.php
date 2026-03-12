<?php 
include 'config.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $id = $_POST['id']; 
    $nama_produk = $_POST['nama_produk']; 
    $harga = $_POST['harga']; 
    $stok = $_POST['stok']; 
    
    // Sesuaikan nama tabel dengan di phpMyAdmin kamu
    $conn->query("INSERT INTO products (nama_produk, harga, stok) 
                  VALUES ('$nama_produk', '$harga', '$stok')"); 
    header("Location: index.php?page=products"); 
} 
?> 
<!DOCTYPE html> 
<html> 
<head>
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body> 
    text-align : <center>
    <h2>Tambah Produk Baru</h2> 
    <form method="POST"> 
        Id: <input type="text" name="id" required><br> 
        Nama Produk: <input type="text" name="nama_produk" required><br> 
        Harga: <input type="text" name="harga" required><br> 
        Stok: <input type="text" name="stok" required><br> 
        <button type="submit">Simpan Produk</button>
        <a href="index.php?page=products" style="display: block; text-align: center; margin-top: 15px; text-decoration: none; color: #777;">← Kembali ke Daftar Produk</a>
    </form>
    </form> 
</body> 
</html>