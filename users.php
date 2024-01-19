<?php

require_once './src/vendor/user.php';
require_once './src/vendor/db/connect.php';

$users_array = get_users_from_dbs($sources);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Users</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="./src/css/style.css">
    <style>
        body {
            background-image: url("src/img/snow_glitter.gif");
            background-repeat: repeat;
        }
    </style>
</head>

<body>
  <?php require_once './src/vendor/page_pieces/header.php'; ?>

  <main>
    <h2>List of all users</h2>
    <ul>
      <?php foreach ($users_array as $user) : ?>
        <li>
          <h3><?= $user['name'] ?></h3>
          <p><strong>Role:</strong> <?= $user['role'] ?></p>
          <p><strong>Email:</strong> <?= $user['email'] ?></p>
          <?php if (isset($is_user_admin)) {
            if ($user['is_blocked']) { ?>
              <a style="color: #7a013b" href="src/vendor/block_user.php/?id=<?= $user['id'] ?>&method=unblock">Unblock user</a>
            <?php } else { ?>
              <a style="color: deeppink" href="src/vendor/block_user.php/?id=<?= $user['id'] ?>&method=block">Block user</a>
          <?php }
          } ?>
        </li>
      <?php endforeach; ?>
    </ul>
  </main>

  <?php require_once './src/vendor/page_pieces/dialogs.php'; ?>

  <script src="./src/js/listener.js"></script>
  <script src="./src/js/main.js"></script>
</body>

</html>