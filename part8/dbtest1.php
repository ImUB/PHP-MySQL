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
      $mysqli = new mysqli('localhost', 'root', 'xpfks!123', 'sampledb');
      if ($mysqli->connect_error) {
        die('Connect Error:('.$mysqli->connect_errno.')'.$mysqli->connect_error);
      }
      print 'mysqli 클래스를 통해 접속이 성공하였습니다.';
      $mysqli->close();
     ?>

  </body>
</html>
