<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <!-- 게시판에 새 글을 작성하는 페이지-->
    <form action=board_db_write.php method="post">

        <h1>글쓴이</h1> <input type="text" name="writer" >
        <h1>글제목</h1> <input type="text" name="title">
        <h1>패스워드</h1> <input type="text" name="password">
        <h1>내용</h1>   <input type="text" name="content">
        <br>
        <br>
        <input type="submit" value="글 등록" onclick="location.href='board_list.php'">
        <input type="reset" value="다시 쓰기">
        <button onclick="onclick ="location.href='board_list.php' ">게시판 리스트로 이동 </button>
    </form>
</body>
</html>