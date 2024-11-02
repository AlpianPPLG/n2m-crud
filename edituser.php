<?php
include 'config/controller.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Mengambil data user berdasarkan id_user
    $user = select("SELECT * FROM user WHERE id = $id")[0];
}
if (isset($_POST['update'])) {
    if (update_user($_POST, $id) > 0) {
        echo "<script>
                alert('Data berhasil diupdate');
                document.location.href = 'index.php';
              </script>";
    } else {
        echo "<script>
                alert('Data gagal diupdate');
              </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">    
    <title>Edit User</title>
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
            background-color: #fff;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            border-radius: 10px;
            max-width: 500px;
            width: 100%;
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

        input[type="text"] {
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus {
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
            margin-top: 1rem;
            padding: 0.75rem;
            border: none;
            border-radius: 5px;
            background-color: #6c757d;
            color: white;
            font-size: 1rem;
            cursor: pointer;
            text-align: center;
            display: block;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .back-btn:hover {
            background-color: #5a6268;
        }

        @media (max-width: 768px) {
            .container {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit User</h1>
        <form action="" method="post">
            <div>
                <label for="nama">Nama:</label>
                <input type="text" name="nama" id="nama" value="<?= $user['nama']; ?>" required>
            </div>
            
            <div>
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" value="<?= $user['username']; ?>" required>
            </div>
            
            <div>
                <label for="level">Level:</label>
                <input type="text" name="level" id="level" value="<?= $user['level']; ?>" required>
            </div>
            
            <button type="submit" name="update">Update</button>
        </form>
        <a href="index.php" class="back-btn">Kembali</a>
    </div>
</body>
</html>
