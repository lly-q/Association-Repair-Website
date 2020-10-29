<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<title>红蓝电脑协会控制台</title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<link rel="stylesheet" href="./css/font-awesome.css">
<link rel="stylesheet" href="./css/style.css">
<script type="text/javascript">
	// 设置fontsize大小
	(function(doc, win) {
    setRem();
    var resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize',
        recalc = function() {
            setRem();
        };
    if (!doc.addEventListener)
        return;
    win.addEventListener(resizeEvt, recalc, false);
    // doc.addEventListener('DOMContentLoaded', recalc, false);
})(document, window);
 
function setRem() {
    var docEl = document.documentElement;
    var clientWidth = docEl.clientWidth;
    if (!clientWidth) {
        return;
    }
    docEl.style.fontSize = 10 * (clientWidth / 1080) + 'px';
}
</script>
</head>
<body>

<nav class="menu-wrap">
	<div class="logo"><img src="./img/logo.jpg" alt="" id="logo"><span id="hide">红蓝电脑协会</span></div>
	<div class="menu">
		<ul>
			<li>
				<a href="./overviewAll.php"  target="mainFrame">
					<i class="fa fa-home fa-lg"></i>
					<span class="nav-text">总览</span>
				</a>
			</li>
			<li>
				<a href="./reviewer/pendingReviewer.php" target="mainFrame">
					<i class="fa fa-envelope fa-lg"></i>
					<span class="nav-text">待审核</span>
				</a>
			</li>
			<li>
				<a href="./pending.php" target="mainFrame">
					<i class="fa fa-envelope-o fa-lg"></i>
					<span class="nav-text">待维修</span>
				</a>
			</li>
			<li>
				<a href="./processing.php"  target="mainFrame">
					<i class="fa fa-folder-open fa-lg"></i>
					<span class="nav-text">维修中</span>
				</a>
			</li>
			<li>
				<a href="./solved.php"  target="mainFrame">
					<i class="fa fa-envelope-open-o fa-lg"></i>
					<span class="nav-text">已完成</span>
				</a>
			</li>
			<li>
				<a href="./optionsAll.php"  target="mainFrame">
					<i class="fa fa-gear fa-lg"></i>
					<span class="nav-text">设置</span>
				</a>
			</li>
			<!-- <li class="darkerlishadow">
				<a href=" ">
					<i class="fa fa-clock-o fa-lg"></i>
					<span class="nav-text">新闻</span>
				</a>
			</li>

			<li class="darkerli">
				<a href=" ">
					<i class="fa fa-desktop fa-lg"></i>
					<span class="nav-text">技术</span>
				</a>
			</li>
			<li class="darkerlishadowdown">
				<a href=" ">
					<i class="fa fa-rocket fa-lg"></i>
					<span class="nav-text">娱乐</span>
				</a>
			</li> -->
			<!-- <li>
				<a href="help.html"  target="mainFrame">
					<i class="fa fa-question-circle fa-lg"></i>
					<span class="nav-text">帮助</span>
				</a>
			</li>
			如有疑问联系豪杰WeChat:lhj2593651321 -->
		</ul>
	</div>
</nav>
	
<div id="right">
<?php 
   include_once 'link.php';
   session_start();
   
   if (isset($_SESSION['name'])){
       $name=$_SESSION['name'];
   }else{
       echo "<script>alert('您还没有登录，没有权限访问！');location='./login.php'</script>";
   }
?>

	<header>欢迎，<?php echo $name; ?>
		<div class="right">
			<!-- <a href="./repwd.php" target="mainFrame">
				<i class="fa fa-lock fa-lg"></i>
				<span class="nav-text">修改密码</span>
			</a><br> -->
			<a href="./exit.php">
				<i class="fa fa-sign-out fa-lg"></i>
				<span class="nav-text">退出系统</span>
			</a>
		</div>
	</header>
	<iframe scrolling="yes" id="mainFrame" name="mainFrame" frameborder="0" style="width:100%;min-height:600px;overflow:visible;background:#fff;" src="overview.php"></iframe>
</div>

</body>
</html>