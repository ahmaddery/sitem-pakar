<!-- app/Views/user/pertanyaan.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pertanyaan</title>
</head>
<body>

    <h1>Daftar Pertanyaan</h1>

    <form action="/users/jawab" method="post" id="jawabanForm">
    <table border="1">
        <thead>
            <tr>
                <th>ID Pertanyaan</th>
                <th>Pertanyaan Text</th>
                <th>Kategori</th>
                <th>Bobot</th>
                <th>Jawaban</th>
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
                        <input type="radio" name="jawaban[<?= $item['IDPertanyaan']; ?>]" value="ya"> Ya
                        <input type="radio" name="jawaban[<?= $item['IDPertanyaan']; ?>]" value="tidak"> Tidak
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <button type="submit">Kirim Jawaban</button>
    </form>

    <script>
        // Log user's answers to the web console on form submission
        document.getElementById('jawabanForm').addEventListener('submit', function(event) {
            var userAnswers = <?= json_encode($_POST['jawaban'] ?? null, JSON_PRETTY_PRINT) ?>;
            console.log('User Answers:', userAnswers);
        });
    </script>

</body>
</html>
