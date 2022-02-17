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
     require_once("MYDB.php");
     $pdo = db_connect();
     $id = $_SESSION['id'];
     try {
       $pdo->beginTransaction();
       $sql = "UPDATE member SET last_name = :last_name, first_name = :first_name, age = :age WHERE id = :id";
       $stmh = $pdo->prepare($sql);
       $stmh->bindValue(':last_name', $_POST['last_name'], PDO::PARAM_STR);
       $stmh->bindValue(':first_name', $_POST['first_name'], PDO::PARAM_STR);
       $stmh->bindValue(':age', $_POST['age'], PDO::PARAM_INT);
       $stmh->bindValue(':id', $id, PDO::PARAM_INT);
       $stmh->execute();
       $pdo->commit();
       print "데이터를 ".$stmh->rowCount()."건 수정하였습니다.<br>";
     } catch (PDOException $Exception) {
       $pdo->rollBack();
       print "오류:".$Exception->getMessage();
     }
     $_SESSION = array();
     session_destroy();
      ?>
   </body>
 </html>
