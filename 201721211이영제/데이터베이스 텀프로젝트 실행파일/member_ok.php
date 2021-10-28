<?php
  $con = mysqli_connect("localhost", "cookUser", "1234", "modeldb") or die("MySQL 접속 실패!!");


$stu_id = $_POST["stu_id"];
$pw = $_POST["pw"];
$dept = $_POST["dept"];
$stu_num = $_POST["stu_num"];
$grade = $_POST["grade"];


$sql =" INSERT INTO stu_tbl VALUES ('".$stu_id."','".$pw."','".$dept."','".$stu_num."','".$grade."')";

$ret = mysqli_query($con, $sql);

if($ret) {
  echo "<script>alert('회원가입이 완료되었습니다.'); location.href='daemoon.php';</script>";
}
else {
  echo "<script>alert('정보를 정확히 입력해주세요.'); history.back();</script>";
}
mysqli_close($con);
?>
