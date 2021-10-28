<!DOCTYPE html>
<?php
    session_start();
    $con = mysqli_connect("localhost", "cookUser", "1234", "modelDB") or die("MySQL 접속 실패!!");

    $sql = "SELECT * FROM stu_tbl WHERE stu_id='".$_SESSION['stu_id']."'";

    $ret = mysqli_query($con, $sql);
    if($ret) {
        $count = mysqli_num_rows($ret);
        if($count==0) {
        echo $_SESSION['stu_id']." 아이디의 회원이 없음!!!"."<BR>";
        echo "<BR> <A HREF='proj_login.html'> <--초기 화면</A> ";
        exit();
        }
    }
    else {
        echo "데이터 검색 실패!!!"."<BR>";
        echo "실패 원인 :".mysqli_error($con);
        echo "<BR> <A HREF='proj_login.html'> <--초기 화면</A> ";
        exit();
    }
    $row = mysqli_fetch_array($ret);
    $stu_id = $row['stu_id'];
    $pw = $row["pw"];
    $dept = $row["dept"];
    $stu_num = $row["stu_num"];
    $grade = $row["grade"];
?>

<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Database_TermProject</title>
        <link rel="stylesheet" href="update_style.css">
    </head>
    <body>

        <?php
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
                            <h1>내정보 관리</h1>
                            <div>변경하고자 하는 정보를 수정한 후 저장해주세요.</div>
                        </header>
                        <form action="update_ok.php" method="post" class="register">
                            <b>아이디</b>
                            <input type="text" name="stu_id" placeholder="아이디" VALUE=<?php echo $stu_id ?> READONLY>
                            <b>비밀번호</b>
                            <input type="password" name="pw" placeholder="비밀번호" VALUE=<?php echo $pw ?> required>
                            <b>학과</b>
                            <select name="dept">
                                <option value="컴퓨터공학과">컴퓨터공학과</option>
                                <option value="컴퓨터공학전공">컴퓨터공학전공</option>
                                <option value="소프트웨어전공">소프트웨어전공</option>
                            </select>
                            <b>학번</b>
                            <input type="text" name="stu_num" placeholder="학번" VALUE=<?php echo $stu_num ?> READONLY>
                            <b>학년</b>
                            <input type="number" name="grade" min="1" max="4" placeholder="학년" VALUE=<?php echo $grade ?> required>
                            <button type="submit">저장</button>
                        </form>
                        <div class="back-home">
                            <div>* 아이디와 학번은 변경이 불가능합니다.</div>
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