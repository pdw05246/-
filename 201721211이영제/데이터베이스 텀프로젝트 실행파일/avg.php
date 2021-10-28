<meta charset="utf-8"/>
<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Database_TermProject</title>
        <link rel="stylesheet" href="avg_style.css">
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
                            <h1>성적 통계</h1>
                            <div>학년별, 학기별, 연도별, 종합 성적 통계정보입니다.</div>
                      </header>
                      <table>
                        <thead>
                          <tr>
                            <th>수강연도</th>
                            <th>수강학기</th>
                            <th>학기평균</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                          $con = mysqli_connect("localhost", "cookUser", "1234", "modeldb") or die("MySQL 접속 실패!!");
                          $sql ="SELECT fk_adm_year, semester, avg(score) FROM save_tbl WHERE save_tbl.fk_stu_id = '".$_SESSION['stu_id']."' GROUP BY fk_adm_year, semester ORDER BY fk_adm_year DESC, semester DESC";
                          $ret = mysqli_query($con, $sql);
                          if($ret) {
                          $count = mysqli_num_rows($ret);
                          }else {
                            echo "userTBL 데이터 검색 실패!!!"."<br>";
                            echo "실패 원인 :".mysqli_error($con);
                            exit();
                          }
                          while($row = mysqli_fetch_array($ret)) {
                            echo '<tr><td>' . $row[ 'fk_adm_year' ] . '</td><td>' . $row[ 'semester' ] . '</td><td>' . $row[ 'avg(score)' ] . '</td></tr>';
                          }
                          mysqli_close($con);
                        ?>
                        </tbody>
                      </table>
                      <table>
                        <thead>
                          <tr>
                            <th>수강연도</th>
                            <th>연도평균</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                          $con = mysqli_connect("localhost", "cookUser", "1234", "modeldb") or die("MySQL 접속 실패!!");
                          $sql ="SELECT fk_adm_year, avg(score) FROM save_tbl  WHERE save_tbl.fk_stu_id = '".$_SESSION['stu_id']."' GROUP BY fk_adm_year ORDER BY fk_adm_year DESC";
                          $ret = mysqli_query($con, $sql);
                          if($ret) {
                          $count = mysqli_num_rows($ret);
                          }else {
                            echo "userTBL 데이터 검색 실패!!!"."<br>";
                            echo "실패 원인 :".mysqli_error($con);
                            exit();
                          }
                          while($row = mysqli_fetch_array($ret)) {
                            echo '<tr><td>' . $row[ 'fk_adm_year' ] . '</td><td>' . $row[ 'avg(score)' ] . '</td></tr>';
                          }
                          mysqli_close($con);
                          echo "</TABLE>";
                        ?>
                        </tbody>
                      </table>
                      <table>
                        <thead>
                          <tr>
                            <th>전체평균</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                          $con = mysqli_connect("localhost", "cookUser", "1234", "modeldb") or die("MySQL 접속 실패!!");
                          $sql ="SELECT avg(score) from save_tbl WHERE save_tbl.fk_stu_id = '".$_SESSION['stu_id']."'";
                          $ret = mysqli_query($con, $sql);
                          if($ret) {
                          $count = mysqli_num_rows($ret);
                          }else {
                            echo "userTBL 데이터 검색 실패!!!"."<br>";
                            echo "실패 원인 :".mysqli_error($con);
                            exit();
                          }
                          while($row = mysqli_fetch_array($ret)) {
                            echo '<tr><td>' . $row[ 'avg(score)' ] . '</td></tr>';
                          }
                          mysqli_close($con);
                        ?>
                        </tbody>
                      </table>
                      <div class="butt">
                        <a href = "inf.php">뒤로가기</a>
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