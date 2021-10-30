<?php
  $to = "dladbql1234@gmail.com";
  $subject = "발송 테스트";
  $message = "현재 메일 테스트 중입니다.";
  $add_header = "From: dladbql1234@gmail.com\r\nCc: dladbql1234@gmail.com";

  if(mb_send_mail($to, $subject, $message, $add_header)){
    print "메일을 발송하였습니다1.";} else {
      print "메일 발송에 실패하였습니다.";
    }?>
