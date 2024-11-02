<?php
include 'config/controller.php';

if (isset($_POST['tambah'])) {
    if (create_jurusan($_POST) > 0) {
        echo "<script>alert('Data Jurusan berhasil ditambahkan'); document.location.href='jurusan.php'</script>"; 
    } else {
        echo "<script>alert('Data Jurusan gagal ditambahkan'); document.location.href='jurusan.php'</script>"; 
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <title>Tambah Jurusan</title>
</head>
<body> 
    <div class="container">
        <h1>Tambah Jurusan</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" required>

            <label for="ket">Keterangan:</label>
            <input type="text" name="ket" required>

            <label for="gambar">Gambar:</label>
            <input type="file" name="gambar" required>
            
            <input type="submit" name="tambah" value="Tambah Jurusan">
        </form>
    </div>
</body>
</html>
