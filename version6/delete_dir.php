<?php
if (empty($_COOKIE['username']))
{
    echo "<script>alert('请先登陆!')</script>";
    echo "<meta http-equiv='refresh' content='0;login.php'/>";
}
?>
<html>
<head>
<title>目录删除</title>
<meta charset="utf-8"/></head>
<body>
<center>
<font size="6" color="green">目录删除</font>
<form name="upload" method="GET" action="delete_dir.php" enctype="multipart/form-data">
<table cellspan="0" border="1">
<tr>
<td>目录</td>
<td align="center">
<select name="dirname">
<option value=""></option>
<?php 
    $filesnames = scandir("/var/www/html/file/");
    $baseurl = "/var/www/html/file/";
    foreach ($filesnames as $name) {
            if ($name != '.' && $name != '..')
                echo "<option value='".$baseurl.$name."/'>$name</option>";
    }
?>
</select>
</td>
</tr>
<tr>
<td align="center"><input type="reset" name="res" value="重置"/></td>
<td align="center"><input type="submit" name="submit" value="删除"/></td>
</tr>
</table>
</form>
<a href="index.php"><font size="3" color="green">(返回主页)</font></a>

<div>
<?php
    function deldir($dirname)
    {
        $dh = opendir($dirname);
        while ($file = readdir($dh))
        {
            if ($file != "." && $file != "..")
            {
                $fullpath = $dirname.$file;
                if (!is_dir($fullpath))
                    unlink($fullpath);
                else
                    deldir($fullpath);
            }
        }
        closedir($dh);

        if(rmdir($dirname))
            return true;
        else
            return false;
    }
?>
<?php
    if (isset($_GET['submit']))
    {
        $dirname = $_GET['dirname'];
        if (!empty($dirname))
        {
            if (file_exists($dirname))
            {
                if (deldir($dirname) == true)
                    echo "<script>alert('目录删除成功!')</script>";
                else
                    echo "<script>alert('目录删除失败!')</script>";
            }
            else
            {
                echo "<script>alert('目录不存在，无法删除!')</script>";
            }

        }
        else
        {
            echo "<script>alert('目录名不能为空!')</script>";
        }
    echo "<meta http-equiv='refresh' content='0;delete_dir.php'/>";
    }
?>
</div>
</center>
</body>
</html>
