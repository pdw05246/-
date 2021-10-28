<html>
<head>
	<meta charset="utf-8" />
	<title>회원가입, 로그인 창</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login_style.css">
	<script src="https://kit.fontawesome.com/41cb8446c6.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
	<div class="register-popUp">
        <div class="web-left">
            <header>
                <h1>"슬기로운"<br>대학생활</h1>
                <div>슬기로운 대학생활에 오신 여러분을 환영합니다.</div>
            </header>

            <form action="login_ok.php" method="post" class="register">
				<input type="text" name="stu_id" placeholder="아이디">
                <input type="password" name="pw" placeholder="비밀번호">
                <button type="submit">로그인</button>
            </form>
            <div class="back-home">
                <div>메인화면으로 돌아가기</div>
                <a href="daemoon.php"><i class="fa fa-home fa-2x" aria-hidden="true"></i></a>
            </div>
            <div class="log-in">아이디가 없나요?
                <a href="register.html" id="log-in">회원가입</a>
			</div>
			<div class="find_id">
			</div>
		</div>
        <div class="web-right">
            <img src="images/kku3.jpg">
        </div>
    </div>
</body>
</html>
