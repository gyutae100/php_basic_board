<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php

$id = $_POST['id'];

$page = $_POST['page'];


?>

<h1>비밀번호 입력</h1>
<form action=board_db_delete.php method="post">
    <input type="text" name="password">
    <input type ="hidden" name="id" value="<?=$id?>">
    <input type ="hidden" name="page" value="<?=$page?>">
    <input type="submit" value="삭제"  onclick="location.href='board_db_delete.php'">
</form>
</body>
</html>