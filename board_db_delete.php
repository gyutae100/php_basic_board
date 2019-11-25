<?php

    //POST 파싱
    $id = $_POST['id'];
    $password = $_POST['password'];

    $page = $_POST['page'];

    echo $page;

    //db 연결한다.
    $conn = mysqli_connect(
        'localhost',
        'root',
        '1234',
        'board_schema'
    );

    //삭제 대상 검색
    $sql_select = "SELECT * FROM board WHERE id=$id";
    $result_select = mysqli_query($conn, $sql_select);
    if($result_select ===false){
        echo mysqli_error($conn);
    }

    $row = mysqli_fetch_array($result_select);
    $saved_password = $row['password'];

    //password 비교
    $isDeleted=false;
    if( password_verify($password, $saved_password ) ){

        $isDeleted=true;
        $sql_delete = "DELETE FROM `board` WHERE id=$id";
        $result_delete = mysqli_query($conn, $sql_delete);
        if($result_delete ===false){
            echo mysqli_error($conn);
        }

        echo "<script> allert('삭제 성공/ 비밀번호 일치'); </script>";
    }
    else{
        echo "<script>alert('삭제실패 / 비밀번호 불일치'); </script>";
    }

    if($isDeleted){

        ?>
        <button onclick="location.href= 'board_list.php?page= <?=$page?>'">게시판으로 돌아가기 </button>
    <?php
    }else {

        ?>
        <button onclick="location.href= 'read_board.php?id=<?=$id?>'">게시글로 돌아가기 </button>
        <button onclick="location.href= 'board_list.php?page=<?=$page?>'">게시판으로 돌아가기 </button>

        <button onclick= "history.back()" >비밀번호 재시도하기 </button>
        <?php
    }
?>



