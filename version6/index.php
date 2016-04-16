<?php
if (empty($_COOKIE['username']))
{
    echo "<script>alert('请先登陆!')</script>";
    echo "<meta http-equiv='refresh' content='0;login.php'/>";
}
?>
<html>
<head>
<title>管理中心</title>
<meta charset="utf-8"/>
</head>
<body>
<center>
<hr/>
<font size="3" color="grenn">用户名:<?php echo $_COOKIE['username'];?>
&nbsp; &nbsp; <a href='logout.php'>退出</a></font>
<hr/>
<br/>
<a href="http://file.littermonster.net"><font size="6" color="green">文件阅览</font></a><br/>
<a href="upload_file.php"><font size="6" color="green">文件上传</font></a><br/>
<a href="delete_file.php"><font size="6" color="green">文件删除</font></a><br/>
<a href="add_dir.php"><font size="6" color="green">添加目录</font></a><br/>
<a href="delete_dir.php"><font size="6" color="green">删除目录</font></a><br/>
</center>
</body>
</html>
