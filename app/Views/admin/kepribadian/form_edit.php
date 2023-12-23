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
    <title>Form Edit Kepribadian</title>
</head>
<body>

    <h1>Form Edit Kepribadian</h1>

    <form action="/admin/kepribadian/update/<?= $kepribadian['IDKepribadian']; ?>" method="post">
        <label for="Kode">Kode:</label>
        <input type="text" name="Kode" value="<?= $kepribadian['Kode']; ?>" required>

        <label for="Kepribadian">Kepribadian:</label>
        <input type="text" name="Kepribadian" value="<?= $kepribadian['Kepribadian']; ?>" required>

        <label for="TipeKepribadian">Tipe Kepribadian:</label>
        <input type="text" name="TipeKepribadian" value="<?= $kepribadian['TipeKepribadian']; ?>" required>

        <label for="Keterangan">Keterangan:</label>
        <input type="text" name="Keterangan" value="<?= $kepribadian['Keterangan']; ?>" required>

        <label for="Deskripsi">Deskripsi:</label>
        <textarea name="Deskripsi" required><?= $kepribadian['Deskripsi']; ?></textarea>

        <button type="submit">Update</button>
    </form>

    <a href="/admin/kepribadian">Kembali ke Daftar Kepribadian</a>

</body>
</html>
<?php
include('includes/footer.php'); 
?>