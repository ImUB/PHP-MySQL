<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PHP 테스트</title>
  </head>
  <body>
    <hr size="1" noshade>
    회원 목록
    <hr size="1" noshade>
    [<a href="form.html">신규입력</a>]
    <br>
    <form action="list.php" name="form1" method="post">
      이름: <input type="text" name="search_key"><input type="submit" value="검색">
    </form>
    <?php
      requrie_once("MYDB.php");
      $pdo = db_connect();

      if(isset($_GET['action']) && $_GET['action'] == 'delete' && $_GET['id'] > 0) {
        try {
          $pdo->beginTransaction();
          $id = $_GET['id'];
          $sql = "DELETE FROM member WHERE id = :id";
          $stmh = $pdo->prepare($sql);
          $stmh->bindValue(':id',$id, PDO::PARAM_INT);
          $stmh->execute();
          $pdo->commit();
          print "데이터를".$stmh->rowCount()."건 삭제하였습니다.<br>";
        } catch (PDOException $Exception) {
          $pdo->rollBack();
          print "오류:".$Exception->getMessage();
        }
      }
      if (isset($_POST['action']) && $_POST['action'] == 'insert') {
          try {
            $pdo->beginTransaction();
            $sql = "INSERT INTO member (last_name, first_name, age) VALUES ( :last_name, :first_name, :age)";
            $stmh = $pdo->prepare($sql);
            $stmh->bindValue(':last_name', $_POST['last_name'], PDO::PARAM_STR);
            $stmh->bindValue(':first_name', $_POST['first_name'], PDO::PARAM_STR);
            $stmh->bindValue(':age', $_POST['age'], PDO::PARAM_INT);
            $stmh->execute();
            $pdo->commit();
            print "데이터를".$stmh->rowCount()."건 입력하였습니다.<br>";
          } catch (PDOException $Exception) {
            $pdo->rollBack();
            print "오류:".$Exception->getMessage();
          }
        }
        if (isset($_POST['action']) && $_POST['action'] == 'update') {
          $id = $_SESSION['id'];

          try {
            $pdo->beginTransaction();
            $sql = "UPDATE member SET last_name = :last_name, first_name = :first_name, age = :age WHERE id = :id";
            $stmh = $pdo->prepare($sql);
            $stmh->bindValue(':last_name', $_POST['last_name'], PDO::PARAM_STR);
            $stmh->bindValue(':first_name', $_POST['first_name'], PDO::PARAM_STR);
            $stmh->bindValue(':age', $_POST['age'], PDO::PARAM_INT);
            $stmh->bindValue(':id', $id, PDO::PARAM_INT)
            $stmh->execute();
            $pdo->commit();
            print "데이터를".$stmh->rowCount()."건 수정하였습니다.<br>";
          } catch (PDOException $Exception) {
            $pdo->rollBack();
            print "오류:".$Exception->getMessage();
          }
          unset($_SESSION['id']);
        }
        try {
          if (isset($_POST['search_key']) && $_POST['search_key'] != '') {
            $search_key = '%'.$_POST['search_key'].'%';
            $sql = "SELECT * FROM member WHERE last_name like :last_name OR first_name LIKE :first_name";
            $stmh = $pdo->prepare($sql);
            $stmh->bindValue(':last_name', $search_key, PDO::PARAM_STR);
            $stmh->bindValue(':first_name', $search_key, PDO::PARAM_STR);
            $stmh->execute();
          }
          else {
            $sql = "SELECT * FROM member ";
            $stmh = $pdo->query($sql);
          }
          $count = $stmh->rowCount();
          print "검색 결과는".$count."건 입니다.<br>";
        }
        catch (PDOException $Exception) {
          print "오류:".$Exception->getMessage();
        }
        if ($count < 1) {
          print "검색 결과가 없습니다.<br>";
        } else {
          ?>
      <table width="450" border="1" cellspacing="0" cellpadding="8">
        <tbody>
          <tr>
            <th>번호</th>
            <th>성</th>
            <th>이름</th>
            <th>나이</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
          </tr>
          <?php
          while ($row = $stmh->fetch(PDO::FETCH_ASSOC)) {
           ?>
           <tr>
             <td aligin="center"><?=htmlspecialchars($row['id'])?></td>
             <td aligin="center"><?=htmlspecialchars($row['last_name'])?></td>
             <td aligin="center"><?=htmlspecialchars($row['first_name'])?></td>
             <td aligin="center"><?=htmlspecialchars($row['age'])?></td>
             <td aligin="center"><a href=updateform.php?id=<?htmlspecialchars($row['id'])?>>수정</a></td>
             <td aligin="center"><a href=list.php?action=delete&id=<?htmlspecialchars($row['id'])?>>삭제</a></td>
             <td></td>
           </tr>
            <?php
            }
            ?>
        </tbody>
      </table>
      <?php
    } ?>
  </body>
</html>
