<?php
    
    $db = mysqli_connect("localhost", "root", "", "db_jurusan");

    if (!$db) {
        die("Gagal terhubung ke database: " . mysqli_connect_error());
    } else {
        // echo "Berhasil Terhubung";
    }
    
?>
