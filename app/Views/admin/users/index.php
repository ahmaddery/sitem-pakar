<?php
    // Include other necessary scripts or stylesheets here
    include('includes/header.php');
    include('includes/navbar.php');
    include('includes/scripts.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <style>
        /* styles.css */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
            color: #333; /* Default text color */
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        h1 {
            text-align: center;
        }

        .container {
            width: 80%;
            margin: 0 auto; /* Center the container */
        }

        .table-container {
            border: 1px solid #ddd; /* Border around the table container */
            border-radius: 8px;
            overflow: hidden; /* Hide overflow content (e.g., box-shadow) */
            margin-top: 20px; /* Add margin to separate from header */
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 15px;
            text-align: center; /* Center-align text in table cells */
            border-bottom: 1px solid #ddd;
        }

        .user-item:hover {
            background-color: #f0f0f0; /* Change background color on hover */
        }

        /* Add responsive design for better mobile experience */
        @media (max-width: 600px) {
            .container {
                width: 90%;
            }
            
            th, td {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <!-- Main container for the content -->
    <div class="container">
        <h1>Daftar User</h1>

        <!-- Container for the table with border and border-radius -->
        <div class="table-container">
            <!-- User data displayed in a table -->
            <table>
                <thead>
                    <!-- Table header with column names -->
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Dibuat Pada</th>
                        <th>Diedit Pada</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Loop through user data to create rows in the table -->
                    <?php foreach ($users as $user): ?>
                        <tr class="user-item">
                            <!-- Display individual user data in table cells -->
                            <td><?= $user['username'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td><?= $user['created_at'] ?></td>
                            <td><?= $user['updated_at'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php
        // Include other necessary scripts or stylesheets here
        include('includes/footer.php');
    ?>
</body>
</html>