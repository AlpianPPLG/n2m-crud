<?php
include 'config/controller.php';

// Tentukan jumlah data per halaman
$jumlahDataPerHalaman = 10;

// Ambil halaman saat ini dari URL (default adalah 1 jika tidak ada halaman yang ditentukan)
$halamanAktif = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;

// Hitung offset data berdasarkan halaman aktif
$offset = ($halamanAktif - 1) * $jumlahDataPerHalaman;

// Hitung total data dan total halaman
$totalData = count(select("SELECT * FROM user"));
$totalHalaman = ceil($totalData / $jumlahDataPerHalaman);

// Ambil data sesuai dengan limit dan offset
$data_user = select("SELECT * FROM user LIMIT $offset, $jumlahDataPerHalaman");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <title>Crud Sederhana</title>
    <style>
        .back-btn {
            background-color: #28a745;
            border: 1px solid #ddd;
            padding: 10px 20px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .pagination {
            margin-top: 20px;
            text-align: center;
        }
        .pagination a {
            margin: 0 5px;
            padding: 8px 16px;
            text-decoration: none;
            color: #007bff;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .pagination a.active {
            background-color: #007bff;
            color: white;
            border: 1px solid #007bff;
        }
    </style>
</head>
<body> 
    <div class="container">
        <h1>Data User</h1>
        <a href="tambahuser.php" class="add-btn">Tambah User</a>
        <a href="jurusan.php" class="back-btn">Jurusan</a>
        <button onclick="goBack()" class="back-btn">Kembali</button>
        <br><br>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Level</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = $offset + 1; ?>
                <?php foreach($data_user as $user): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $user['nama']; ?></td>
                        <td><?= $user['username']; ?></td>
                        <td><?= $user['level']; ?></td>
                        <td>
                            <a href="edituser.php?id=<?= $user['id']; ?>" class="edit-btn">Edit</a>
                            <a href="deleteuser.php?id=<?= $user['id']; ?>" class="delete-btn" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        <!-- Paginasi -->
        <div class="pagination">
            <?php for ($i = 1; $i <= $totalHalaman; $i++): ?>
                <a href="?halaman=<?= $i; ?>" class="<?= ($i == $halamanAktif) ? 'active' : ''; ?>"><?= $i; ?></a>
            <?php endfor; ?>
        </div>
    </div>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
