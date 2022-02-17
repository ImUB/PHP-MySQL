<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PHP 테스트</title>
  </head>
  <body>
    <?php
    $db_user = 'root';
    $db_pass = 'xpfks!123';
    $db_host = 'localhost';
    $db_name = 'sampledb';
    $db_type = 'mysql';
    $dsn = "$db_type:host=$db_host; db_name=$db_name";

    try {
      $pdo = new PDO($dsn, $db_user, $db_pass);
      $pdo->exec("SET NAMES utf8");
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
      print '접속하였습니다.<br>';
    } catch (PDOException $Exception) {
      die('접속 오류'.$Exception->getMessage());
    }
    try {
      $pdo->beginTransaction();
      $sql = "INSERT INTO sampledb.member (last_name, first_name, age) VALUES ( :last_name, :first_name, :age)";
      $stmh = $pdo->prepare($sql);
      $stmh->bindValue(':last_name', $_POST['last_name'],PDO::PARAM_STR);
      $stmh->bindValue(':first_name', $_POST['first_name'],PDO::PARAM_STR);
      $stmh->bindValue(':age', $_POST['age'], PDO::PARAM_STR);
      $stmh->execute();
      $pdo->commit();
      print "데이터를 ".$stmh->rowCount()."건 입력하였습니다.<br>";
    } catch (PDOException $Exception) {
      $pdo->rollBack();
      print "오류:".$Exception->getMessage();
    }
      ?>
  </body>
</html>
