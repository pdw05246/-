<meta charset="utf-8"/>
<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Database_TermProject</title>
        <link rel="stylesheet" href="gil_style.css">
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
                            <h1>수강신청 길라잡이</h1>
                            <div>사용자의 학번의 따른 졸업이수학점을 계산합니다.</div>
                    </header>
                    <table>
                        <thead>
                        <tr>
                            <th>연도</th>
                            <th>교양</th>
                            <th>학부공통</th>
                            <th>전공필수</th>
                            <th>전공선택</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $con = mysqli_connect("localhost", "cookUser", "1234", "modeldb") or die("MySQL 접속 실패!!");
                            $sql ="SELECT adm_year, lib_arts, com_fac, maj_req, maj_sel FROM save_tbl
                            INNER JOIN sub_tbl ON save_tbl.fk_sub_name = sub_tbl.sub_name
                            INNER JOIN stu_tbl ON save_tbl.fk_stu_id = stu_tbl.stu_id
                            INNER JOIN grad_credit_tbl on left(stu_tbl.stu_num, 4) = grad_credit_tbl.adm_year
                            WHERE save_tbl.fk_stu_id =  '".$_SESSION['stu_id']."' GROUP BY adm_year";                  
                            $ret = mysqli_query($con, $sql);
                            if($ret) {
                            $count = mysqli_num_rows($ret);
                            }else {
                                echo "userTBL 데이터 검색 실패!!!"."<br>";
                                echo "실패 원인 :".mysqli_error($con);
                                exit();
                            }
                            while($row = mysqli_fetch_array($ret)) {
                                echo "<TR>";
                                echo "<TD>", $row['adm_year'], "</TD>";
                                echo "<TD>", $row['lib_arts'], "</TD>";
                                echo "<TD>", $row['com_fac'], "</TD>";
                                echo "<TD>", $row['maj_req'], "</TD>";
                                echo "<TD>", $row['maj_sel'], "</TD>";
                                echo "</TR>";
                                }
                            mysqli_close($con);
                        ?>
                        </tbody>
                    </table>
                    <table>
                        <thead>
                        <tr>
                            <th>교과분류</th>
                            <th>수강한 학점</th>
                            <th>부족한 학점</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $con = mysqli_connect("localhost", "cookUser", "1234", "modeldb") or die("MySQL 접속 실패!!");
                            $sql =" SELECT adm_year, class_type, sum(credit_num), lib_arts, com_fac, maj_req, maj_sel FROM save_tbl
                                INNER JOIN sub_tbl ON save_tbl.fk_sub_name = sub_tbl.sub_name
                                INNER JOIN stu_tbl ON save_tbl.fk_stu_id = stu_tbl.stu_id
                                INNER JOIN grad_credit_tbl on left(stu_tbl.stu_num, 4) = grad_credit_tbl.adm_year
                                WHERE save_tbl.fk_stu_id = '".$_SESSION['stu_id']."' GROUP BY class_type;";
                            $ret = mysqli_query($con, $sql);
                            if($ret) {
                            $count = mysqli_num_rows($ret);
                            }else {
                                echo "userTBL 데이터 검색 실패!!!"."<br>";
                                echo "실패 원인 :".mysqli_error($con);
                                exit();
                            }
                            while($row = mysqli_fetch_array($ret)) {
                                echo "<TR>";
                                echo "<TD>", $row['class_type'], "</TD>";
                                echo "<TD>", $row['sum(credit_num)'], "</TD>";
                        
                                if($row['class_type']=='학부공통') {
                                    $s = $row['com_fac'] - $row['sum(credit_num)'];
                                    if ($s < 0){
                                    $s = 0;
                                    }
                                    echo "<TD>", $s, "</TD>";
                                    echo "</TR>";
                                    continue;
                                }
                                elseif($row['class_type']=='전필') {
                                    $s = $row['maj_req'] - $row['sum(credit_num)'];
                                    if ($s < 0){
                                    $s = 0;
                                    }
                                    echo "<TD>", $s, "</TD>";
                                    echo "</TR>";
                                    continue;
                                }
                                elseif($row['class_type']=='전선') {
                                    $s = $row['maj_sel'] - $row['sum(credit_num)'];
                                    if ($s < 0){
                                    $s = 0;
                                    }
                                    echo "<TD>", $s, "</TD>";
                                    echo "</TR>";
                                    continue;
                                }
                                elseif($row['class_type']=='인성') {
                                    echo "<TD>", 3 - $row['sum(credit_num)'], "</TD>";
                                    echo "</TR>";
                                    continue;
                                }
                                elseif($row['class_type']=='기초(국제화)') {
                                    $s = 6 - $row['sum(credit_num)'];
                                    if ($s < 0){
                                    $s = 0;
                                    }
                                    echo "<TD>", $s, "</TD>";
                                    echo "</TR>";
                                    continue;
                                }
                                elseif($row['class_type']=='실무(IT활용)') {
                                    $s = 2 - $row['sum(credit_num)'];
                                    if ($s < 0){
                                    $s = 0;
                                    }
                                    echo "<TD>", $s, "</TD>";
                                    echo "</TR>";
                                    continue;
                                }
                                elseif($row['class_type']=='실무(직업과창의)') {
                                    $s = 4 - $row['sum(credit_num)'];
                                    if ($s < 0){
                                    $s = 0;
                                    }
                                    echo "<TD>", $s, "</TD>";
                                    echo "</TR>";
                                    continue;
                                }
                                elseif($row['class_type']=='핵심') {
                                    $s = 9 - $row['sum(credit_num)'];
                                    if ($s < 0){
                                    $s = 0;
                                    }
                                    echo "<TD>", $s, "</TD>";
                                    echo "</TR>";
                                    continue;
                                }
                                elseif($row['class_type']=='기초(국제화)') {
                                    $s = 6 - $row['sum(credit_num)'];
                                    if ($s < 0){
                                    $s = 0;
                                    }
                                    echo "<TD>", $s, "</TD>";
                                    echo "</TR>";
                                    continue;
                                }
                                elseif($row['class_type']=='기초(인문사고)') {
                                    $s = 4 - $row['sum(credit_num)'];
                                    if ($s < 0){
                                    $s = 0;
                                    }
                                    echo "<TD>", $s, "</TD>";
                                    echo "</TR>";
                                    continue;
                                }
                                elseif($row['class_type']=='기초(과학사고)') {
                                    $s = 2 - $row['sum(credit_num)'];
                                    if ($s < 0){
                                    $s = 0;
                                    }
                                    echo "<TD>", $s, "</TD>";
                                    echo "</TR>";
                                    continue;
                                }
                                elseif($row['class_type']=='기초(의사소통)') {
                                    $s = 3 - $row['sum(credit_num)'];
                                    if ($s < 0){
                                    $s = 0;
                                    }
                                    echo "<TD>", $s, "</TD>";
                                    echo "</TR>";
                                    continue;
                                }
                                elseif($row['class_type']=='심화') {
                                    $s = 8 - $row['sum(credit_num)'];
                                    if ($s < 0){
                                    $s = 0;
                                    }
                                    echo "<TD>", $s, "</TD>";
                                    echo "</TR>";
                                    continue;
                                }
                            }
                            mysqli_close($con);
                        ?>
                        </tbody>
                    </table>
                    <table>
                        <thead>
                        <tr>
                            <th>교양 획득 학점</th>
                            <th>교양 필요이수학점</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $con = mysqli_connect("localhost", "cookUser", "1234", "modeldb") or die("MySQL 접속 실패!!");
                            $sql ="SELECT sum(credit_num), lib_arts FROM save_tbl
                            INNER JOIN sub_tbl ON save_tbl.fk_sub_name = sub_tbl.sub_name
                            INNER JOIN stu_tbl ON save_tbl.fk_stu_id = stu_tbl.stu_id
                            INNER JOIN grad_credit_tbl ON left(stu_tbl.stu_num, 4) = grad_credit_tbl.adm_year
                            WHERE sub_tbl.class_type NOT IN ('학부공통', '전선', '전필' ) && save_tbl.fk_stu_id = '".$_SESSION['stu_id']."'";
                            $ret = mysqli_query($con, $sql);
                            if($ret) {
                            $count = mysqli_num_rows($ret);
                            }else {
                                echo "userTBL 데이터 검색 실패!!!"."<br>";
                                echo "실패 원인 :".mysqli_error($con);
                                exit();
                            }
                            while($row = mysqli_fetch_array($ret)) {
                                echo "<TR>";
                                if($row['sum(credit_num)']==""){
                                    echo "<TD>", "0", "</TD>";
                                }else{
                                    echo "<TD>", $row['sum(credit_num)'], "</TD>";
                                }
                                if($row['lib_arts']-$row['sum(credit_num)']==0){
                                    echo "<TD>", "40", "</TD>";
                                }else{
                                    echo "<TD>", $row['lib_arts']-$row['sum(credit_num)'], "</TD>";
                                }
                                echo "</TR>";
                            }
                            mysqli_close($con);
                        ?>
                        </tbody>
                    </table>
                    <div class="butt">
                        <a href = "gil_sel.php">교과목 정보</a>
                        <a href = "main.php">메인화면</a>
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