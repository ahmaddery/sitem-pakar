<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Email Page</title>
</head>
<body>
    <h1>Send Email Page</h1>
    <p>Select users to send emails:</p>

    <form action="<?= base_url('admin/confirm_Email') ?>" method="post">
        <?php foreach ($users as $user): ?>
            <label>
                <input type="checkbox" name="selected_users[]" value="<?= $user['email'] ?>">
                <?= $user['username'] ?> (<?= $user['email'] ?>)
            </label><br>
        <?php endforeach; ?>

        <button type="submit">Next</button>
    </form>
</body>
</html>
