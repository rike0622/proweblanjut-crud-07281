<?php 
include 'config.php'; 
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $name = $_POST['name']; 
    $email = $_POST['email']; 
    $passw = $_POST['passw']; 
    $conn->query("INSERT INTO users (name, email, passw) VALUES ('$name', 
'$email', '$passw')"); 
    header("Location: index.php"); 
} 
?> 
<!DOCTYPE html> 
<html> 
<head>
    <title>Form Pengguna</title>
    <link rel="stylesheet" href="style.css"> </head>
<body> 
    <h2>Tambah Pengguna</h2> 
    <form method="POST"> 
        Nama: <input type="text" name="name" required><br> 
        Email: <input type="email" name="email" required><br> 
        Password: <input type="******" name="passw" required><br> 
        <button type="submit">Simpan</button> 
        
        <a href="index.php" style="display: block; text-align: center; margin-top: 15px; text-decoration: none; color: #777;">← Kembali ke Dashboard</a>
    </form>
    </form> 
</body> 
</html>