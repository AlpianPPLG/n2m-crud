<?php
include 'config/controller.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Panggil fungsi delete_produk untuk menghapus data
    if (delete_informasi($id) > 0) {
        echo "<script>
                alert('Data berhasil dihapus');x
                document.location.href = 'informasi.php';
              </script>";
    } else {
        echo "<script>
                alert('Data gagal dihapus');
                document.location.href = 'informasi.php';
              </script>";
    }
} else {
    echo "<script>
            alert('ID tidak ditemukan');
            document.location.href = 'informasi.php';
          </script>";
}
?>
