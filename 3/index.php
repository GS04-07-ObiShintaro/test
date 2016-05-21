<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>POSTデータ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ送信＆検索</a></div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="select.php">
   <input type="text" name="NAME">
   <input type="submit" value="name検索">
</form> 
<form method="post" action="insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>アンケート</legend>
     <label>name：<input type="text" name="name" placeholder="例）小尾" required></label><br>
     <label>Email：<input type="text" name="email" placeholder="reee" required></label><br>
     <label>好きな食べ物:<input type="text" name="naiyou" rows="4" cols="40" required></label><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>