<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>Trait 테스트</title>
  </head>
  <body bgcolor="#000000" text="#FFFFFF">
    <font size="4">Trait 테스트</font>
    <br><br>
    <?php
      trait SayMorning{
        public function print_Morning() {
          print $this->name;
          print "님, 안녕하세요!<br>";
        }
      }
      class User{
        private $name = null;
        public function print_hello(){
          print $this->name;
          print "님, 반갑습니다!<br>";
        }
      }
      class Guest extends User{
        use SayMorning;
        private $name = "게스트";
        public function print_hello(){
          print $this->name;
          print '님, 첨 뵙겠습니다!<br>';
        }
      }
      $newuser = new Guest();
      $newuser->print_hello();
      $newuser->print_Morning();
    ?>
  </body>
</html>
