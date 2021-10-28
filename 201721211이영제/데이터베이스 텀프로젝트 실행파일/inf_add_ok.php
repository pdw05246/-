<?php
  $con = mysqli_connect("localhost", "cookUser", "1234", "modeldb") or die("MySQL 접속 실패!!");


$fk_stu_id = $_POST["fk_stu_id"];
$fk_sub_name = $_POST["fk_sub_name"];
$fk_adm_year = $_POST["fk_adm_year"];
$semester = $_POST["semester"];
$score = $_POST["score"];
$pnp = $_POST["pnp"];

$sql =" INSERT INTO save_tbl VALUES ('".$fk_stu_id."','".$fk_sub_name."','".$fk_adm_year."','".$score."','".$pnp."','".$semester."')";

$ret = mysqli_query($con, $sql);

if($ret) {
  echo "<script>alert('성적이 입력되었습니다.'); history.back();</script>";
}
else {
  echo "<script>alert('성적입력에 실패했습니다.(성적을 올바르게 입력하였는지 확인해주세요.)'); history.back();</script>";
}
mysqli_close($con);


?>