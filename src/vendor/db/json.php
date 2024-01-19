<?php

class JsonDB
{
  private array $db;
  private string $db_path;
  public function __construct(string $json_file = '/public/db/alt_db.json')
  {
    $this->db_path = $_SERVER['DOCUMENT_ROOT'] . $json_file;
    $this->db = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . $json_file), true);
  }

  public function block_user(int $id): bool
  {
    $index = $this->findIndexAssoc($this->db['users'], $id, 'id');
    if ($index === false) {
      return false;
    }
    $new_db = $this->db;
    $new_db['users'][$index]['is_blocked'] = 1;

    $this->rewriteDB($new_db);
    return true;
  }

  public function unblock_user(int $id): bool
  {
    $index = $this->findIndexAssoc($this->db['users'], $id, 'id');
    if ($index === false) {
      return false;
    }
    $new_db = $this->db;
    $new_db['users'][$index]['is_blocked'] = 0;

    $this->rewriteDB($new_db);
    return true;
  }

  public function find_user(string $email, string $password): bool|array
  {
    $foundEmail = $this->findIndexAssoc($this->db['users'], $email, 'email');
    $foundPassword = $this->findIndexAssoc($this->db['users'], $password, 'password');

    if ($foundEmail === $foundPassword && $foundEmail !== false) {
      return $this->db['users'][$foundEmail];
    }
    return false;
  }

  public function get_all_users(): bool|array
  {
    return $this->db['users'];
  }

  public function add_user(array $user_data): bool
  {
    $new_db = $this->db;
    $new_db['users'][] = [
      'id' => time(),
      'name' => $user_data['name'],
      'password' => $user_data['password'],
      'email' => $user_data['email'],
      'is_blocked' => 0,
      'role' => $user_data['role']
    ];;

    if ($this->rewriteDB($new_db)) {
      return true;
    }
    return false;
  }

  private function rewriteDB(array $new_db): bool
  {
    return file_put_contents($this->db_path, json_encode($new_db));
  }

  private function findIndexAssoc(array $array, string|int $value, string $key): bool|int
  {
    $index = 0;

    for ($i = 0; $i < count($array); $i++) {
      for ($b = 0; $b < count($array[$index]); $b++) {
        if ($value === $array[$index][$key]) {
          return $index;
        }
      }

      $index += 1;
    }
    return false;
  }
}
