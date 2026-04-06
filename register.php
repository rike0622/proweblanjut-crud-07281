<?php 
// 1. Pastikan tidak ada spasi atau HTML sebelum tag PHP ini agar redirect header() lancar
include "koneksi.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $username = $_POST["username"]; 
    // Menggunakan password_hash agar aman & bisa dibaca password_verify di login.php
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); 

    // Sesuaikan kolom: 'name' dan 'passw' sesuai struktur database kamu
    $stmt = $conn->prepare("INSERT INTO users (name, passw) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password); 
    
    if ($stmt->execute()) { 
        header("Location: login.php?pesan=registrasi_berhasil");
        exit();
    } else { 
        $error_msg = "Gagal mendaftar! Username mungkin sudah ada."; 
    } 
    $stmt->close(); 
    $conn->close(); 
} 
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - PMCKU Graha Dipo</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* CSS untuk memposisikan Form tepat di Tengah Layar */
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .auth-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f4f7f6;
        }

        .auth-container {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .auth-container h2 {
            color: #2c3e50;
            margin-bottom: 25px;
            border-bottom: 2px solid #2ecc71; /* Warna hijau untuk register */
            display: inline-block;
            padding-bottom: 5px;
        }

        .auth-container label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            color: #555;
        }

        .auth-container input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 6px;
            box-sizing: border-box;
        }

        .auth-container button {
            width: 100%;
            padding: 12px;
            background-color: #2ecc71; /* Hijau agar beda dengan tombol login */
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
            font-size: 16px;
        }

        .auth-container button:hover {
            background-color: #27ae60;
        }

        .error-msg {
            color: #e74c3c;
            background: #fadbd8;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .btn-back {
            display: block;
            margin-top: 15px;
            color: #7f8c8d;
            text-decoration: none;
            font-size: 14px;
        }

        .btn-back:hover {
            color: #34495e;
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="auth-wrapper">
    <div class="auth-container">
        <h2>Daftar Pengguna Baru</h2>
        
        <?php if(isset($error_msg)): ?>
            <div class="error-msg">
                <?php echo $error_msg; ?>
            </div>
        <?php endif; ?>

        <form method="POST" action=""> 
            <div style="text-align: left;">
                <label>Username:</label>
                <input type="text" name="username" placeholder="Buat username baru" required> 
                
                <label>Password:</label>
                <input type="password" name="password" placeholder="Minimal 8 karakter" required> 
            </div>
            <button type="submit">Daftar Sekarang</button> 
        </form>

        <p>Sudah punya akun? <a href="login.php" style="color: #3498db; text-decoration: none; font-weight: bold;">Login di sini</a></p>
        <a href="index.php" class="btn-back">← Kembali ke Beranda</a>
    </div>
</div>

</body>
</html>