<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>退出系统</title>
</head>
<body>
<?php 
	session_start();
	if(isset($_SESSION['name'])){
		unset($_SESSION['name']);
		header("location:./login.php");
	}else{
		echo "<script>alert('暂未登录，无需退出');location:'./login.php'</script>";
	}
 ?>
</script>
</body>
</html>