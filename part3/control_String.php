<?php
  $html = '<FONT size="3">Hello!</FONT><BR>';
  $search = 'size="3"';
  $replace = 'size="5"';
  $result = str_replace($search,$replace,$html);
  # str_replace(찾는내용, 바꿀내용, 대상값)으로 문자열 수정 가능

  $string = '<a href="http://www.namgarambooks.co.kr/">남가람북스</a>';
  $result = htmlspecialchars($string, ENT_QUOTES);
  # htmlspecialchars태그는 들어오는 데이터중 태그를 무효처리하여 XSS를 방지할 수 있다.
  # strip_tags(문자열, 허용할태그)

  $string = "PHP의 함수는
              정말 편리할 수 있다.";
  $result = nl2br($string);
  # nl2br은 문자열의 줄바꿈을 인식하여 자동으로 <BR>태그를 붙이는 기능

  $data = ["apple", "gul", "gam", "bam"];
  $result = implode(',', $data);
  $array = explode(',', $result);
  print "<PRE>";
  print_r($array);
  print "</PRE>";
  # implode는 배열을 문자열로 explode는 문자열을 배열로 만든다.



?>
