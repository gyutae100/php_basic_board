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

    <!-- 게시판 글을 읽는다.-->

    <?php

    //db접속한다.
    $conn = mysqli_connect(
        'localhost',
        'root',
        '1234',
        'board_schema'
    );

    $page = $_GET['page'];

    $id = $_GET['id'];


    //조회수 증가시킨다.
    //쿠키 가진 유무로 체크한다.
    mysqli_query($conn,"update board set view=view+1 WHERE id= $id");

    $select_query ="SELECT * FROM board WHERE id=$id";
    $result_set = mysqli_query($conn, $select_query);
    $row = mysqli_fetch_array($result_set);

    ?>

        <h1>글 번호:  <?=$row['id'] ?></h1>
        <h1>조회수: <?=$row['view'] ?></h1>
        <h1>글제목: <?=$row['title'] ?></h1>
        <h1>글쓴이: <?=$row['writer'] ?></h1>
        <h1>날짜 : <?=$row['date'] ?></h1>

        <h1>내용: <?=$row['content'] ?></h1>
        <div id="commant_list">
            <h1>댓글 출력</h1>

            <?php

            $select_query ="SELECT * FROM comment WHERE id=$id";
            $result_set = mysqli_query($conn, $select_query);
            ?>

            <?php
            //while ($row = mysqli_fetch_array($result_set)) {
              while($row = mysqli_fetch_array($result_set)){

                ?>
                <!--기존 댓글 불러오기 -->
                <h110>  <?=$row['writer']?> : <?=$row['content']?>  : <?=$row['date']?>
                    <form action= check_password_for_delete_comment.php method="post">
                        <input type="hidden" name="comment_id" value = "<?=$row['comment_id']?>">
                        <input type="hidden" name="page" value = "<?=$page?> ">
                        <!-- 댓글 삭제 -->
                        <input type="submit" value="삭제"onclick="location.href='check_password_for_delete_comment.php' ">
                    </form>

                </h110>
                <br>
            <?php
            }
            ?>

        </div>

        <div>
            <!-- 추가 댓글 달기 -->
            <form action=commant_db_write.php method="post">
                <input type="hidden" name="id"  value='<?=$id?>' >
                <h1>댓글 달기</h1> <input placeholder ="name" type="text" name="writer" > <input placeholder ="password" type="text" name="password" >  <input placeholder="commant" type="text" name="commant" >
                <input type="submit" value="댓글 달기" onclick="location.href='commant_db_write.php'">
            </form>
        </div>

        <div>
            <!-- 게시글 삭제 -->
            <form action=check_password_for_delete_board.php method="post" >
                    <input type="hidden" name="id"  value='<?=$id?>' >
                    <input type="hidden" name="page" value = "<?=$page?> ">
                    <input type="submit" value="삭제" onclick="location.href ='check_password_for_delete_board.php'">
            </form>
        </div>
        <?php
        echo "<button onclick=\"location.href= ' board_list.php?page=$page ' \"> 게시판으로 이동 </button>"
        ?>
</body>
</html>