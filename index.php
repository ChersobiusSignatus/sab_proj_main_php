<?php require_once 'src/vendor/user.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="./src/css/style.css">
    <style>
        body {
            background-image: url("src/img/stars-glitter.gif");
            background-repeat: repeat;
        }
    </style>
</head>
<body>
  <?php require_once './src/vendor/page_pieces/header.php'; ?>
  <?php require_once './src/vendor/page_pieces/dialogs.php'; ?>

  <h2>some home stuff...</h2>
  <img src="src/img/cute-kitten-cute-kitty.gif" alt="cute kitten">

  <script src="./src/js/listener.js"></script>
  <script src="./src/js/main.js"></script>
</body>



</html>