<?php
//1.  DB接続します
$pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost', 'root', '');

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_an_table");

//３．SQL実行
$flag = $stmt->execute();

//id numberを受け取ります
$NAME = $_POST["NAME"];

//４データ表示
$view="";
if($flag==false){
  $view = "SQLエラー";
  
}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    //5.表示文字列を作成→変数に追記で代入
   if($result['name']==$NAME){
      $view .= '<tr>'.'<td>'.$result['id'].'</td>'.'<td>'.'<a href="detail2.php?id='.$result['id'].'">'.$result['name'].'</a>'.'</td>'.'<td>'.$result['email'].'</td>'.'<td>'.$result['naiyou'].'</td>'.'<td>'.$result['indate'].'</td>'.'</tr>';
   }
  }
}

?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>フリーアンケート表示</title>
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
      <a class="navbar-brand" href="index.php">データ登録</a>
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
