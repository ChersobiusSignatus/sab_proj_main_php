<?php

require_once "{$_SERVER['DOCUMENT_ROOT']}/src/vendor/db/sqlite.php";
require_once "{$_SERVER['DOCUMENT_ROOT']}/src/vendor/db/json.php";

$sources = (object)[
  new SqliteDB('/public/db/test_db.db'),
  new JsonDB('/public/db/json_db.json'),
  new SqliteDB(),
  new JsonDB()
];