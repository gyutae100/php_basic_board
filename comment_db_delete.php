<?php
    $comment_id = $_POST['comment_id'];
    $password = $_POST['password'];

    //echo $comment_id;
    //echo $password;

    //db에 접속한 후 해당 password 가져옴
    //db 연결한다.
    $conn = mysqli_connect(
        'localhost',
        'root',
        '1234',
        'board_schema'
    );

    $sql_select = "SELECT * FROM comment WHERE comment_id=$comment_id";
    $result_select = mysqli_query($conn, $sql_select);
    if($result_select ===false){
        echo mysqli_error($conn);
    }

    $row = mysqli_fetch_array($result_select);


    $saved_password = $row['password'];

    $id = $row['id'];

    //password 비교
    $isDeleted=false;
    if( $saved_password == $password) {


        $isDeleted = true;
        $sql_delete = " DELETE FROM `comment` WHERE comment_id=$comment_id ";
        $result_delete = mysqli_query($conn, $sql_delete);
        if ($result_delete === false) {
            echo mysqli_error($conn);
        }

        echo "<script>alert('삭제성공 / 비밀번호 일치'); </script>";
    }
    else {

        echo "<script>alert('삭제실패 / 비밀번호 불일치'); </script>";
    }
?>

<?php
    if($isDeleted){

        ?>
        <button onclick="location.href= 'read_board.php?id=<?=$id?>'">게시글로 돌아가기 </button>
    <?php
    }else {

        ?>
        <button onclick="location.href= 'read_board.php?id=<?=$id?>'">게시글로 돌아가기 </button>

        <button onclick= "history.back()" >비밀번호 재시도하기 </button>
        <?php
    }
?>



