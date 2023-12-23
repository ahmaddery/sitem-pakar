
<?php include('template.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>

    <!-- Import the Poppins font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            text-align: center;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 600px;
        }

        h1 {
            color: #007bff;
            margin-bottom: 20px;
        }

        p {
            margin: 10px 0;
            font-size: 18px;
            line-height: 1.5;
        }

        a.btn {
            display: inline-block;
            padding: 12px 24px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
            transition: background-color 0.3s ease-in-out;
        }

        a.btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Jawaban Telah dikirim</h1>
        <p>Terimakasih <?= $user['username'] ?> telah melakukan Tes Kepribadian MBTI kepada kami</p>
        <p>Kami telah mengirimkan hasil Tes Kepribadian Anda kedalam e-mail Anda</p>
        <p>Mohon segera cek e-mail untuk mengetahui hasil Tes Kepribadian Anda</p>
    </div>
</body>
</html>
