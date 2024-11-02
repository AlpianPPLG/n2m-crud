<?php
include 'config/controller.php';

if (isset($_POST['tambah'])) {
    if (create_informasi($_POST) > 0) {
        echo "<script>alert('Data informasi berhasil ditambahkan'); document.location.href='informasi.php'</script>"; 
    } else {
        echo "<script>alert('Data informasi gagal ditambahkan'); document.location.href='informasi.php'</script>"; 
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <title>Tambah informasi</title>
</head>
<body> 
    <div class="container">
        <h1>Tambah informasi</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="judul">Judul:</label>
            <input type="text" name="judul" required>

            <label for="ket">Keterangan:</label>
            <input type="text" name="ket" required>

            <label for="gambar">Gambar:</label>
            <input type="file" name="gambar" required>
            
            <input type="submit" name="tambah" value="Tambah informasi">
        </form>
    </div>
</body>
</html>
