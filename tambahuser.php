
<?php
include 'config/controller.php';

if (isset($_POST['tambah'])){
    if(create_user($_POST) > 0){
        echo "<script>alert('Data User berhasil ditambahkan'); document.location.href='index.php'</script>"; 
    } else{
        echo "<script>alert('Data User berhasil ditambahkan'); document.location.href='index.php'</script>"; 
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <title>Tambah user</title>
</head>
<body> 
    <div class="container">
        <h1>Tambah User</h1>
        <form action="" method="POST">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" required>

            <label for="username">Username:</label>
            <input type="text" name="username" required>

            <label for="level">Level:</label>
            <input type="text" name="level" required>
            
            <input type="submit" name="tambah" value="Tambah user">
        </form>
    </div>
</body>
</html>
