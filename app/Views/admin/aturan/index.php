<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Aturan</title>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include DataTables CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.js"></script>

    <?php
    // Include other necessary scripts or stylesheets here
    include('includes/header.php');
    include('includes/navbar.php');
    include('includes/scripts.php');
    ?>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            overflow-x: auto;
        }

        h1 {
            color: #3498db;
            margin-bottom: 20px;
            font-size: 2em;
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
            background-color: #f2f2f2;
            color: #555;
            font-weight: bold;
        }

        a {
            text-decoration: none;
            color: #3498db;
            transition: color 0.3s;
        }

        a:hover {
            color: #1f618d;
        }

        .pagination {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .paginate_button {
            padding: 8px 12px;
            margin: 0 5px;
            background-color: #3498db;
            color: #fff;
            border: 1px solid #3498db;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .paginate_button.active {
            background-color: #2980b9;
        }

        .paginate_button:hover {
            background-color: #1f618d;
        }

        .add-rule-link {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #27ae60;
            color: #fff;
            text-decoration: none;
            border-radius: 3px;
            transition: background-color 0.3s;
        }

        .add-rule-link:hover {
            background-color: #219451;
        }

        .pagination-list {
            list-style: none;
            display: flex;
            padding: 0;
            margin: 0;
        }

        .pagination-list-item {
            margin: 0 5px;
            font-size: 1.2em;
            color: #555;
            cursor: pointer;
            transition: color 0.3s;
        }

        .pagination-list-item.active {
            color: #3498db;
        }

        @media screen and (max-width: 600px) {
            th, td {
                display: block;
                width: 100%;
                box-sizing: border-box;
            }

            th {
                text-align: center;
            }

            td {
                text-align: center;
            }

            td a {
                display: block;
                padding: 10px;
                margin-bottom: 5px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>List Aturan</h1>

        <table id="dataTable">
            <thead>
                <tr>
                    <th>ID Aturan</th>
                    <th>Kondisi</th>
                    <th>Tipe Kepribadian</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($aturan as $rule): ?>
                    <tr>
                        <td><?= $rule['IDAturan']; ?></td>
                        <td><?= $rule['Kondisi']; ?></td>
                        <td><?= $rule['TipeKepribadian']; ?></td>
                        <td>
                        <a href="#" class="detail-link" data-id="<?= $rule['IDAturan']; ?>" data-kondisi="<?= $rule['Kondisi']; ?>" data-kepribadian="<?= $rule['TipeKepribadian']; ?>">Detail</a>
                        <a href="#" class="edit-link" data-id="<?= $rule['IDAturan']; ?>">Edit</a>

<!-- Tambahkan modal container di akhir body -->
<div id="editModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeEditModal()">&times;</span>
        <div id="modalContent"></div>
    </div>
</div>

<!-- Tambahkan script jQuery dan script untuk menangani pop-up edit -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.edit-link').click(function() {
            var id = $(this).data('id');

            // Load content from edit.php into the modal
            $.ajax({
                type: 'GET',
                url: '<?= base_url('/aturan/edit/') ?>' + id,
                success: function(response) {
                    $('#modalContent').html(response);
                    $('#editModal').show();
                }
            });
        });
    });

    function closeEditModal() {
        $('#editModal').hide();
    }
</script>

                        
                            <a href="<?= base_url('/aturan/delete/' . $rule['IDAturan']); ?>" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="pagination">
            <ul class="pagination-list">
                <?php echo $pager->links(); // Display pagination links ?>
            </ul>
        </div>

        <a href="<?= base_url('/aturan/create'); ?>" class="add-rule-link">Tambah Aturan Baru</a>
    </div>

    <?php include('includes/footer.php'); ?>


    

    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable({
                "pageLength": 5,
                "lengthMenu": [5, 10, 25, 50, 75, 100],
                "pagingType": "full_numbers",
                "order": [[0, 'asc']]
            });
        });
    </script>
    
</body>
</html>


   <!-- pop up halaman detail  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Aturan</title>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
    /* Add your own modal styles here */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
        background-color: #fefefe;
        margin: 10% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    .modal-header {
        border-bottom: 1px solid #ddd;
        padding-bottom: 10px;
        margin-bottom: 10px;
        text-align: center;
    }

    .modal-header h1 {
        margin: 0;
        font-size: 24px;
        color: #333;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
    }

    .modal-content p {
        margin-bottom: 10px;
        font-size: 16px;
        color: #555;
    }

    .modal-content a {
        display: block;
        text-align: center;
        margin-top: 20px;
        padding: 10px;
        background-color: #007BFF;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
    }

    .modal-content a:hover {
        background-color: #0056b3;
    }
</style>

</head>
<body>
    <!-- Add a modal container to the main page -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <!-- The rest of your modal content -->
            <h1>Detail Aturan</h1>
            <p>IDAturan: <span id="modalId"></span></p>
            <p>Kondisi: <span id="modalKondisi"></span></p>
            <p>Tipe Kepribadian: <span id="modalKepribadian"></span></p>
            <a href="<?= base_url('/admin/aturan'); ?>">Kembali ke List Aturan</a>
        </div>
    </div>



    <!-- Add this script at the end of your body or in a separate file -->
    <script>
        // Get the modal
        var modal = document.getElementById('myModal');

        // When the user clicks on the link, open the modal
        $('.detail-link').click(function() {
            var id = $(this).data('id');
            var kondisi = $(this).data('kondisi');
            var kepribadian = $(this).data('kepribadian');

            // Set the modal content
            $('#modalId').text(id);
            $('#modalKondisi').text(kondisi);
            $('#modalKepribadian').text(kepribadian);

            modal.style.display = "block";
        });

        // Function to close the modal
        function closeModal() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                closeModal();
            }
        }
    </script>
</body>
</html>
