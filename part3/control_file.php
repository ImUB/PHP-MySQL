<?php
  $filename = "test.txt";
  $contents = "abcdefg";
  file_put_contents($filename, $contents);
  print "기록하였습니다. <BR>";

  if(is_readable($filename)){
    $contents = file_get_contents($filename);
    print $contents."<BR>";
  } else {
    print $filename."는 읽어들일 수 없습니다";
  }

  if(is_file($filename) && unlink($filename)){
    print $filename."를 삭제하였습니다.<BR>";
  } else {
    print $filename."는 삭제 할 수 없습니다.<BR>";
  }

  if(is_file($filename) && copy($filename, "test.bak")){
    print "복사에 성공하였습니다.<BR>";
  }else {
    print "복사할 수 없습니다.<BR>";
  }

  $dirname = "temp";
  if(!is_dir($dirname) && mkdir($dirname)){
    print $dirname."를 만들었습니다.";
  }else {
    rmdir($dirname);
    print $dirname."를 삭제했습니다.";
  }
  # 파일 쓰기, 읽기, 삭제, 복사, 디렉토리 작성, 삭제
?>
