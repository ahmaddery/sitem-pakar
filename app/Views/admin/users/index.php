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
</head>
<body>
    <h1>User List</h1>

    <ul>
        <?php foreach ($users as $user): ?>
            <li>
                
                <?= $user['username'] ?> 

                 <?= $user['email'] ?>
                 <?= $user['created_at'] ?>
                 <?= $user['updated_at'] ?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>



<?php
    // Include other necessary scripts or stylesheets here
    include('includes/footer.php');

    ?>