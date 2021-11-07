<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta http-equiv="content-type" content="text/html"; charset="utf-8">
    <title>PHP 테스트</title>
  </head>
  <body>
    메일 수신:
    <?php
      $username = "dladbql1234@gmail.com";
      $passwd = "xpfks!123";
      $mailserver = "imap.gmail.com";
      $mailbox = imap_open("{".$mailserver.":993/imap/novalidate-cert/ssl}INBOX", $username, $passwd);
      if ($mailbox) {
        echo "mailbox 진입";
        $mails = imap_check($mailbox);
        $count = $mail->Nmsgs;
        if ($count >= 1) {
    ?>
      메일이 <?=$count?>건 있습니다.<br>
      <table border="1">
        <tr>
          <td>No</td>
          <td>제목</td>
          <td>날짜</td>
          <td>발신자</td>
          <td>크기</td>
        </tr>
        <?php
          for($num = 1; $num <= $count; $num ++) {
            $head = imap_header($mailbox, $num);
            $body = imap_body($mailbox, $num, FT_INTERNAL);
        ?>
        <tr>
          <td><?=$num?></td>
          <td nowrap><?=htmlspecialchars(mb_decode_mimeheader($head->subject))?></td>
          <td nowrap><?=$head->date?></td>
          <td nowrap><?=htmlspecialchars(mb_decode_mimeheader($head->fromaddress))?></td>
          <td nowrap><?=$head->Size?></td>
        </tr>
        <?php
          }
        ?>
      </table>
      <?php
        } else {
            ?>
            새로운 메일이 없습니다.<br>
            <?php
          }
          imap_close($mailbox);
        } else{
             ?>
             사용자명 또는 패스워드가 틀립니다.
           <?php }
           ?>
  </body>
</html>
