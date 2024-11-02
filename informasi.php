<?php 
include 'config/controller.php';
//perintah sql untuk menampilkan data
$data_info = select("SELECT * FROM info");
$jumlah_data = count($data_info);
$jumlah_halaman = ceil($jumlah_data / 10);
$halaman_aktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
$offset = ($halaman_aktif - 1) * 10;

$data_info = select("SELECT * FROM info LIMIT $offset, 10");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi</title>
    <link rel="stylesheet" href="style/style.css">
    <style>

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
            padding: 0.75rem;
            border: none;
            border-radius: 5px;
            background-color: #6c757d;
            color: white;
            font-size: 1rem;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .back-btn:hover {
            background-color: #5a6268;
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Informasi</h1>
        <a href="tambahinformasi.php" class="add-btn">Tambah</a>
        <button class="back-btn" onclick="goBack()">Kembali</button>
        <br> <br>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Judul</th>
                    <th>Keterangan</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = ($halaman_aktif - 1) * 10 + 1; ?>
                <?php foreach($data_info as $info): ?>
                    <tr>
                        <td><?= $no++; ?></td>  
                        <td><?= htmlspecialchars($info['judul']); ?></td>
                        <td><?= htmlspecialchars($info['ket']); ?></td>
                        <td>
                            <?php if (file_exists("uploads/" . $info['gambar'])): ?>
                                <a href="uploads/<?= htmlspecialchars($info['gambar']); ?>" target="_blank">
                                    <img src="uploads/<?= htmlspecialchars($info['gambar']); ?>" alt="foto" width="100" height="100">
                                </a>
                            <?php else: ?>
                                <span>Gambar tidak ditemukan</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="editinformasi.php?id=<?= $info['id']; ?>" class="edit-btn">Ubah</a>
                            <a href="deleteinformasi.php?id=<?= $info['id']; ?>" class="delete-btn" onclick="return confirm('Yakin ingin menghapus jurusan ini?')">Hapus</a>
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
    </div>
</body>
<script>
    function goBack() {
        window.history.back();
    }
</script>
</html>
