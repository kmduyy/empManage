<html>
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8">
	</head>
	<title>雇员列表</title>
	<?php
		//创建连接
		$conn=mysql_connect("localhost","root","") or die("连接错误".mysql_errno());
		//设置访问数据库编码
		mysql_query("set names utf8",$conn) or die("编码错误".mysql_errno()); 
		//连接数据库
		mysql_select_db("empmanage",$conn) or die("数据库连接失败".mysql_errno());
		//分页
		$pageNow=1;//当前显示第几页
		$pageSize=3;//每页显示几条
		$pageCount=0;//共有几页
		$rowCount=0;//共有几条记录
		$sql="select count(id) from emp";
		$res2=mysql_query($sql,$conn);
		$row1=mysql_fetch_row($res2);
		//echo $row1[0];
		$rowCount=$row1[0];
		$pageCount=ceil($rowCount/$pageSize);
		
		if(!empty($_GET['page'])){
			$pageNow=$_GET['page'];
		}else{
			$pageNow=1;
		}
		
		//查询语句
		$sql="select * from emp limit ".($pageNow-1)*$pageSize.",$pageSize";
		//查询
		$res1=mysql_query($sql,$conn);
		echo "<table border=1 width=200px  cellpadding=0 cellspacing=0>";
		echo "<tr><th>ID</th><th>name</th><th>grade</th><th>email</th><th>salary</th></tr>";
		//$row=mysql_fetch_assoc($res1);
		//echo $row['name'];
		while($row=mysql_fetch_assoc($res1)){
			echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['grade']}</td><td>{$row['email']}</td><td>{$row['salary']}</td></tr>";
		}
		echo "</table>";
		//打印页码
		//上一页
		if($pageNow>1){
			$prePage=$pageNow-1;
			echo "<a href='empList.php?page=$prePage'>上一页</a>&nbsp;&nbsp;&nbsp;";
		}
		for($i=1;$i<=$pageCount;$i++){
			echo "<a href='empList.php?page=$i'>$i</a>&nbsp;&nbsp;&nbsp;";
		}
		//下一页
		if($pageNow<$pageCount){
			$nextPage=$pageNow+1;
			echo "<a href='empList.php?page=$nextPage'>下一页</a>&nbsp;&nbsp;&nbsp;";
		}
		
	?>
</html>