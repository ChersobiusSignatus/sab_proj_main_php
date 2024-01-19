<?php

require_once 'db/connect.php';

session_start();

$json = new JsonDB('/public/db/json_db.json');

$user_data = [
  "name" => $_POST['name'],
  "password" => $_POST['password'],
  "email" => $_POST['email'],
  "role" => $_POST['role']
];

$signup = new Signup($sources, $user_data);
$signup->signup();

class Signup
{
  private object $sources;
  private array $user_data;
  private int $selected_db;
  public function __construct(object $db, array $user_data)
  {
    $this->sources = $db;
    $this->user_data = $user_data;
    $this->selected_db = rand(0, count(get_object_vars($this->sources)) - 1);
  }

  public function signup(): void
  {
    if ($this->sources->{$this->selected_db}->add_user($this->user_data)) {
      $result = true;
    } else {
      $result = false;
    }

    $this->sendResponse($result);
  }

  private function sendResponse($result): void
  {
    echo json_encode(['status' => $result]);
  }
}
