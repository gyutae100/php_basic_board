<!--게시판에 새 글의 정보를 db에 등록한다.-->

<?php

    //db 연결
    $conn = mysqli_connect(
        'localhost',
        'root',
        '1234',
        'board_schema'
    );

    //POST 파싱한다.
    $writer = $_POST['writer'];
    $password=  password_hash( $_POST['password'],  PASSWORD_DEFAULT);
    $title = $_POST['title'];
    $content = $_POST['content'];

    //db에 등록한다.
    $sql_insert ="INSERT INTO board (writer, password, title, content, date, view) VALUES ( '$writer', '$password', '$title', '$content', NOW(), 0 ) ";
    $result_insert = mysqli_query($conn, $sql_insert);
    if($result_insert ===false) {
        echo mysqli_error($conn);
    }

    //추후 작성한 글로 이동하게 한다.
    //echo("<script>location.href='board_list.php';</script>");
    $id = mysqli_insert_id($conn);

    mysqli_close($conn);
?>


    <button onclick="location.href= 'read_board.php?id=<?=$id?>'">게시글로 돌아가기 </button>

