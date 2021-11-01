<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PHP 테스트</title>
  </head>
  <body>
    <?php
      if (isset($_POST["confirm"])) {
        print $_POST["onname"]."님으로부터의 메시지<BR><BR>";
        print "본문 :<BR>";
        print nl2br($_POST["bonmun"]);
      } elseif (isset($_POST["back"])) {
        #P166부터 다시해보자
      }
    ?>
  </body>
</html>
