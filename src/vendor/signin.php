<?php

require_once 'db/connect.php';

session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$signin = new Signin($email, $password, $sources);
$signin->signin();

class SignIn
{
  private Object $db_sources;
  private string $email;
  private string $password;
  private int $counter;
  public function __construct(string $email, string $password, object $db_sources)
  {
    $this->email = $email;
    $this->password = $password;
    $this->db_sources = $db_sources;
    $this->counter = count(get_object_vars($this->db_sources));
  }

  private function sendResponse($result): void
  {
    if ($result) {

      $_SESSION["user"] = [$result];

      die(json_encode(
        [
          "status" => true,
        ]
      ));
    }

    die(json_encode(
      [
        "status" => false,
      ]
    ));
  }

  public function signin(): void
  {
    for ($i = 0; $i < $this->counter; $i++) {
      $user_data = $this->db_sources->{$i}->find_user($this->email, $this->password);
      if ($user_data) {
        $this->sendResponse($user_data);
        $this->db_sources->{$i} = NULL;
        break;
      }
    }

    $this->sendResponse($user_data);
  }
}
