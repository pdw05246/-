<meta charset="utf-8" />
<?php

  $con = mysqli_connect("localhost", "cookUser", "1234", "modeldb") or die("MySQL 접속 실패!!");

	$stu_id = $_POST["stu_id"];

	if($stu_id == "" || $_POST["pw"] == ""){
		echo '<script> alert("아이디나 패스워드 입력하세요"); history.back(); </script>';
	}else{


	$password = $_POST['pw'];
	$sql = "select * from stu_tbl where stu_id = ('".$stu_id."')";
	$result = $con -> query($sql);
	$stu_tbl = $result->fetch_array();
	$hash_pw = $stu_tbl['pw'];
  session_start();
  $_SESSION['stu_id'] = $stu_tbl['stu_id'];

	if($stu_id == $stu_tbl['stu_id'] && $password == $stu_tbl['pw'])
	{
		$_SESSION['stu_id'];
		echo "<script>alert('{$_SESSION['stu_id']} 님 환영합니다.'); location.href='main.php';</script>";
	}else{
		echo "<script>alert('아이디 혹은 비밀번호를 확인하세요.'); history.back();</script>";
	}
}
?>
