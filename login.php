<!DOCTYPE html>
<html>
<head>
    <title>后台登录</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="css/login.css" rel="stylesheet" type="text/css" media="all" />

</head>
<body>
    <!-- main -->
    <div class="main">
        <h1>
            后台登录系统
        </h1>
        <form action="login.php" method="post">
            <input type="text" value="用户名" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = '用户名';} name='name' "
                   required="required">
            <input type="password" value="Password" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = '';}" name='pwd'
                   required="required">
            <input type="submit" value="登录">
        </form>
    </div>
    
    <?php 
    include_once 'link.php';
session_start();
if (isset($_SESSION['name'])){
    echo "<script>alert('您已登录，直接去访问！');location='./index.php'</script>";
}else{
        if (isset($_POST['name'])){
            // 去头尾空格
            $name=trim($_POST['name']);
            $upwd=trim($_POST['pwd']);
            // 不为空
            if ($name!=="" && $upwd!==""){
                $res=mysqli_query($link,"select * from manager where name='$name'");
                $result=mysqli_fetch_assoc($res);
                if ($result){
                    if ($upwd==$result['password']){
                        // 保存session
                        $_SESSION['name']=$name;

                        // 判断管理人员
                        if($result['status']=='all')
                            echo "<script>alert('$name,登录成功');location='./indexAll.php'</script>";
                        // 判断审核人员
                        if($result['status']=='reviewer')
                            echo "<script>alert('$name,登录成功');location='./reviewer/indexReviewer.php'</script>";
                        // 判断维修人员
                        if($result['status']=='repair')
                            echo "<script>alert('$name,登录成功');location='./index.php'</script>";
                        // 其他用户
                        echo "<script>alert('$name,登录失败，请联系开发人员');</script>";
                    }else{
                        echo "<script>alert('密码错误！');location='./login.php'</script>";
                    }
                }else{
                    echo "<script>alert('该账号不存在，请重试');location='./login.php'</script>";
                }

            }
        }
}
?>
</body>
</html>