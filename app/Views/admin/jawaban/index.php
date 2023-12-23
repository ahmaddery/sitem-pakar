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
    <title>Daftar Jawaban</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            // Event listener for the filter button
            $('#filterBtn').on('click', function (e) {
                e.preventDefault();
                filterData();
            });

            // Function to handle filtering
            function filterData() {
                var idPengguna = $('#idPengguna').val();
                var idPertanyaan = $('#idPertanyaan').val();

                // You can customize the URL based on your routes
                var url = '<?= base_url('/admin/jawaban') ?>';

                // Append filters to the URL if they are not empty
                var filters = [];

                if (idPengguna !== '') {
                    filters.push('idPengguna=' + idPengguna);
                }

                if (idPertanyaan !== '') {
                    filters.push('idPertanyaan=' + idPertanyaan);
                }

                if (filters.length > 0) {
                    url += '?' + filters.join('&');
                }

                window.location.href = url;
            }
        });
    </script>
</head>

<body>
    <div class="container mt-4">
        <h2>Daftar Jawaban</h2>

        <form class="mb-3">
            <div class="row">
                <div class="col-md-3">
                    <div class="input-group">
                        <input type="text" class="form-control" id="idPengguna" placeholder="ID Pengguna">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="input-group">
                        <input type="text" class="form-control" id="idPertanyaan" placeholder="ID Pertanyaan">
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-primary" id="filterBtn">Filter</button>
                </div>
            </div>
        </form>

        <?php if (empty($jawaban)) : ?>
            <p>Tidak ada jawaban.</p>
        <?php else : ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ID Pengguna</th>
                        <th>ID Pertanyaan</th>
                        <th>Jawaban Pengguna</th>
                        <th>Waktu Jawaban</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($jawaban as $row) : ?>
                        <tr>
                            <td><?= $row['IDJawaban'] ?></td>
                            <td><?= $row['IDPengguna'] ?></td>
                            <td><?= $row['IDPertanyaan'] ?></td>
                            <td><?= $row['JawabanPengguna'] ?></td>
                            <td><?= $row['WaktuJawaban'] ?></td>
                            <td>
                                <a href="<?= base_url('/admin/jawaban/delete/' . $row['IDJawaban']) ?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>


<?php
    // Include other necessary scripts or stylesheets here
    include('includes/footer.php');

    ?>