<html>
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
	</head>
<?php 
echo "<h1>It works!</h1>";
echo "<br/><a href='login.php'>重新登录</a>";
?>
	<h1>欢迎管理员<?php echo $_GET['name']; ?>登录</h1>
	<a href="empList.php">管理用户</a><br/>
	<a href="#">添加用户</a><br/>
	<a href="#">查询用户</a><br/>
	<a href="#">退出系统</a><br/>
</html>