<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" type="text/css" href="./css/common.css">
	<link rel="stylesheet" type="text/css" href="./css/options.css">
	<script type="text/javascript" src="./js/jquery-3.4.1.min.js"></script>
	<title>设定</title>
</head>
<body>

	<!-- 修改密码 -->
	<p>修改密码</p>
	<hr>
	<div class="revise">
		<form action="options.php" method="post">
		<div>
			<label for="old">原密码：</label><input type="text" name="old" placeholder="请输入当前的密码" id="old"><br>
			<label for="new">新密码：</label><input type="text" name="new" placeholder="请输入修改后的密码" id="new"><br>
			<label for="nnew">再次确认：</label><input type="text" name="nnew" placeholder="请再次输入密码" id="nnew"><br>
		</div>
		<input type="submit" style="background-color: #00AAEE; color: #fff"  value="确认修改"/>
		</form>
	</div>

	<?php 
	include_once 'link.php';
	session_start();
	$get=$_SESSION['name'];
	
	if(isset($_SESSION['name'])){
		// 修改密码
	if (isset($_POST['nnew'])) {
		$old=$_POST['old'];
		$pwd=$_POST['new'];
		$npwd=$_POST['nnew'];
		$mm=mysqli_query($link,"select * from manager where name='$get'");
		$res=mysqli_fetch_array($mm);

	if($res['password']==$old){
		if($old!=$pwd){
			if(strlen($pwd)>=6){
				if($pwd==$npwd){
					$change=mysqli_query($link,"update manager set password='$pwd' where name='$get'");
					echo "<script>alert('修改成功！');location='./overview.php'</script>";
				}else echo "<script>alert('两次密码不一致！');</script>";	
			}else echo "<script>alert('密码不能小于6位数！');</script>";	
		}else echo "<script>alert('新旧密码不能相同！');</script>";
	}else{
		echo "<script>alert('原密码不正确！');</script>";	
		return false;
	}
}
		
	}else{
		echo "<script>alert('您还没有登录，没有权限访问！');location='./login.php'</script>";
	}
 ?>

</body>
</html>