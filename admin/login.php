<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>登陆</title>
<link type="text/css" rel="stylesheet" href="css/reset.css">
<link type="text/css" rel="stylesheet" href="css/main.css">
</head>
<body>
	<div class="headerBar">
		<div class="logoBar login_logo">
			<div class="comWidth">
				<div class="logo fl">
					<a href="#"><img src="images/logo.jpg" alt="logo"></a>
				</div>
				<h3 class="welcome_title">欢迎登陆</h3>
			</div>
		</div>
	</div>
	<div class="loginBox">
		<div class="login_cont">
			<form action="dologin.php" method="POST">
				<ul class="login">
					<li class="l_tit">管理员帐号</li>
					<li class="mb_10"><input type="text" name="username"
						placeholder="请输入管理员帐号" class="login_input user_icon"></li>
					<li class="l_tit">密码</li>
					<li class="mb_10"><input type="password" name="password"
						class="login_input password_icon"></li>
					<li class="l_tit">验证码</li>
					<li class="mb_10"><input type="text" name="verify"
						class="login_input password_icon" size="10"> <img src="./getVerify.php" id="getverify"
						alt="验证码" />
						<a href="javascript:void(0)" onclick="document.getElementById('getverify').src='./getVerify.php?r='+Math.random()">看不清？换一个</a></li>
					<li class="autoLogin"><input type="checkbox" id="a1"
						class="checked" name="autoFlag" value="1"><label for="a1">自动登陆(一周内自动登陆)</label></li>
					<li><input type="submit" value="" class="login_btn" onclick="return check();"></li>
				</ul>
			</form>
		</div>
	</div>
	<div class="hr_25"></div>
	<div class="footer">
		<p>
			<a href="#">网站简介</a><i>|</i><a href="#">网站公告</a><i>|</i><a
				href="mailto:3024812382@qq.com">联系我们</a>
		</p>
		<p>Copyright &copy; 2017Fallen丶Fate版权所有&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;邮箱：3024812382@qq.com</p>		
	</div>
	<script type="text/javascript">
	function check() {
		if (form.username.value=="") {
			alert("请输入用户名！");
			form.username.focus();
			return false;
		}
		if(form.password.value==""){
			alert("密码不能为空！");
			form.password.focus();
			return false;
	}}
	</script>
</body>
</html>
