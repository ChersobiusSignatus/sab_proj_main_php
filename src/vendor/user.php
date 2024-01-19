<?php
session_start();

require_once "{$_SERVER['DOCUMENT_ROOT']}/src/vendor/db/connect.php";

$is_user = (isset($_SESSION['user']));
if ($is_user) {
  $is_user_blocked = ($_SESSION['user'][0]['is_blocked'] == 1);
  $is_user_admin = ($_SESSION['user'][0]['role'] == 'admin');
  $is_user_keks = ($_SESSION['user'][0]['role'] == 'keks');

  if ($is_user_blocked) header('Location: /blocked.php');
}

function get_users_from_dbs(object $sources)
{
  $array = [];
  for ($i = 0; $i < count(get_object_vars($sources)); $i++) {
    $array = array_merge($array, $sources->{$i}->get_all_users());
  }
  return $array;
}
