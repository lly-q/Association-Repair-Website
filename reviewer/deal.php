<?php
include_once '../link.php';
session_start();
$get=$_SESSION['name'];
$res=mysqli_query($link,"select * from manager where name='$get'");
$cj=mysqli_fetch_array($res);
if ($cj['status']!='repair'){
	$status="待维修";
    $num=$_GET['num'];
        if ($num){
        	$res=mysqli_query($link,"update message set status='$status',reviewer='$get'  where num='$num' ");
            echo "<script>alert('通过成功！');location='./pendingReviewer.php'</script>";
        }else{
            echo "<script>alert('您还没有选择单子');location='./pendingReviewer.php'</script>";
            return false;
        }
}else{
    echo "<script>alert('您没有权限操作！');location='./pending.php'</script>";
}
?>
