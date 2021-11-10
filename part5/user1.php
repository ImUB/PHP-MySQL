<?php
  $user = new User();
  $user->print_hello();
  class User{
    public $name = "철수";
    public function print_hello(){
      print $this->name;
      print "님 안녕하세요!";
    }
  }
  echo "<hr>";
  // 클래스와 인스턴스

  class Test{
    public $str1 = '변수공개';
    private $str2 = '비밀';

    public function TestPublic(){
      print '메소드공개<br>';
    }
    function TestNothing(){
      print '메소드선언없음<br>';
    }
    private function TestPrivate(){
      print '비밀<br>';
    }
  }
  $test = new Test();
  print $test->str1;
  print '<br>';
  // print $test->str2;
  // print '<br>'; private은 에러 처리로 인해 뒤에 있는 메소드 실행이 안됌

  $test->TestPublic();
  $test->TestNothing();
  $test->TestPrivate();
?>
