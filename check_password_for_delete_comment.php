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
    $comment_id = $_POST['comment_id'];
?>

    <h1>비밀번호 입력</h1>
    <form action=comment_db_delete.php method="post">
        <input type="text" name="password">
        <input type ="hidden" name="comment_id" value="<?=$comment_id?>">
        <input type="submit" value="삭제"  onclick="location.href='comment_db_delete.php'">
    </form>
</body>
</html>

