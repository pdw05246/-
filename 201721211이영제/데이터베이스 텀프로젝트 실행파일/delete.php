<?php
    $con = mysqli_connect("localhost", "cookUser", "1234", "modelDB") or die("MySQL 접속 실패!!");

    $fk_sub_name = $_GET["fk_sub_name"];

    $sql = "DELETE FROM save_tbl WHERE fk_sub_name='".$fk_sub_name."'";
    $ret = mysqli_query($con, $sql);

   echo "<H1>회원 삭제 결과</H1>";
   if($ret) {
      echo "<script>alert('삭제되었습니다.'); history.back();</script>";
   }
   else {
      echo "데이터 삭제 실패!!!"."<BR>";
      echo "실패 원인 :".mysqli_error($con);
   }
   mysqli_close($con);
?>