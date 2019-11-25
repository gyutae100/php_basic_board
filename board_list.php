
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <!--게시판 목록을 출력한다. -->

    <table border="1">
        <th>글 번호</th>
        <th>조회수</th>
        <th>글제목</th>
        <th>글쓴이</th>
        <th>날짜</th>

        <?php
            //db 연결한다.
            $conn = mysqli_connect(
                'localhost',
                'root',
                '1234',
                'board_schema'
            );

        ?>

        <?php

            #현재 페이지를 받아온다.
            $current_page = $_GET['page'];      //현재 페이지
            if(!$current_page )  $current_page =1;

            #페이지 사이즈 설정한다.
            $page_size = 5;

            #현재 페이지의 no를 받아온다.

            $no = $_GET['no'] ?  $_GET['no'] : 0;                  //페이지가 시작되는 첫 글의 순번


            if(!$no)    $no = (($current_page -1) * $page_size ) +1;

            #총 게시물 갯수를 구한다.
            $total_cnt_row_query = "SELECT count(*) FROM board";
            $result_query = mysqli_query($conn, $total_cnt_row_query);
            if(! $result_query){
                echo mysqli_error($conn);
            }
            $result_row = mysqli_fetch_row($result_query);
            $total_cnt_row=  $result_row[0];

            #총 페이지 갯수를 구한다.
            $total_cnt_page = ceil( $total_cnt_row/ $page_size);

            #현재 페이지 게시판 목록의 요소를 출력한다.
            $select_query ="SELECT * FROM board ORDER By id DESC LIMIT $no, $page_size";
            $result_query = mysqli_query($conn, $select_query);
            if(! $result_query){
                echo mysqli_error($conn);
            }

            mysqli_close($conn);
            //현재 페이지 게시판 목록의 요소를 출력한다.
            for (  $id=$no   ; $row = mysqli_fetch_array($result_query) ;  $id++)
            {
                ?>
                    <tr>
                        <td height=20>
                           <?=$id?>
                        </td>
                        <td height=20>
                            <?= $row['view']?>
                        </td>
                        <td height=20>
                            <a href= "read_board.php?id=<?=$row['id']?>&page=<?=$current_page ?>"> <?= $row['title']?> </a>
                        </td>
                        <td height=20>
                            <?= $row['writer']?>
                        </td>
                        <td height=20>
                            <?= $row['date']?>
                        </td>
                    </tr>
        <?php
            }

        ?>
            </table>

        <?php

            #첫 번째 페이지 구하기
            $page_list_size = 5;
            $start_page = floor( ($current_page-1) /$page_list_size ) * $page_list_size +1 ;

            #마지막 페이지 구하기
            $end_page = $start_page +$page_list_size -1;

            #이전 페이지 있는 경우 출력
            $prev_page = $start_page -1;
            if( $current_page > $page_list_size){

                echo "<a href=\"board_list.php?page=$prev_page \"> 이전 </a>";
            }

            #page 리스트 출력
            for($idx = $start_page ; $idx<= $end_page && $idx * $page_size < $total_cnt_row ; $idx++){

                echo "<a href=\"board_list.php?page=$idx\"> $idx </a>";
            }

            #이후 페이지 있는 경우 출력
            if( $end_page * $page_size < $total_cnt_row ){
                $next_page= $end_page+1;
                echo "<a href=\"board_list.php?page=$next_page \"> 이후 </a>";
            }

        ?>
            <br>
            <button onclick ="location.href='write_board.php' ">글쓰기 </button>

</body>
</html>