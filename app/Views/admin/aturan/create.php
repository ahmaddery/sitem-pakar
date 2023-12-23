<!-- app/Views/aturan/create.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Aturan</title>
</head>
<body>
    <!-- Form tambah aturan baru -->
    <form action="<?= base_url('/aturan/store'); ?>" method="post">
        <label for="kondisi">Kondisi:</label>
        <textarea name="kondisi" id="kondisi" cols="30" rows="5" required></textarea><br>

        <label for="tipe_kepribadian">Tipe Kepribadian:</label>
        <input type="text" name="tipe_kepribadian" id="tipe_kepribadian" required><br>

        <button type="submit">Simpan</button>
    </form>

    <a href="<?= base_url('/aturan'); ?>">Kembali ke List Aturan</a>
</body>
</html>
