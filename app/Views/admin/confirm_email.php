<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Email</title>
</head>
<body>
    <h1>Confirm Email</h1>
    <p>Selected users:</p>

    <ul>
        <?php foreach ($selectedUsers as $email): ?>
            <li><?= $email ?></li>
        <?php endforeach; ?>
    </ul>

    <form action="<?= base_url('admin/sendEmail') ?>" method="post">
        <input type="hidden" name="selected_users" value="<?= implode(',', $selectedUsers) ?>">

        <label for="subject">Subject:</label>
        <input type="text" name="subject" value="<?= $subject ?>"><br>

        <label for="message">Message:</label>
        <textarea name="message"><?= $message ?></textarea><br>

        <button type="submit">Send Emails</button>
    </form>
</body>
</html>
