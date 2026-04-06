<?php 
// 1. Letakkan session_start dan logika redirect di paling atas tanpa ada spasi/HTML sebelumnya
session_start(); 

// Pastikan file koneksi.php sudah berisi: $conn = new mysqli("localhost", "root", "", "pwl1_db");
include "koneksi.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $username = $_POST["username"]; 
    $password = $_POST["password"]; 

    // Menggunakan kolom 'name' dan 'passw' sesuai database kamu
    $stmt = $conn->prepare("SELECT id, passw FROM users WHERE name = ?"); 
    $stmt->bind_param("s", $username); 
    $stmt->execute(); 
    $result = $stmt->get_result(); 
    
    if ($result->num_rows === 1) { 
        $user = $result->fetch_assoc(); 
        
        // Verifikasi password (pastikan di database sudah hasil hash)
        if (password_verify($password, $user["passw"])) { 
            $_SESSION["user_id"] = $user["id"]; 
            $_SESSION["username"] = $username; 
            
            // Redirect ke dashboard
            header("Location: dashboard.php"); 
            exit(); 
        } else { 
            $error = "Password salah!"; 
        } 
    } else { 
        $error = "Username tidak ditemukan!"; 
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
    <title>Login - PMCKU Graha Dipo</title>
    <link rel="stylesheet" href="style.css"> 
    <style>
        /* CSS Tambahan agar Form benar-benar di Tengah Layar */
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
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
            border-bottom: 2px solid #3498db;
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
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
            font-size: 16px;
        }

        .auth-container button:hover {
            background-color: #2980b9;
        }

        .error-box {
            color: #e74c3c;
            background: #fadbd8;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="auth-wrapper">
    <div class="auth-container">
        <h2>Login Admin</h2>
        
        <?php if(isset($error)): ?>
            <div class="error-box">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form method="POST" action=""> 
            <div style="text-align: left;">
                <label>Username:</label>
                <input type="text" name="username" placeholder="Masukkan username" required> 
                
                <label>Password:</label>
                <input type="password" name="password" placeholder="Masukkan password" required> 
            </div>
            <button type="submit">Login</button> 
        </form>
        
        <p>Belum punya akun? <a href="register.php" style="color: #3498db; text-decoration: none; font-weight: bold;">Daftar di sini</a></p>
    </div>
</div> 

</body>
</html>