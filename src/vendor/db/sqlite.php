<?php

class SqliteDB
{
  private object $pdo;
  public function __construct(string $db = "/public/db/main_db.db")
  {
    try {
      $this->pdo = new PDO("sqlite:" . $_SERVER['DOCUMENT_ROOT'] . $db);
    } catch (PDOException $th) {
      die($th);
    }
  }

  public function find_user(string $email = null, string $password = null, int $id = null): bool|array
  {
    if (isset($id)) {
      $query = $this->pdo->prepare("SELECT * FROM `users` WHERE `id` = ?");
      $query->execute([$id]);
      $query = $query->fetch(PDO::FETCH_ASSOC);
      return $query;
    }
    $query = $this->pdo->prepare("SELECT * FROM `users` WHERE `email` = ? AND `password` = ?");
    $query->execute([$email, $password]);
    $query = $query->fetch(PDO::FETCH_ASSOC);
    return $query;
  }

  public function block_user(int $id): bool
  {
    $is_user = $this->find_user(id: $id);
    if (!$is_user) return false;
    $query = $this->pdo->prepare("UPDATE `users` SET `is_blocked` = 1 WHERE id = ?");
    $query = $query->execute([$id]);
    return $query;
  }

  public function unblock_user(int $id): bool
  {
    $is_user = $this->find_user(id: $id);
    if (!$is_user) return false;
    $query = $this->pdo->prepare("UPDATE users SET is_blocked = 0 WHERE id = ?");
    $query = $query->execute([$id]);
    return $query;
  }


  public function get_all_users(): bool|array
  {
    $query = $this->pdo->query("SELECT * FROM `users`");
    $query = $query->fetchAll(PDO::FETCH_ASSOC);
    return $query;
  }

  public function add_user($user_data): bool
  {
    $query = $this->pdo->prepare("INSERT INTO `users` VALUES(?, ?, ?, ?, ?, ?)");
    $query->execute([time(), $user_data['name'], $user_data['password'], $user_data['email'], $user_data['role'], 0]);
    return $query;
  }
}
