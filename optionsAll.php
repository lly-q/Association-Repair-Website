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
	<!-- <p id="n" style="height: 20px;width: 50px;background-color: #f60"></p> -->


	<!-- 顶级权限，普通人员无法使用 -->
	<!-- 创建用户 -->
	<div id="hide">
		<p>创建新用户</p>
		<hr>
		<div class="regist">
			<form action="options.php" method="post">
			<div class="message">
				<label>注册：<input type="text" name="name" placeholder="请输入要注册的名字"></label>
				<br>

				<span>权限：</span><select name="sta">
					<option value="repair" selected="selected">维修人员</option>
					<option value="all">管理人员</option>
					<option value="reviewer">审核人员</option>
				</select>
			</div><br>
			<!-- <input type="button" style="background-color: #00AAEE; color: #fff"  value="增加" onclick="add();" id="ad" /> -->
			<input type="submit" style="background-color: #00AAEE; color: #fff"  value="注册" />
		</form>
		</div>
	</div>
	


	<?php 
	include_once 'link.php';
	session_start();
	$get=$_SESSION['name'];
	
	if(isset($_SESSION['name'])){
		// 注册新号
		if (isset($_POST['name'])) {
			$name=$_POST['name'];
			$status=$_POST['sta'];
		$res=mysqli_query($link,"select * from manager where name='$get'");
		$cj=mysqli_fetch_array($res);
		$yz=$cj['status'];
		if($yz=='all'){
			$add=mysqli_query($link,"insert into manager value('','$name','123456','$status')");
			echo "<script>alert('注册成功！');location:'./optionsAll.php'</script>";

		}else{	
			echo "<script>alert('您没有权限操作！');location='./overview.php'</script>";
			}	
		};

		
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


<!-- <script type="text/javascript">
	function show(){
		$.ajax({
			type:"POST",
			url:"./options.php",
			data:{},
			success:function(data){
				console.log(data);
			}
		})
	}
	// document.getElementById("#n").innerHTML=wz;
	// if (<?php $yz?> =='all' ) {
	// 	hide.style.display="block";}
 </script> -->
</body>
</html>