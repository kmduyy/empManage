<html>
	<head>
		<title></title>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	</head>
	<h1>管理员登录系统</h1>
	<form action="loginProcess.php" method="post">
		<table>
			<tr>
				<td>用户ID</td><td><input type="text" name="id" /></td>
			</tr>
			<tr>
				<td>密&nbsp;码</td><td><input type="password" name="password" /></td>
			</tr>
			<tr>
				<td><input type="submit" name="sub" value="用户登录" /></td>
			</tr>
			<tr>
				<td><input type="reset" name="sub" value="重新填写" /></td>
			</tr>
		</table>
	</form>
	<?php 
		//接收
		if(!empty($_GET["errno"])){
			//接收错误编号
			$errno=$_GET['errno'];
			if($errno==1){
				echo "<br/><font color='red' size='3'>你的用户名或密码错误！</font>";
			}
		}
	?>
</html>