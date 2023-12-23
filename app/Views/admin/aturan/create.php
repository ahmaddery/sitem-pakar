<!-- app/Views/aturan/create.php -->
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
    <title>Tambah Aturan</title>
    <style>

        h1 {
            color: #333;
            text-align: center;
        }
        #form-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin-top: 20px;
            margin-left: 350px;
            margin-bottom: 10px;
            text-align: center;
            justify-content: center;
        }
        

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        a {
            color: #4CAF50;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
        }

        a:hover {
            color: #45a049;
        }
    </style>
</head>
<body>
<h1>Form Tambah Aturan</h1>
    <!-- Form tambah aturan baru -->
    <div id="form-container">
    <form action="<?= base_url('/aturan/store'); ?>" method="post">
        <label for="kondisi">Kondisi:</label>
        <textarea name="kondisi" id="kondisi" cols="30" rows="5" required></textarea><br>

        <label for="tipe_kepribadian">Tipe Kepribadian:</label>
        <input type="text" name="tipe_kepribadian" id="tipe_kepribadian" required><br>

        <button type="submit">Simpan</button>
    </form>
    </div>

    <a href="<?= base_url('admin/aturan'); ?>">Kembali ke List Aturan</a>
</body>
</html>
