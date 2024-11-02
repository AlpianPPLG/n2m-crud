<?php 
include 'config/controller.php';

//perintah sql untuk menampilkan data
$data_jurusan = select("SELECT * FROM jurusan");
$jumlah_data = count($data_jurusan);
$jumlah_halaman = ceil($jumlah_data / 10);
$halaman_aktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
$offset = ($halaman_aktif - 1) * 10;

$data_jurusan = select("SELECT * FROM jurusan LIMIT $offset, 10");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jurusan</title>
    <link rel="stylesheet" href="style/style.css">
    <style>
        .add-btn, .gallery-btn {
            display: inline-block;
            padding: 0.75rem 1.25rem;
            color: white;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1rem;
            transition: background-color 0.3s;
            margin-right: 10px; /* Menambahkan jarak antara tombol */
            margin-top: 10px;
        }

        .add-btn:hover, .gallery-btn:hover {
            background-color: #0056b3;
        }

        .btn-container {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
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
            padding: 0.75rem 1.25rem;
            background-color: #6c757d;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
            margin: 0 5px; /* Menambahkan jarak antara tombol */
        }

        .back-btn:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Jurusan</h1>
        <a href="tambahjurusan.php" class="add-btn">Tambah</a> <br> <br>
        <a href="galeri.php" class="gallery-btn">Galeri</a>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Keterangan</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = ($halaman_aktif - 1) * 10 + 1; ?>
                <?php foreach($data_jurusan as $jurusan): ?>
                    <tr>
                        <td><?= $no++; ?></td>  
                        <td><?= htmlspecialchars($jurusan['nama']); ?></td>
                        <td><?= htmlspecialchars($jurusan['ket']); ?></td>
                        <td>
                            <?php if (file_exists("uploads/" . $jurusan['gambar'])): ?>
                                <a href="uploads/<?= htmlspecialchars($jurusan['gambar']); ?>" target="_blank">
                                    <img src="uploads/<?= htmlspecialchars($jurusan['gambar']); ?>" alt="foto" width="100" height="100">
                                </a>
                            <?php else: ?>
                                <span>Gambar tidak ditemukan</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="editjurusan.php?id=<?= $jurusan['id']; ?>" class="edit-btn">Ubah</a>
                            <a href="deletejurusan.php?id=<?= $jurusan['id']; ?>" class="delete-btn" onclick="return confirm('Yakin ingin menghapus jurusan ini?')">Hapus</a>
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
