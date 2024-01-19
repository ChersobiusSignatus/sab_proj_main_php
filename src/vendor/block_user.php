<?php

require_once './db/connect.php';

$id = intval($_GET['id']);
$method = $_GET['method'];

$block = new BlockUser($id, $sources);

if ($method === 'unblock') {
  $block->unblock();
}
$block->block();

class BlockUser
{
  private int $user_id;
  private object $db_sources;
  private int $counter;
  public function __construct(int $id, object $sources)
  {
    $this->user_id = $id;
    $this->db_sources = $sources;
    $this->counter = count(get_object_vars($this->db_sources));
  }

  public function unblock(): void
  {
    for ($i = 0; $i < $this->counter; $i++) {
      $result = $this->db_sources->{$i}->unblock_user($this->user_id);

      if ($result) {
        $this->sendResponse($result);
        $this->db_sources->{$i} = NULL;
        break;
      }
    }

    $this->sendResponse($result);
  }
  public function block(): void
  {
    for ($i = 0; $i < $this->counter; $i++) {
      $result = $this->db_sources->{$i}->block_user($this->user_id);

      if ($result) {
        $this->sendResponse($result);
        $this->db_sources->{$i} = NULL;
        break;
      }
    }

    $this->sendResponse($result);
  }

  private function sendResponse($result): void
  {
    if ($result) {
      echo json_encode(["status" => true,]);
      header('Location: /users.php');
      die();
    }
    header('Location: /users.php');
    echo json_encode(["status" => false,]);
    die();
  }
}
