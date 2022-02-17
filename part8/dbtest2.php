<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>php-db 테스트</title>
    <title></title>
  </head>
  <body>
    <h1>DB 테스트</h1>
    <?php
    try {
      $pdo = new PDO('mysql:host=localhost; dbname=sampledb', 'root', 'xpfks!123');
      $pdo->exec("SET NAMES utf8");
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
      print 'PDO 클래스를 통해 접속이 성공하였습니다.';
    } catch (PDOException $Exception) {
      die('접속 오류'.$Exception->getMessage());
    }
     ?>

  </body>
</html>
