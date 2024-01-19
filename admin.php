<?php

require_once './src/vendor/user.php';

if (!$is_user_admin) {
  header('Location: /secret_page.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="./src/css/style.css">

  <title>admin</title>
    <style>
        body {
            background-color: #b7eefe;
        }
    </style>
</head>

<body>
  <h1 style="color: darkgoldenrod">｡°(°.◜ᯅ◝°)°｡ This is totally secret page! ૮(˶╥︿╥)ა</h1>
  <a style="color: deeppink" href="/">go back</a>
</body>
<footer>
    <img style="width: 1500px; height: 800px; position: absolute; bottom: 0; left: 12%" src="src/img/walk.gif" alt="walk photo">
</footer>

</html>