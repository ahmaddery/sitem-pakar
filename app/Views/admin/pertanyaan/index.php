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
    <title>Daftar Pertanyaan</title>
</head>
<body>

    <h1>Daftar Pertanyaan</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID Pertanyaan</th>
                <th>Pertanyaan Text</th>
                <th>Kategori</th>
                <th>Bobot</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pertanyaan as $item) : ?>
                <tr>
                    <td><?= $item['IDPertanyaan']; ?></td>
                    <td><?= $item['PertanyaanText']; ?></td>
                    <td><?= $item['Kategori']; ?></td>
                    <td><?= $item['Bobot']; ?></td>
                    <td>
                        <a href="/admin/pertanyaan/form_edit/<?= $item['IDPertanyaan']; ?>">Edit</a>
                        <a href="/admin/pertanyaan/delete/<?= $item['IDPertanyaan']; ?>">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="/admin/pertanyaan/form_create">Tambah Pertanyaan</a>

</body>
</html>

<?php
include('includes/footer.php'); 
?>