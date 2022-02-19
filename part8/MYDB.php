<?php
  function db_connect()
  {
    $db_user = "root";
    $db_pass = "xpfks!123";
    $db_host = "localhost";
    $db_name = "sampledb";
    $db_type = "mysql";
    $dsn = "$db_type:host=$db_host; dbname=$db_name; charset=utf8";
    try {
      $pdo = new PDO($dsn, $db_user, $db_pass);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch (PDOException $Exception) {
      die('오류:'.$Exception->getMessage());
    }
    return $pdo;
  }

  function id_reset()
  {
    $query = "ALTER TABLE member AUTO_INCREMENT=1";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
  }
 ?>
