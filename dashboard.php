<?php 
session_start(); 
// Proteksi halaman: Jika belum login, lempar ke login.php
if (!isset($_SESSION["user_id"])) { 
    header("Location: login.php"); 
    exit(); 
} 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Klinik</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>

<div class="navbar">
    <a href="dashboard.php" class="active">Dashboard</a>
    <a href="pasien.php">Data Pasien</a>
    <a href="logout.php" style="background-color: #e74c3c; margin-left: auto;">Logout</a>
</div>

<div class="container">
    <div class="welcome-msg">
        Selamat Datang kembali, <strong>Admin</strong>! 👋
    </div>

    <div class="dashboard-stats">
        <div class="card">
            <h3>Total Pasien</h3>
            <p>120</p>
        </div>
        <div class="card" style="border-left-color: #2ecc71;">
            <h3>Jadwal Hari Ini</h3>
            <p>8</p>
        </div>
        <div class="card" style="border-left-color: #f1c40f;">
            <h3>Dokter Bertugas</h3>
            <p>3</p>
        </div>
    </div>

    <h2>Daftar Pengguna Terbaru</h2>
    <a href="tambah_user.php" class="btn-tambah">Tambah Pengguna Baru</a>
    <div class="container">
        <h2>Daftar Pengguna</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>NAMA</th>
                <th>EMAIL</th>
                <th>AKSI</th>
            </tr>
        </thead>
        <tbody>
</tbody>
</table>
</div>
            <tr>
                <td>1</td>
                <td>Siti Aminah</td>
                <td>siti@email.com</td>
                <td>
                    <div class="button-group">
                        <a href="#" class="btn-edit">Edit</a>
                        <a href="#" class="btn-hapus">Hapus</a>
                    </div>
                </td>
            </tr>
            </tbody>
    </table>
</div>

</body>
</html>