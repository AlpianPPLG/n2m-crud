<?php
include 'config/controller.php';

//perintah sql untuk menampilkan data
$data_galeri = select("SELECT * FROM galeri");
$jumlah_data = count($data_galeri);
$jumlah_halaman = ceil($jumlah_data / 10);
$halaman_aktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
$offset = ($halaman_aktif - 1) * 10;

$data_galeri = select("SELECT * FROM galeri LIMIT $offset, 10");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri</title>
    <link rel="stylesheet" href="style/style.css">
    <style>
        .info-btn {
            display: inline-block;
            padding: 8px 16px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }

        .info-btn:hover {
            background-color: #45a049;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 1rem;
        }

        .pagination a {
            display: inline-block;
            padding: 0.75rem 1.25rem;
            color: white;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1rem;
            transition: background-color 0.3s;
            margin: 0 5px; /* Menambahkan jarak antara nomor halaman */
        }

        .pagination a:hover {
            background-color: #0056b3;
        }

        .back-btn {
            display: inline-block;
            padding: 8px 16px;
            background-color: #6c757d;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 10px;
        }

        .back-btn:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Galeri</h1>
        <a href="tambahgaleri.php" class="add-btn">Tambah</a> <br><br>
        <a href="informasi.php" class="info-btn">Informasi</a> <br><br>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Foto</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = ($halaman_aktif - 1) * 10 + 1; ?>
                <?php foreach ($data_galeri as $galeri): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td>
                            <?php if (file_exists("uploads/" . $galeri['foto'])): ?>
                                <a href="uploads/<?= htmlspecialchars($galeri['foto']); ?>" target="_blank">
                                    <img src="uploads/<?= htmlspecialchars($galeri['foto']); ?>" alt="foto" width="100" height="100">
                                </a>
                            <?php else: ?>
                                <span>Gambar tidak ditemukan</span>
                            <?php endif; ?>
                        </td>
                        <td><?= htmlspecialchars($galeri['ket']); ?></td>
                        <td>
                            <a href="editgaleri.php?id=<?= $galeri['id']; ?>" class="edit-btn">Ubah</a>
                            <a href="deletegaleri.php?id=<?= $galeri['id']; ?>" class="delete-btn" onclick="return confirm('Yakin ingin menghapus galeri ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="pagination">
            <?php for ($i = 1; $i <= $jumlah_halaman; $i++): ?>
                <a href="?halaman=<?= $i; ?>" class="pagination-btn <?= ($i == $halaman_aktif) ? 'active' : ''; ?>"><?= $i; ?></a>
            <?php endfor; ?>
        </div>
        
        <a href="javascript:history.back()" class="back-btn">Kembali</a>
    </div>
</body>
</html>
