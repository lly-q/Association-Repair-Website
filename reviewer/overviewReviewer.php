<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>总览</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" type="text/css" href="../css/common.css">
	<link rel="stylesheet" type="text/css" href="../css/overview.css">
</head>
<body>

<?php 
include_once '../link.php';
session_start();
if(isset($_SESSION['name'])){
	$name=$_SESSION['name'];
	// 待审核单数
	$s=mysqli_query($link,"select * from message where status='待审核'");
	$deal=($s->num_rows);
	// 总数
	$d=mysqli_query($link,"select * from message");
	$finish=($d->num_rows);
	//已完成单数
	$during=$finish-$deal;
}
?>


	<div class="big">
		<p>维修清单总览</p>
		<fieldset class="list">
			<legend>总单数</legend>
			<span class="num one"><a href="#"><?php echo $finish; ?></a></span>
		</fieldset>
		<br class="hide">
		<fieldset class="list">
			<legend>待审核</legend>
			<span class="num two"><a href="./pendingReviewer.php"><?php echo $deal; ?></a></span>
		</fieldset>
		<br class="hide">
		<fieldset class="list">
			<legend>已完成</legend>
			<span class="num four"><a href="./solvedReviewer.php"><?php echo $during; ?></a></span>
		</fieldset>
	</div>
</body>
</html>