<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>添加管理员</title>
</head>
<body>
	<form action="handleAdmin.php" method="post" style="text-align:center">
	<table class="a"  style="border: 1;border-collapse:collapse;border-spacing:0;background-color:#cccccc;margin:0 auto; ">
	<tr>
		<td class="b">请输入管理员名称：</td>
		<td class="c"><input type="text" name="username" class="username" placeholder="请输入管理员名称！" /></td>
         
	</tr>
	<tr>
		<td class="b">请输入管理员密码：</td>
		<td class="c"><input type="password" name="password" class="password"></td>
		
	</tr>	   
	<tr>	
		<td colspan="2"><input type="button" value="查看列表" onclick="window.location.href='listAdmin.php';">
<input type="button" value="添加管理员" onclick="return addAdmin(form);"></td>
	</tr>
	</table>
	</form>
	<script type="text/javascript">
	 function addAdmin(form) {
			if(form.username.value=="") {
				alert('用户名不能为空');
				form.username.focus();
				return false;
			}
			if(form.password.value=="") {
				alert('密码不能为空！');
				form.password.focus();
				return false;
			}
		}
	</script>
</body>
</html>