<?php
include 'config/controller.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Panggil fungsi delete_produk untuk menghapus data
    if (delete_user($id) > 0) {
        echo "<script>
                alert('Data berhasil dihapus');x
                document.location.href = 'index.php';
              </script>";
    } else {
        echo "<script>
                alert('Data gagal dihapus');
                document.location.href = 'index.php';
              </script>";
    }
} else {
    echo "<script>
            alert('ID tidak ditemukan');
            document.location.href = 'index.php';
          </script>";
}
?>
