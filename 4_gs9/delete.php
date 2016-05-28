<?php
$id = $_POST["id"];
$pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost', 'root', '');
 try {
      $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
    } catch (PDOException $e) {
      exit('DbConnectError:'.$e->getMessage());
    }
$stmt = $pdo->prepare("DELETE FROM gs_an_table WHERE id=:id");
$stmt->bindValue(':id', $id);
$status = $stmt->execute();
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header("Location: login_select.php");
  exit;
}
?>
 