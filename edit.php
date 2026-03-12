<?php 
include 'config.php'; 

// Ambil ID dari URL
$id = $_GET['id']; 

// Ambil data pengguna berdasarkan ID
$result = $conn->query("SELECT * FROM users WHERE id = $id");

// PERBAIKAN: Pastikan nama variabel konsisten (kita pakai $row)
$row = $result->fetch_assoc();

// Jika data tidak ditemukan
if (!$row) {
    die("Data tidak ditemukan!");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $name = $_POST['name']; 
    $email = $_POST['email']; 
    $passw = $_POST['passw']; 
    
    // Update data ke database
    $conn->query("UPDATE users SET name='$name', email='$email', passw='$passw' WHERE id=$id"); 
    
    // Kembali ke halaman utama
    header("Location: index.php"); 
    exit();
} 
?> 

<!DOCTYPE html> 
<html> 
<head>
    <title>Edit Pengguna</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body> 
    <div class="container">
        <h2>Edit Pengguna</h2> 
        <form method="POST"> 
            <label>Nama:</label>
            <input type="text" name="name" value="<?= $row['name'] ?>" required>

            <label>Email:</label>
            <input type="text" name="email" value="<?= $row['email'] ?>" required>

            <label>Password:</label>
            <input type="password" name="passw" value="<?= $row['passw'] ?>" required>

            <button type="submit">Update</button>
            <a href="index.php" style="display: block; text-align: center; margin-top: 15px; text-decoration: none; color: #777;">← Kembali</a>
        </form>
        </form> 
    </div>
</body> 
</html>