<?php 
include 'config.php'; 
$page = isset($_GET['page']) ? $_GET['page'] : 'users';
?> 
<!DOCTYPE html> 
<html> 
<head> 
    <title>Dashboard Penjualan</title> 
    <link rel="stylesheet" href="style.css"> 
</head> 
<body> 
    <div class="navbar">
        <a href="index.php?page=users" class="<?= $page == 'users' ? 'active' : '' ?>">Management Users</a>
        <a href="index.php?page=products" class="<?= $page == 'products' ? 'active' : '' ?>">Management Products</a>
    </div>

    <div class="container">
        <?php if ($page == 'users'): ?>
            <h2>Daftar Pengguna</h2> 
            <a href="create.php" class="btn-tambah">Tambah Pengguna Baru</a>
            <table> 
                <thead>
                    <tr> 
                        <th>ID</th><th>Nama</th><th>Email</th><th>Password</th><th>Aksi</th> 
                    </tr> 
                </thead>
                <tbody>
                <?php
                $result = $conn->query("SELECT * FROM users");
                if ($result) {
                    while ($row = $result->fetch_assoc()): ?> 
                    <tr> 
                        <td><?= $row['id'] ?></td> 
                        <td><?= $row['name'] ?></td> 
                        <td><?= $row['email'] ?></td> 
                        <td><?= $row['passw'] ?></td> 
                        <td> 
                        <td class="action-column">
                            <div class="button-group">
                                <a href="edit.php?id=<?= $row['id'] ?>" class="btn-edit">Edit</a>
                                <a href="delete.php?id=<?= $row['id'] ?>" class="btn-hapus">Hapus</a>
                            </div>
                        </td>
                        </td> 
                    </tr> 
                <?php endwhile; 
                } else { echo "<tr><td colspan='5'>Tabel users bermasalah atau belum ada.</td></tr>"; } ?> 
            </table> 

            <?php else: ?>
    <h2>Daftar Produk</h2> 
    <a href="create_product.php" class="btn-tambah">Tambah Produk Baru</a>
    <table> 
        <thead>
            <tr> 
                <th>ID</th><th>Nama Produk</th><th>Harga</th><th>Stok</th><th>AKSI</th> 
            </tr> 
        </thead>
        <tbody>
            <?php 
            $result_p = $conn->query("SELECT * FROM products"); 
            if ($result_p && $result_p->num_rows > 0) {
                while ($row_p = $result_p->fetch_assoc()): ?> 
                <tr> 
                    <td><?= $row_p['id'] ?></td> 
                    <td><?= $row_p['nama_produk'] ?></td> 
                    <td>Rp <?= number_format($row_p['harga'], 0, ',', '.') ?></td> 
                    <td><?= $row_p['stok'] ?></td> 
                    <td class="action-column"> 
                        <div class="button-group">
                            <a href="edit_product.php?id=<?= $row_p['id'] ?>" class="btn-edit">Edit</a>
                            <a href="delete.php?id=<?= $row_p['id'] ?>" class="btn-hapus" onclick="return confirm('Hapus produk ini?')">Hapus</a>
                        </div>
                    </td> 
                </tr> 
            <?php endwhile; 
            } else { echo "<tr><td colspan='5' style='text-align:center;'>Data produk kosong atau tabel tidak ditemukan.</td></tr>"; } ?> 
        </tbody>
    </table> 
<?php endif; ?>
    </div>
</body> 
</html>