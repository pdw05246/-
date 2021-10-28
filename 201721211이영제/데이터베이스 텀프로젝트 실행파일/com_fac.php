<meta charset="utf-8"/>
<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Database_TermProject</title>
        <link rel="stylesheet" href="sel_style.css">
    </head>
    <body>

        <?php
            session_start();
            if(isset($_SESSION['stu_id'])) {
        ?>

        <div class="container">
            <div class="header">
                <h1><a href="main.php">DataBase</a></h1>
                <div class="nav">
                    <ul>
                        <li><a href="main.php">메인화면</a></li>
                        <li><a href="update.php">내정보 관리</a></li>
                        <li><a href="inf.php">성적 관리</a></li>
                        <li><a href="gil.php">수강신청 길라잡이</a></li>
                        <li><a href="logout.php">로그아웃</a></li>
                    </ul>
                </div>
                <div class="kku">
                    <a href="https://www.kku.ac.kr/mbshome/mbs/wwwkr/index.do" target='_blank'><img src="images/kku_ui.gif"></a>
                </div>
            </div>
            <div class="hero">
                <div class="register-popUp">
                    <div class="web-left">
                        <header>
                            <h1>"학부공통" 교과목</h1>
                            <div>학부공통 분류에 해당하는 교과목 목록입니다.</div>
                        </header>
                        <table>
                        <thead>
                            <tr>
                                <th>과목명</th>
                                <th>학점</th>
                                <th>대상 학년</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $con = mysqli_connect("localhost", "cookUser", "1234", "modeldb") or die("MySQL 접속 실패!!");
                            $sql ="SELECT sub_name, credit_num, appli_grade FROM sub_tbl
                                INNER JOIN sylla_tbl ON sub_tbl.sub_name = sylla_tbl.fk_sub_name
                                INNER JOIN stu_tbl ON sylla_tbl.sylla_year = LEFT(stu_tbl.stu_num, 4)
                                WHERE stu_id = '".$_SESSION['stu_id']."' && class_type = '학부공통' AND sub_name
                                NOT IN (SELECT fk_sub_name FROM save_tbl WHERE fk_stu_id = '".$_SESSION['stu_id']."')";
                            $ret = mysqli_query($con, $sql);
                            if($ret) {
                            $count = mysqli_num_rows($ret);
                            }
                            else {
                                echo "userTBL 데이터 검색 실패!!!"."<br>";
                                echo "실패 원인 :".mysqli_error($con);
                                exit();
                            }
                            while($col = mysqli_fetch_array($ret)) {
                                echo "<TR>";
                                echo "<TD>", $col['sub_name'], "</TD>";
                                echo "<TD>", $col['credit_num'], "</TD>";
                                echo "<TD>", $col['appli_grade'], "</TD>";
                                echo "</TR>";
                                }
                            mysqli_close($con);
                        ?>
                        </tbody>
                        </table>
                        <header>
                            <h1>대체과목</h1>
                            <div>대체과목으로 교체된 교과목 목록입니다.</div>
                        </header>
                        <table>
                        <thead>
                            <tr>
                                <th>이전 과목명</th>
                                <th>대체된 과목명</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $con = mysqli_connect("localhost", "cookUser", "1234", "modeldb") or die("MySQL 접속 실패!!");
                            $sql ="SELECT sub_name, alt_sub FROM sub_tbl WHERE alt_sub NOT IN('')";
                            $ret = mysqli_query($con, $sql);
                            if($ret) {
                            $count = mysqli_num_rows($ret);
                            }
                            else {
                                echo "userTBL 데이터 검색 실패!!!"."<br>";
                                echo "실패 원인 :".mysqli_error($con);
                                exit();
                            }
                            while($col = mysqli_fetch_array($ret)) {
                                echo "<TR>";
                                echo "<TD>", $col['sub_name'], "</TD>";
                                echo "<TD>", $col['alt_sub'], "</TD>";
                                echo "</TR>";
                                }
                            mysqli_close($con);
                        ?>
                        </tbody>
                        </table>
                        <div class="butt">
                            <a href = "gil_sel.php">뒤로가기</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="madeby">
                <h3>컴퓨터공학전공 201721113 김우석, 컴퓨터공학전공 201721211 이영제</h3>
            </div>
        </div>

        <?php
        } else {
        echo "<script> alert('로그인 후 사용할 수 있습니다.'); history.back(); </script>";
        }
        ?>

    </body>
</html>