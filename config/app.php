<?php

include 'koneksi.php';

function select($query) {
    global $db;
    $result = mysqli_query($db, $query);
    if (!$result) {
        die("Query gagal: " . mysqli_error($db)); // Tambahkan pesan kesalahan untuk debugging
    }
    
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function query($query) {
    global $db;
    mysqli_query($db, $query);

    // Tambahkan pesan error jika query gagal
    if (mysqli_affected_rows($db) < 0) {
        die("Query gagal: " . mysqli_error($db));
    }

    return mysqli_affected_rows($db);
}

// Fungsi untuk menambahkan data user
function create_user($post) {
    global $db;

    $nama = strip_tags($post['nama']);
    $username = strip_tags($post['username']);
    $level = strip_tags($post['level']);

    $query = "INSERT INTO user (nama, username, level) VALUES ('$nama', '$username', '$level')";
    query($query);
}

// Fungsi untuk memperbarui data user
function update_user($post, $id) {
    global $db;

    $nama = strip_tags($post['nama']);
    $username = strip_tags($post['username']);
    $level = strip_tags($post['level']);

    $query = "UPDATE user SET nama = '$nama', username = '$username', level = '$level' WHERE id = $id";
    return query($query);
}

function delete_user($id) {
    global $db;

    $query = "DELETE FROM user WHERE id = $id";
    return query($query);
}

function create_jurusan($post) {
    global $db;

    $nama = strip_tags($post['nama']);
    $ket = strip_tags($post['ket']);

    // Proses upload gambar
    $gambar = $_FILES['gambar']['name'];
    $tmp_name = $_FILES['gambar']['tmp_name'];
    $folder = "uploads/";

    // Cek apakah folder ada dan izinkan penulisan
    if (!is_dir($folder)) {
        mkdir($folder, 0755, true); // Buat folder jika belum ada
    }

    // Memindahkan file ke folder uploads dan cek keberhasilan
    if (move_uploaded_file($tmp_name, $folder . $gambar)) {
        $query = "INSERT INTO jurusan (nama, ket, gambar) VALUES ('$nama', '$ket', '$gambar')";
        return query($query);
    } else {
        echo "Gagal mengunggah gambar.";
        return false;
    }
}

function update_jurusan($post, $id) {
    global $db;

    $nama = strip_tags($post['nama']);
    $ket = strip_tags($post['ket']);
    $folder = "uploads/";

    // Periksa apakah ada file gambar yang diunggah
    if (!empty($_FILES['gambar']['name'])) {
        $gambar = $_FILES['gambar']['name'];
        $tmp_name = $_FILES['gambar']['tmp_name'];

        // Pindahkan file gambar baru
        move_uploaded_file($tmp_name, $folder . $gambar);
        $query = "UPDATE jurusan SET nama = '$nama', ket = '$ket', gambar = '$gambar' WHERE id = $id";
    } else {
        // Jika tidak ada gambar baru, jangan perbarui kolom gambar
        $query = "UPDATE jurusan SET nama = '$nama', ket = '$ket' WHERE id = $id";
    }

    return query($query);
}

function delete_jurusan($id) {
    global $db;

    $query = "DELETE FROM jurusan WHERE id = $id";
    return query($query);
}

function create_galeri($post) {
    global $db;

    $foto = $_FILES['foto']['name'];
    $ket = strip_tags($post['ket']); 
    $tmp_name = $_FILES['foto']['tmp_name'];
    $folder = "uploads/";

    if (!is_dir($folder)) {
        mkdir($folder, 0755, true);
    }

    if (move_uploaded_file($tmp_name, $folder . $foto)) {
        $query = "INSERT INTO galeri (foto, ket) VALUES ('$foto', '$ket')";
        return query($query);
    } else {
        echo "Gagal mengunggah gambar.";
        return false;
    }
}

function update_galeri($post, $id) {
    global $db;

    $ket = strip_tags($post['ket']);
    $folder = "uploads/";

    if (!empty($_FILES['foto']['name'])) {
        $foto = $_FILES['foto']['name'];
        $tmp_name = $_FILES['foto']['tmp_name'];

        move_uploaded_file($tmp_name, $folder . $foto);
        $query = "UPDATE galeri SET foto = '$foto', ket = '$ket' WHERE id = $id";
    } else {
        $query = "UPDATE galeri SET ket = '$ket' WHERE id = $id";
    }

    return query($query);
}

function delete_galeri($id) {
    global $db;

    $query = "DELETE FROM galeri WHERE id = $id";
    return query($query);
}

function create_informasi($post) {
    global $db;

    $judul = strip_tags($post['judul']);
    $ket = strip_tags($post['ket']);

    // Proses upload gambar
    $gambar = $_FILES['gambar']['name'];
    $tmp_name = $_FILES['gambar']['tmp_name'];
    $folder = "uploads/";

    // Cek apakah folder ada dan izinkan penulisan
    if (!is_dir($folder)) {
        mkdir($folder, 0755, true); // Buat folder jika belum ada
    }

    // Memindahkan file ke folder uploads dan cek keberhasilan
    if (move_uploaded_file($tmp_name, $folder . $gambar)) {
        $query = "INSERT INTO info (judul, ket, gambar) VALUES ('$judul', '$ket', '$gambar')";
        return query($query);
    } else {
        echo "Gagal mengunggah gambar.";
        return false;
    }
}

function update_informasi($post, $id) {
    global $db;

    $judul = strip_tags($post['judul']);
    $ket = strip_tags($post['ket']);
    $folder = "uploads/";

    // Periksa apakah ada file gambar yang diunggah
    if (!empty($_FILES['gambar']['name'])) {
        $gambar = $_FILES['gambar']['name'];
        $tmp_name = $_FILES['gambar']['tmp_name'];

        // Pindahkan file gambar baru
        move_uploaded_file($tmp_name, $folder . $gambar);
        $query = "UPDATE info SET judul = '$judul', ket = '$ket', gambar = '$gambar' WHERE id = $id";
    } else {
        // Jika tidak ada gambar baru, jangan perbarui kolom gambar
        $query = "UPDATE info SET judul = '$judul', ket = '$ket' WHERE id = $id";
    }

    return query($query);
}


function delete_informasi($id) {
    global $db;

    $query = "DELETE FROM info WHERE id = $id";
    return query($query);
}

?>