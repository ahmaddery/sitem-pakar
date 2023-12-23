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
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .add-button {
            border: 1px solid #4CAF50;
            padding: 10px 15px;
            text-decoration: none;
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            margin-top: 20px;
            border-radius: 5px;
        }

        .add-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <h1>Daftar Pertanyaan</h1>

    <table>
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
                        <a href="/admin/pertanyaan/form_edit/<?= $item['IDPertanyaan']; ?>" class="edit-link">Edit</a>
                        <a href="/admin/pertanyaan/delete/<?= $item['IDPertanyaan']; ?>" class="delete-link">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a class="add-button" href="/admin/pertanyaan/form_create">Tambah Pertanyaan</a>

</body>
</html>

<?php
include('includes/footer.php'); 
?>
