<?php include('include/template.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        h1 {
            text-align: center;
            color: #007bff;
            margin-bottom: 30px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #495057;
            font-weight: bold;
        }

        input,
        select {
            width: 100%;
            padding: 12px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ced4da;
            border-radius: 6px;
            transition: border-color 0.3s ease-in-out;
            font-size: 16px;
        }

        select {
            appearance: none;
            background-image: linear-gradient(45deg, transparent 50%, #007bff 50%),
                              linear-gradient(135deg, #007bff 50%, transparent 50%);
            background-position: calc(100% - 18px) calc(1em + 2px),
                                 calc(100% - 13px) calc(1em + 2px);
            background-size: 5px 5px, 5px 5px;
            background-repeat: no-repeat;
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: #007bff;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
            border: none;
            padding: 14px;
            border-radius: 6px;
            font-size: 18px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <?= form_open('/user/update-profile') ?>
        <h1>Edit Profile</h1>

        <label for="usia">Usia:</label>
        <input type="text" name="usia" value="<?= isset($user['usia']) ? $user['usia'] : '' ?>" placeholder="Masukkan usia Anda">

        <label for="gender">Gender:</label>
        <select name="gender">
            <option value="laki-laki" <?= isset($user['gender']) && $user['gender'] === 'laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
            <option value="perempuan" <?= isset($user['gender']) && $user['gender'] === 'perempuan' ? 'selected' : '' ?>>Perempuan</option>
        </select>

        <input type="submit" value="Update Profile">
    <?= form_close() ?>

</body>
</html>
