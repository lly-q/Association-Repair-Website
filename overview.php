<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>总览</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" type="text/css" href="./css/common.css">
	<link rel="stylesheet" type="text/css" href="./css/overview.css">
</head>
<body>

<?php 
include_once 'link.php';
session_start();
if(isset($_SESSION['name'])){
	$name=$_SESSION['name'];
	$a=mysqli_query($link,"select * from message");
	$all=($a->num_rows);

	$s=mysqli_query($link,"select * from message where status='待维修'");
	$deal=($s->num_rows);

	$d=mysqli_query($link,"select * from message where status='维修中'");
	$during=($d->num_rows);

	$f=mysqli_query($link,"select * from message where status='已完成'");
	$finish=($f->num_rows);
}
?>


	<div class="big">
		<p>维修清单总览</p>
		<fieldset class="list">
			<legend>总单数</legend>
			<span class="num one"><a href="#"><?php echo $all; ?></a></span>
		</fieldset>
		<br class="hide">
		<fieldset class="list">
			<legend>待处理</legend>
			<span class="num two"><a href="./pending.php"><?php echo $deal; ?></a></span>
		</fieldset>
		<br class="hide">
		<fieldset class="list">
			<legend>处理中</legend>
			<span class="num three"><a href="./processing.php"><?php echo $during; ?></a></span>
		</fieldset>
		<br class="hide">
		<fieldset class="list">
			<legend>已完成</legend>
			<span class="num four"><a href="./solved.php"><?php echo $finish; ?></a></span>
		</fieldset>
	</div>
</body>
</html>