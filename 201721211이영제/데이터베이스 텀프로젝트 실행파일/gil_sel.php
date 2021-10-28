<meta charset="utf-8"/>
<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Database_TermProject</title>
        <link rel="stylesheet" href="gil_sel_style.css">
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
                            <h1>교과목 정보</h1>
                            <div>확인하고자 하는 교과목 분류를 클릭해주세요.</div>
                    </header>
                    <div class="butt">
                        <a href = "maj_req.php">전공 필수</a>
                        <a href = "maj_sel.php">전공 선택</a>
                        <a href = "com_fac.php">학부 공통</a>
                        <a href = "lib_arts.php">교 양</a>
                        <a href = "gil.php">뒤로가기</a>
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