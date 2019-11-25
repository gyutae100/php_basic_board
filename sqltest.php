<?php

    //db 연결
    $conn = mysqli_connect(
        'localhost',
        'root',
        '1234',
        'board_schema'
    );


    $sql_insert =' INSERT INTO `comment`( `writer`, `password`, `content`, `date`) VALUES ( "gyutae","1234","content...",NOW()) ';
    $result_insert = mysqli_query($conn, $sql_insert);
        if($result_insert ===false){
            echo mysqli_error($conn);
        }

        echo '<br>';

    //업데이트
    /*
    $sql_update = ' UPDATE `comment` SET password = "1245" WHERE id=0 ';

    $result_update = mysqli_query($conn, $sql_update);
    if($result_update ===false){
        echo mysqli_error($conn);
    }*/

        echo '<br>';

    //삭제

/*    $sql_delete = " DELETE FROM `comment` WHERE id=0 ";
    $result_delete = mysqli_query($conn, $sql_delete);
    if($result_delete ===false) {
        echo mysqli_error($conn);
    }*/

    echo '<br>';

    //출력
    $sql_select = "SELECT * FROM comment";
    $result_select = mysqli_query($conn, $sql_select);

    while($row = mysqli_fetch_array($result_select)){

        echo '<h2>'.$row['id'].'</h2>';
        echo '<h2>'.$row['writer'].'</h2>';
        echo '<h2>'.$row['password'].'</h2>';
        echo '<h2>'.$row['content'].'</h2>';
        echo '<h2>'.$row['date'].'</h2>';
    }



