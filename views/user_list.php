<?php

$userlist = $GLOBALS['userlist'];

?>
<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
    <link rel="stylesheet" href="resources\css\style.css">
</head>
<body>
    <h1 class="title">Users</h1>
    <table>
        <tr>
            <th>Account Number</th>
            <th>Username</th>
            <th>Email</th>
            <th>Creation Date</th>
        </tr>
        <?php foreach ($userlist as $user): ?>
        <tr>
            <td><?= $user['account_number'] ?></td>
            <td><?= $user['username'] ?></td>
            <td><?= $user['email'] ?></td>
            <td><?= $user['created_at'] ?></td>
            <td><a class="button button-portfolio" href="portfolio.php?account_number=<?= $user['account_number']?>">See Portfolio</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>