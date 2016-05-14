<?php
  //1. POSTデータ取得（）
  $name = $_POST["name"];
  $email = $_POST["email"];
  $naiyou = $_POST["naiyou"];
 
  //2. DB接続します
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost', 'root', '');
  //３．データ登録SQL作成
  $stmt = $pdo->prepare("INSERT INTO gs_an_table(id, name, email, naiyou, indate )VALUES(NULL, :name, :email, :naiyou, sysdate())");
  $stmt->bindValue(':name', $name);
  $stmt->bindValue(':email', $email);
  $stmt->bindValue(':naiyou', $naiyou);
  $status = $stmt->execute();
  $sss = $pdo->prepare("SELECT * FROM gs_an_table WHERE name LIKE :a1");
  $sss->bindValue(':a1', '%'.$name.'%');
  $ttt = $sss->execute();
  //４．データ登録処理後
  if($status==false){
    //Errorの場合$status=falseとなり、エラー表示
    echo "SQLエラー";
    exit;
  }else{
  //５．index.phpへリダイレクト
     $view="";
     if($ttt==false){
        $view = "tttエラー";
     }else{
      //Selectデータの数だけ自動でループしてくれる
      while( $result = $sss->fetch(PDO::FETCH_ASSOC)){
      //5.表示文字列を作成→変数に追記で代入
      
          $view .= '<tr>'.'<td>'.$result['id'].'</td>'.'<td>'.$result['name'].'</td>'.'<td>'.$result['email'].'</td>'.'<td>'.$result['naiyou'].'</td>'.'<td>'.$result['indate'].'</td>'.'</tr>';
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