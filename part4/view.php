<?php
  session_start();
  $_SESSION["onname"] = $_POST["onname"];
  $_SESSION["bonmun"] = $_POST["bonmun"];
  if(isset($_POST["user_id"])){
      $_SESSION["user_id"] = $_POST["user_id"];
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PHP 테스트</title>
  </head>
  <body>
    <?php
      // if (isset($_POST["confirm"])) {
    ?>
    <?php
      if (!empty($_SESSION['onname'])) {
          print $_SESSION["onname"]."님<BR><BR>";
      } else {
        print "이름을 입력해주세요.<BR>";
      }
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
        print "저의 취미는 ".implode(',', $_POST["hobby"])."<BR>";
      } else {
        print "저의 취미는 없습니다.<BR>";
      }
      if (!empty($_SESSION["bonmun"])) {
        print "본문 :<BR>";
        print nl2br($_SESSION["bonmun"])."<BR>";
      } else {
        print "본문을 입력해주세요.<BR>";
      }
      if (isset($_FILES["uploadfile"])) {
        $resizeX = 300;
        $thumbnail_name = "thumbnail.jpg";
        $file_dir = '/Library/WebServer/Documents/images/';
        $file_path = $file_dir.$_FILES["uploadfile"]["name"];
        $thumbnail_file_path = $file_dir.$thumbnail_name;
        // echo "파일 이름 :".$_FILES["uploadfile"]["name"]."<br>";
        // echo "파일 크기 :".$_FILES["uploadfile"]["size"]."<br>";
        // echo "파일 타입 :".$_FILES["uploadfile"]["type"]."<br>";
        // echo "파일 에러 :".$_FILES["uploadfile"]["error"]."<br>";
        // echo "임시 파일 :".$_FILES["uploadfile"]["tmp_name"]."<br>";
        // echo "파일 경로 :".$file_path."<br>";
        // echo "섬파일 경로 :".$thumbnail_file_path."<br>";
        // echo "<BR>";
        if(move_uploaded_file($_FILES["uploadfile"]["tmp_name"],$file_path)){
          $img_dir = "/images/";
          $img_path = $img_dir.$_FILES["uploadfile"]["name"];
          $thumbnail_img_path = $img_dir.$thumbnail_name;
          if (mb_strpos($_FILES['uploadfile']['type'], 'jpeg')) {
            $gdimg_in = imagecreatefromjpeg($file_path);
            $ix = imagesx($gdimg_in);
            $iy = imagesy($gdimg_in);
            $ox = $resizeX;
            $oy = ($ox * $iy) / $ix;
            $gdimg_out = imagecreatetruecolor($ox, $oy);
            imagecopyresized($gdimg_out, $gdimg_in,0,0,0,0,$ox,$oy,$ix,$iy);
            imagejpeg($gdimg_out, $thumbnail_file_path);
            imagedestroy($gdimg_in);
            imagedestroy($gdimg_out);
            $size = getimagesize($file_path);
            $size2 = getimagesize($thumbnail_file_path);
      ?>
        파일 올리기를 완료하였습니다.<BR>
        <IMG src="<?=$img_path?>" <?=$size[3]?>><BR>
        <img src="<?=$thumbnail_img_path?>" <?=$size2[3]?>><BR>
        <b><?=$_POST["comment"]?></b><BR>
      <?php
          } else {
            print 'jpeg 형식의 이미지만 업로드하여 주세요.<BR>';
          }
        } else {
          echo "정상적으로 업로드되지 않았습니다.";
        }
      } else {
        print "파일 업로드를 하지 않았습니다.";
      }
      ?>
      <?php
      // } elseif (isset($_POST["back"])) {
     ?>
     <!-- <FONT size="4">텍스트 송신 테스트</FONT>
     <form name="form1" action="confirm.php" method="post" enctype="multipart/form-data">
       이름: <input type="text" name="onname"><BR>
       성별:
       <input type="radio" name="gender" value="남">남
       <input type="radio" name="gender" value="여">여<BR>
       주거지역:
       <select name="prefecture">
         <option value="" selected>----- 행정구역을 선택하여 주세요. -----</option>
         <option value="서울특별시">서울특별시</option>
         <option value="부산광역시">부산광역시</option>
         <option value="울산광역시">울산광역시</option>
         <option value="대구광역시">대구광역시</option>
         <option value="광주광역시">광주광역시</option>
         <option value="대전광역시">대전광역시</option>
         <option value="인천광역시">인천광역시</option>
         <option value="세종특별자치시">세종특별자치시</option>
         <option value="제주특별자치도">제주특별자치도</option>
         <option value="평안북도">평안북도</option>
       </select>
       <BR>
       나의 취미 : <BR>
       <!-- <input type="checkbox" name="hobby[]" value="스포츠">스포츠<BR>
       <input type="checkbox" name="hobby[]" value="영화감상">영화감상<BR>
       <input type="checkbox" name="hobby[]" value="독서">독서<BR><BR> -->
       <!-- <select name="hobby[]" size="5" multiple>
         <option value="독서">독서</option>
         <option value="영화감상">영화감상</option>
         <option value="영어회화">영어회화</option>
         <option value="음악감상">음악감상</option>
         <option value="노래">노래</option>
         <option value="원예">원예</option>
         <option value="드라이브">드라이브</option>
         <option value="사진">사진</option>
         <option value="골프">골프</option>
         <option value="낚시">낚시</option>
       </select>
       <BR>
       본문: <BR>
       <textarea name="bonmun" rows="8" cols="80"></textarea><BR>
       <input type="hidden" name="MAX_FILE_SIZE" value="100000">
       이미지:<input type="file" name="uploadfile"><BR>
       설명:<input type="text" name="comment"><BR><BR>
       <input type="submit" value="송신">
       <input type="hidden" name="user_id" value="0001">
     </form> -->
    <?php
      // }else{
     ?>
     <!-- 오류입니다. <BR>
     <a href="form.html">form.html</a>로 돌아갑니다. -->
    <?php
      // }
     ?>
  </body>
</html>
