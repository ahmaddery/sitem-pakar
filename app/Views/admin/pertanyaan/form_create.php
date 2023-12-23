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
    <title>Form Tambah Pertanyaan</title>
</head>
<body>

    <h1>Form Tambah Pertanyaan</h1>

    <form action="/admin/pertanyaan/store" method="post">
        <label for="PertanyaanText">Pertanyaan Text:</label>
        <input type="text" name="PertanyaanText" required>

        <label for="Kategori">Kategori:</label>
        <input type="text" name="Kategori" required>

        <label for="Bobot">Bobot:</label>
        <input type="text" name="Bobot" required>

        <button type="submit">Simpan</button>
    </form>

    <a href="/admin/pertanyaan/index">Kembali ke Daftar Pertanyaan</a>

</body>
</html>
<?php
include('includes/footer.php'); 
?>