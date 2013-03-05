<html>
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8">
		<title>雇员信息列表</title>
	</head>
	<?php 
	//1.创建连接
	$conn=mysql_connect("localhost","root","");
	//2.判断是否有连接
	if(!$conn){
		die("连接失败".mysql_errno());
	}/* else{
		echo "连接成功";
	} */
	//3.设置访问数据库编码
	mysql_query("set names uft8",$conn);
	//4.连接数据库
	mysql_select_db("empmanage",$conn) or die(mysql_errno());
	
	//5.查询语句
	//死去活来法,显示$pageSize=3的用户
	
	$pageSize=3;//每页显示几条信息
	$rowCount=0;//这个变量值，要从数据库emp的表获取
	$pageNow=1;//显示第几页，变量
	$pageCount=0;
	$sql="select count(id) from emp";
	$res1=mysql_query($sql,$conn);
	//取出返回行数的值
	if($row=mysql_fetch_row($res1)){
		$rowCount=$row[0];
	}
	//计算共有多少页
	$pageCount=ceil($rowCount/$pageSize);
	//设置默认为第一页
	if(!empty($_GET['pageNow'])){
		$pageNow=$_GET['pageNow'];
	}
	$sql="select * from emp limit ".($pageNow-1)*$pageSize.",$pageSize";
	//6.返回结果
	$res2=mysql_query($sql,$conn);
	//7.遍历,并显示出来
	echo "<table border='1' width='700px' cellspacing cellpadding>";
	echo "<tr><th>id</th><th>name</th><th>grade</th><th>email</th><th>salary</th><th>修改用户</th><th>删除用户</th></tr>";
	while($row=mysql_fetch_assoc($res2)){
		echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['grade']}</td><td>{$row['email']}</td><td>{$row['salary']}</td><td><a href='#'>修改用户</a></td><td><a href='#'>删除用户</a></td></tr>";
	}
	echo "<h1>雇员信息列表</h1>";
	echo "</table>";
	//上一页
	if($pageNow>1){
		$prePage=$pageNow-1;
		echo "<a href='empList.php?pageNow=$prePage'>上一页</a>&nbsp;";
	}else{
		$pageNow=1;
	}
	
	//打印出页码
	
	for($i=1;$i<=$pageCount;$i++){
		
		echo "<a href='empList.php?pageNow=$i'>{$i}</a>&nbsp;";
	}
	//下一页
	if($pageNow<$pageCount){
		$pageNext=$pageNow+1;
		echo "<a href='empList.php?pageNow=$pageNext'>下一页</a>&nbsp;";
	}else{
	$pageNow=$pageCount;
	}
	echo "当前是第{$pageNow}&nbsp;&nbsp;共{$pageCount}页<br/>";
	//echo "<form action='empList.php?pageNow=goto' method='post'>跳转到<input type='text' name='goto' /><input type='submit' value='Go' /></form>";
	//8.分页
	// $pageNow->显示第几页 用户输入或者指定
	// $pageCount->共几页  [在程序中算法]
	// $rowCount->共有多少条记录 通过数据库获取
	// $pageSize->每页显示多少条记录 
	
	//实例
	//$pageNow=1
	//$rowCount=7
	//$pageSize=3
	//讨论 $pageCount 怎么样计算
	//小算法
	/* <?php
	 if($rowCount%$pageSize==0){
	 	$pageCount=ceil($rowCount/$pageSize);
	 }
	?> */
	mysql_free_result($res1);
	mysql_free_result($res2);
	mysql_close($conn);
	?>
</html>