
<!--commant 정보를 db에 삽입한다.-->

<?php

    //db 연결한다.
    $conn = mysqli_connect(
        'localhost',
        'root',
        '1234',
        'board_schema'
    );

    //form post 내용 파싱한다.
    $id = $_POST['id'];
    $writer = $_POST['writer'];
    $password=  $_POST['password'];
    $commant = $_POST['commant'];

    $sql_insert = "INSERT INTO comment (id, writer, password, content, date) VALUES ( $id  , $writer, $password, $commant , NOW() ) ";
    $result_insert = mysqli_query($conn, $sql_insert);
    if($result_insert ===false) {
        echo mysqli_error($conn);
    }
     //이전 페이지로 돌아간다.
    $prevPage = $_SERVER['HTTP_REFERER'];
    header('location:'.$prevPage);


?>