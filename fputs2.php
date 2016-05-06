<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>fputs</title>
</head>
<body>
<?php
/* ------------------------------------------------------------------------
■例 ファイル読み込み
fputs.php

■実例；
$name = $_POST["name"];
$mail = $_POST["mail"];
$age  = $_POST["age"];
$comment = $_POST["comment"];
$str = $name.",".$mail.",".$age.",".$comment."\n";

$file = fopen("data/data.txt","a");
flock($file, LOCK_EX);
fputs($file,$str);
flock($file, LOCK_UN);
fclose($file);

------------------------------------------------------------------------ */

//以下に記述してみましょう
$name = $_POST["name"];
$mail = $_POST["mail"];
$tel  = $_POST["tel"];
$kotoba  = $_POST["kotoba"];

//文字列を作成
$str = $name.",".$mail.",".$tel.",".$kotoba."\n";

//File操作
$file = fopen("data/data.xml","a");
flock($file, LOCK_EX); //ロック開始
fputs($file,$str);     //書き込み！！
flock($file, LOCK_UN); //ロック解除
fclose($file);

?>
ファイルの中を確認してください。
<table width="80%" border="1"> 
 <tr> 
  <th scope="col">name</th> 
  <th scope="col">mail</th> 
  <th scope="col">tel</th> 
  <th scope="col">kotoba</th> 
 </tr> 
<tr> 
  <td><?php print(htmlspecialchars($name)); ?> </td> 
  <td><?php print(htmlspecialchars($mail)); ?> </td> 
  <td><?php print(htmlspecialchars($tel)); ?> </td> 
  <td><?php print(htmlspecialchars($kotoba)); ?> </td> 
 </tr> 
</body>
</html>
