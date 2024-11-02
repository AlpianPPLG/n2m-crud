<?php
include 'config/controller.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $info = select("SELECT * FROM info WHERE id = $id")[0];
}

if (isset($_POST['update'])) {
    if (update_informasi($_POST, $id) > 0) {
        echo "<script>
                alert('Data jurusan berhasil diupdate');
                document.location.href = 'informasi.php';
              </script>";
    } else {
        echo "<script>
                alert('Data jurusan gagal diupdate');
              </script>";
    }
}
?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit informasi</title>
    <link rel="stylesheet" href="./style/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #ffffff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.15);
            max-width: 500px;
            width: 100%;
            margin: auto;
        }

        h1 {
            text-align: center;
            margin-bottom: 1.5rem;
            font-size: 1.75rem;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        label {
            font-size: 1rem;
            color: #555;
            margin-bottom: 0.5rem;
        }

        input[type="text"], input[type="file"] {
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s;
            width: 100%;
        }

        input[type="text"]:focus, input[type="file"]:focus {
            border-color: #007bff;
            outline: none;
        }

        button[type="submit"] {
            padding: 0.75rem;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .back-btn {
            display: block;
            margin-top: 1rem;
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

        .current-image {
            font-size: 0.9rem;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit informasi</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <label for="judul">Judul:</label>
                <input type="text" name="judul" id="judul" value="<?= $info['judul']; ?>" required>
            </div>
            
            <div>
                <label for="ket">Keterangan:</label>
                <input type="text" name="ket" id="ket" value="<?= $info['ket']; ?>" required>
            </div>
            
            <div>
                <label for="gambar">Gambar:</label>
                <input type="file" name="gambar" id="gambar">
                <p>Gambar saat ini: <?= $info['gambar']; ?></p>
            </div>
            
            <button type="submit" name="update">Update</button>
        </form>
        <a href="informasi.php" class="back-btn">Kembali</a>
    </div>
</body>
</html>
