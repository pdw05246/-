<meta charset="utf-8"/>
<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Database_TermProject</title>
        <link rel="stylesheet" href="inf_add_style.css">
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
                            <h1>성적 입력</h1>
                            <div>수강과목 정보를 입력한 후 저장해주세요.</div>
                        </header>
                        <div class="table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>아이디</th>
                                        <th>과목명</th>
                                        <th>수강연도</th>
                                        <th>수강학기</th>
                                        <th>학점</th>
                                        <th>P / NP</th>
                                    </tr>
                                </thead>
                                <form method=post action="inf_add_ok.php">
                                    <tbody id='stock_tbody'>
                                        <tr>
                                            <td><input type=text name='fk_stu_id' size=10 VALUE=<?php echo $_SESSION['stu_id'] ?> READONLY></td>
                                            <td><input type=text name='fk_sub_name' size=10 placeholder="ex)운영체제"></td>
                                            <td><select name='fk_adm_year'><option value="2021">2021</option><option value="2020">2020</option><option value="2019">2019</option>
                                            <option value="2018">2018</option><option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option></td>
                                            <td><select name='semester'>
                                                <option value="1학년1학기">1학년1학기</option><option value="1학년2학기">1학년2학기</option>
                                                <option value="2학년1학기">2학년1학기</option><option value="2학년2학기">2학년2학기</option>
                                                <option value="3학년1학기">3학년1학기</option><option value="3학년2학기">3학년2학기</option>
                                                <option value="4학년1학기">4학년1학기</option><option value="4학년2학기">4학년2학기</option>
                                            </td>
                                            <td><select name='score'><option value="4.5">A+</option><option value="4.0">A</option>
                                                <option value="3.5">B+</option><option value="3.0">B</option>
                                                <option value="2.5">C+</option><option value="2.0">C</option>
                                                <option value="1.5">D+</option><option value="1.0">D</option>
                                                <option value="0.0">F</option><option value="">공백</option>
                                            </td>
                                            <td><select name='pnp'>
                                                <option value="">공백</option>
                                                <option value="P">P</option>
                                                <option value="NP">NP</option>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                        </div>
                        <div class="butt">
                            <button type="submit">저장</button>
                            <a href = "inf.php">뒤로가기</a>
                        </div>
                        </form>
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