<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>提交信息</title>
</head>
<body>
<?php include 'link.php'; 
$name=trim($_POST['name']);
$ss=trim($_POST['ss']);
$wx=trim($_POST['wx']);
$phone=trim($_POST['phone']);
$pro=trim($_POST['pro']);

	if(isset($_POST['name'])){
		$res=mysqli_query($link,"insert into message value('$name','$ss','$wx','$phone','$pro', CURTIME(),null,'待审核',null,null)");
		if($res){
			echo "<script>alert('报修信息提交成功，请耐心等候维修人员的联系。')</script>";
		}
	}
?>
</body>
</html>