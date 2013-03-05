<?php 
	//接收用户的数据
	//1.id
	$id=$_POST['id'];
	//2.密码
	$password=$_POST['password'];
	//到数据库去验证 mysql mysqli
	$conn=mysql_connect("localhost","root","");
	if(!$conn){
		die("连接失败".mysql_errno());
	}
	//设置访问数据库的编码
	mysql_query("set names utf8",$conn) or die(mysql_errno());
	//选择数据库
	mysql_select_db("empmanage",$conn);
	//发送sql语句，验证
	//防止sql注入攻击
	//变化验证逻辑
	$sql="select password from admin where id=$id";
	//1。通过输入的id来获取数据库的密码，然后再和输入的密码比对
	$res=mysql_query($sql,$conn);
	if($row=mysql_fetch_assoc($res)){
		//查询到了
		//2.取出数据库的密码
		if($row['password']==md5($password)){
			header("Location:empManage.php");
			exit();
		}
	}
	header("Location:login.php?errno=1");
	exit();
	//关闭资源
	mysql_free_result($res);
	mysql_close($conn);
	//简单验证(先不到数据库)
	/* if($id=="100" && $password=="123"){
		//合法，跳转到empManage.php
		header("Location:empManage.php");
		exit();
	}else{
		//非法
		header("Location:login.php?errno=1");
		exit();
	} */
?>