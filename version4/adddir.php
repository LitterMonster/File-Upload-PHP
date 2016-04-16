<html>
<head>
<title>添加新目录</title>
<meta charset="utf-8"/></head>
<body>
<center>
<font size="6" color="green">添加新目录</font>
<form name="adddir" method="GET" action="adddir.php" enctype="multipart/form-data">
<table cellspan="0" border="1">
<tr>
<td>目录名</td>
<td><input type = "text" name="dirname"/></td>
</tr>
<tr>
<td align="center"><input type="reset" name="res" value="重置"/></td>
<td align="center"><input type="submit" name="submit" value="提交"/></td>
</tr>
</table>
<a href="index.php"><font size="3" color="green">(返回主页)</font></a>

<div>
<?php
    if (isset($_GET['submit']))
    {
        $dirname = $_GET['dirname'];
        if (!empty($dirname))
        {
            $dirname = "/var/www/html/file/$dirname";
            if (!file_exists($dirname))
            {
                mkdir($dirname);
                chmod($dirname,0777);
                echo "<script>alert('目录创建成功!')</script>";
            }
            else
            {
                echo "<script>alert('目录已存在!')</script>";
            }

        }
        else
        {
            echo "<script>alert('目录名不能为空!')</script>";
        }
    echo "<meta http-equiv='refresh' content='0;adddir.php'/>";
    }
?>
</div>
</center>
</html>
