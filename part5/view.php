<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>클래스 테스트</title>
  </head>
  <body bgcolor="#000000" text="#FFFFFF">
    <font size="4">클래스 테스트</font>
    <br><br>
    <?php
      class User{
        private $name = null;
        public function print_hello() {
          print $this->name;
          print "님, 안녕하세요!<br>";
        }
      }
      class Guest extends User{
        private $name = "게스트";
        public function print_hello(){
          print $this->name;
          print "님, 반갑습니다!<br>";
        }
      }
      $newuser = new Guest();
      $newuser->print_hello();
    ?>
  </body>
</html>
