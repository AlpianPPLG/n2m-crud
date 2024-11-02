<?php
include 'config/controller.php';

if (isset($_POST['tambah'])) {
    if (create_galeri($_POST) > 0) {
        echo "<script>alert('Data galeri berhasil ditambahkan'); document.location.href='galeri.php'</script>"; 
    } else {
        echo "<script>alert('Data galeri gagal ditambahkan'); document.location.href='galeri.php'</script>"; 
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <title>Tambah Galeri</title>
</head>
<body> 
    <div class="container">
        <h1>Tambah Galeri</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="foto">Foto:</label>
            <input type="file" name="foto" required>

            <label for="ket">Keterangan:</label>
            <input type="text" name="ket" required>
            
            <input type="submit" name="tambah" value="Tambah Galeri">
        </form>
    </div>
</body>
</html>
