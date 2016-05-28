<?php
  //1. POSTデータ取得（）
  $name = $_POST["name"];
  $id = $_POST["id"];
  $pass = $_POST["pass"];


if(
  !isset($_POST["name"]) || $_POST["name"]=="" ||
  !isset($_POST["id"]) || $_POST["id"]=="" ||
  !isset($_POST["pass"]) || $_POST["pass"]==""
){
  exit('ParamError');
}
 
  //2. DB接続します
  //$pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost', 'root', '');

    try {
      $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
    } catch (PDOException $e) {
      exit('DbConnectError:'.$e->getMessage());
    }
  //３．データ登録SQL作成
  $stmt = $pdo->prepare("INSERT INTO gs_user_table(id, name, lid, lpw, kanri_flg, life_flg)VALUES(NULL, :name, :lid, :lpw, :kanri_flg, :life_flg)");
  $stmt->bindValue(':name', $name);
  $stmt->bindValue(':lid', $id);
  $stmt->bindValue(':lpw', $pass);
  $stmt->bindValue(':kanri_flg', '0');
  $stmt->bindValue(':life_flg', '0');
  $status = $stmt->execute();
 
  //４．データ登録処理後
  if($status==false){
    //Errorの場合$status=falseとなり、エラー表示
   $error = $stmt->errorInfo();
   exit("QueryError:".$error[2]);
  }else{
  //５．index.phpへリダイレクト
     $view="";
  }
  
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>自分と似た名前の人を表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">自分と似た名前の人を表示</a>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><table><?=$view?></table></div>
  </div>
</div>
<!-- Main[End] -->

</body>
</html>