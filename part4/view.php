<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PHP 테스트</title>
  </head>
  <body>
    <?php
      if (isset($_POST["confirm"])) {
    ?>
    <?php
      print $_SESSION["onname"]."님<BR><BR>";
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
      if (isset($_POST["bobby"])) {
        $last_key = end($_POST["bobby"]);
        print "저의 취미는 ";
        foreach ($_POST["bobby"] as $hobby) {
          if ($hobby != $last_key) {
            print $hobby.",";
          } else {
            print $hobby."<BR>";
          }
        }
      } else {
        print "저의 취미는 없습니다.<BR><BR>";
      }
      print "본문 :<BR>";
      print nl2br($_SESSION["bonmun"]);
    ?>
    <?php
      } elseif (isset($_POST["back"])) {
     ?>
     <FONT size="4">텍스트 송신 테스트</FONT>
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
       <select name="hobby[]" size="5" multiple>
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
     </form>
    <?php
      }else{
     ?>
     오류입니다. <BR>
     <a href="form.html">form.html</a>로 돌아갑니다.
    <?php
      }
     ?>
  </body>
</html>
