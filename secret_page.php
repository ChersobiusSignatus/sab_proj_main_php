<?php require_once 'src/vendor/user.php';

if (isset($is_user_admin)) {
  header('Location: /admin.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Secret Page!</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="./src/css/style.css">
</head>

<body>
  <h1>You role can't access this page, you will be redirected to main page...</h1>
  <?php header('Refresh: 2; URL=/index.php'); ?>
</body>

</html>