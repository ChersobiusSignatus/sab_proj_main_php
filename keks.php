<?php

require_once './src/vendor/user.php';

if (!$is_user) header('Location: /secret_page.php');
if ($is_user_keks || $is_user_admin) {} else  header('Location: /secret_page.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="./src/css/style.css">
    <style>
        body {
            background-image: url("src/img/5shine.gif");
            background-repeat: repeat;
        }
    </style>
</head>

<body>
  <img style="margin: 0 auto; display:block;" src="/src/img/keks.png" alt="keks photo">
  <a style="color: deeppink" href="/">go back</a>
</body>

</html>