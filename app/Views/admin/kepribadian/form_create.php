<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/scripts.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Kepribadian</title>
</head>
<body>

    <h1>Form Tambah Kepribadian</h1>

    <form action="/admin/kepribadian/store" method="post">
        <label for="Kode">Kode:</label>
        <input type="text" name="Kode" required>

        <label for="Kepribadian">Kepribadian:</label>
        <input type="text" name="Kepribadian" required>

        <label for="TipeKepribadian">Tipe Kepribadian:</label>
        <input type="text" name="TipeKepribadian" required>

        <label for="Keterangan">Keterangan:</label>
        <input type="text" name="Keterangan" required>

        <label for="Deskripsi">Deskripsi:</label>
        <textarea name="Deskripsi" required></textarea>

        <button type="submit">Simpan</button>
    </form>

    <a href="/admin/kepribadian">Kembali ke Daftar Kepribadian</a>

</body>
</html>
<?php
include('includes/footer.php'); 
?>