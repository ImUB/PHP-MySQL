<?php
  session_start();
  $_SESSION["onname"] = $_POST["onname"];
  $_SESSION["bonmun"] = $_POST["bonmun"];
  if(isset($_POST["user_id"])){
    $_SESSION["user_id"] = $_POST["user_id"];
  }?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PHP 테스트</title>
  </head>
  <body>
    확인 화면<BR><BR>
    <form name="form1" action="view.php" method="post">
      <?php
      print "이름:";
      print $_POST["onname"]."<BR>";
      if (isset($_POST["gender"])) {
        print "성별: ".$_POST["gender"]."<BR>";
      } else {
        print "성별을 선택하세요.<BR>";
      }
      if ($_POST["prefecture"] != ""){
        print "사는 곳: ".$_POST["prefecture"]."<BR>";
      } else {
        print "사는 곳을 선택해주세요.<BR>";
      }
      if (isset($_POST["hobby"])) {
        $last_key = end($_POST["hobby"]);
        print "저의 취미는 ";
        foreach ($_POST["hobby"] as $hobby) {
          if ($hobby != $last_key) {
            print $hobby.",";
          } else {
            print $hobby."<BR>";
          }
          echo '<input type="hidden" name="bobby[]" value="'.$hobby.'">';
          #hidden으로 배열을 넘기려면 배열자체를 넘기는게 아니라 하나하나 잘라서 보내야됌
        }
      } else {
        print "저의 취미는 없습니다.<BR><BR>";
      }
      print "본문 :<BR>";
      print nl2br($_POST["bonmun"])."<BR>";

      $file_dir = '/Library/WebServer/Documents/images/';
      $file_path = $file_dir.$_FILES["uploadfile"]["name"];
      // $file_path = $_SERVER["DOCUMENT_ROOT"]."/".$_FILES["uploadfile"]["name"];
      // echo "파일 이름 :".$_FILES["uploadfile"]["name"]."<br>";
      // echo "파일 크기 :".$_FILES["uploadfile"]["size"]."<br>";
      // echo "파일 타입 :".$_FILES["uploadfile"]["type"]."<br>";
      // echo "파일 에러 :".$_FILES["uploadfile"]["error"]."<br>";
      // echo "임시 파일 :".$_FILES["uploadfile"]["tmp_name"]."<br>";
      // echo "파일 경로 :".$file_path."<br>\n";
      // echo "<BR>";
      if(move_uploaded_file($_FILES["uploadfile"]["tmp_name"],$file_path)){
        $img_path = "/images/".$_FILES["uploadfile"]["name"];
        $size = getimagesize($file_path);
        // echo $img_path."<BR>";
      ?>
      <IMG src="<?=$img_path?>" <?=$size[3]?>><BR>
      <b><?=$_POST["comment"]?></b><BR>
      <?php
      } else {
        echo "정상적으로 업로드되지 않았습니다.";
      }

      ?>
      <BR>
      <input type="submit" name="confirm" value="확인">
      <input type="submit" name="back" value="돌아가기">
      <input type="hidden" name="user_id" value="<?=$_POST["user_id"]?>">
      <input type="hidden" name="gender" value="<?=$_POST["gender"]?>">
      <input type="hidden" name="prefecture" value="<?=$_POST["prefecture"]?>">
    </form>
  </body>
</html>
