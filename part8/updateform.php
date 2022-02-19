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
     <hr size="1" noshade>
     수정 화면
     <hr size="1" noshade>
     [ <a href="list.php">돌아가기</a>]
     <br>
     <?php
       require_once("MYDB.php");
       $pdo = db_connect();
       if(isset($_GET['id']) && $_GET['id'] > 0) {
         $id = $_GET['id'];
         $_SESSION['id'] = $id;
       } else {
         exit('잘못된 피라미터입니다.');
       }
       try {
         $sql = "SELECT * FROM member WHERE id = :id";
         $stmh = $pdo->prepare($sql);
         $stmh->bindValue(':id', $id, PDO::PARAM_INT);
         $stmh->execute();
         $count = $stmh->rowCount();
       } catch (PDOException $Exception) {
         print '오류:'.$Exception->getMessage();
       }
       if ($count < 1) {
         print "수정 데이터가 없습니다.<br>";
       } else {
         $row = $stmh->fetch(PDO::FETCH_ASSOC);
         ?>
       <form name="form1" action="list.php" method="post">
         번호:<?=htmlspecialchars($row['id'])?><br>
         성:<input type="text" name="last_name" value="<?=htmlspecialchars($row['last_name'])?>"><br>
         이름:<input type="text" name="first_name" value="<?=htmlspecialchars($row['first_name'])?>"><br>
         나이:<input type="text" name="age" value="<?=htmlspecialchars($row['age'])?>"><br>
         <input type="hidden" name="action" value="update">
         <input type="submit" value="수정">
       </form>
       <?php
       }
       ?>
   </body>
 </html>
