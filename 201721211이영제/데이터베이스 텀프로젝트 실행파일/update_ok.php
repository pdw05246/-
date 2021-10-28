<?php
    $con = mysqli_connect("localhost", "cookUser", "1234", "modelDB") or die("MySQL 접속 실패!!");

    $stu_id = $_POST["stu_id"];
    $pw = $_POST["pw"];
    $dept = $_POST["dept"];
    $stu_num = $_POST["stu_num"];
    $grade = $_POST["grade"];

  $sql = "UPDATE stu_tbl SET pw='".$pw."', dept='".$dept."', grade='".$grade."' WHERE stu_id = '".$stu_id."'" ;

  $ret = mysqli_query($con, $sql);

  if($ret) {
    echo "<script> alert('수정되었습니다.'); history.back(); </script>";
}
else {
   echo "데이터 수정 실패!!!"."<BR>";
   echo "실패 원인 :".mysqli_error($con);
   echo "<BR> <A HREF='proj_login.php'> <--초기 화면</A> ";
}
mysqli_close($con);

?>