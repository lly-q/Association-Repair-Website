<?php
include_once 'link.php';
session_start();
$get=$_SESSION['name'];
$res=mysqli_query($link,"select * from manager where name='$get'");
$cj=mysqli_fetch_array($res);
if ($cj['status']!='reviewer'){
	$status="维修中";
    $num=$_GET['num'];
        if ($num){
        	$res=mysqli_query($link,"update message set status='$status',repair='$get'  where num='$num' ");
            echo "<script>alert('接单成功！');location='./pending.php'</script>";
        }else{
            echo "<script>alert('您还没有接单');location='./index.php'</script>";
            return false;
        }
}else{
    echo "<script>alert('您没有权限操作！');location='./pending.php'</script>";
}
?>
