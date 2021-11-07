<?php
  $result = exec("ls");
  print 'exec로 출력: '.$result.'<BR>';
  # 마지막 행만 출력
  echo "<HR>";
  $files = system('ls -l');
  print "<br>";
  print 'system으로 출력: '.$files;
  # system함수 시작과 동시에 결과값 출력 및 $files에 값 저장
  echo "<HR>";
  $ls = `ls -l /etc`;
  print $ls;
  echo "<hr>";
  ?>
