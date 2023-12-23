
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kepribadian</title>
</head>
<body>

    <h1>Daftar Kepribadian</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID Kepribadian</th>
                <th>Kode</th>
                <th>Kepribadian</th>
                <th>Tipe Kepribadian</th>
                <th>Keterangan</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($kepribadian as $item) : ?>
                <tr>
                    <td><?= $item['IDKepribadian']; ?></td>
                    <td><?= $item['Kode']; ?></td>
                    <td><?= $item['Kepribadian']; ?></td>
                    <td><?= $item['TipeKepribadian']; ?></td>
                    <td><?= $item['Keterangan']; ?></td>
                    <td><?= $item['Deskripsi']; ?></td>
                    <td>
                        <a href="/admin/kepribadian/form_edit/<?= $item['IDKepribadian']; ?>">Edit</a>
                        <a href="/admin/kepribadian/delete/<?= $item['IDKepribadian']; ?>">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="/admin/kepribadian/form_create">Tambah Kepribadian</a>

</body>
</html>
