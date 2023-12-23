<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Aturan</title>
   
</head>
<body>
    <!-- Edit mode content -->
    <div class="container">
        <form action="<?= base_url('/aturan/update/' . $aturan['IDAturan']); ?>" method="post">
            <label for="kondisi">Kondisi:</label>
            <textarea name="kondisi" id="kondisi" cols="30" rows="5" required><?= $aturan['Kondisi']; ?></textarea>

            <label for="tipe_kepribadian">Tipe Kepribadian:</label>
            <input type="text" name="tipe_kepribadian" id="tipe_kepribadian" value="<?= $aturan['TipeKepribadian']; ?>" required>

            <button type="submit">Update</button>
        </form>

        <a href="<?= base_url('admin/aturan'); ?>">Kembali ke List Aturan</a>
    </div>

    <script>
        // Auto-close the modal after submitting the form
        $('form').submit(function() {
            closeEditModal();
        });
    </script>
</body>
</html>
