<?php
if (empty($_COOKIE['username']))
{
    echo "<script>alert('请先登陆!')</script>";
    echo "<meta http-equiv='refresh' content='0;login.php'/>";
}
?>
<html>
<head>
<title>文件上传</title>
<meta charset="utf-8"/></head>
<body>
<center>
<font size="6" color="green">文件上传</font>
<form name="upload" method="POST" action="proc_upload.php" enctype="multipart/form-data">
<table cellspan="0" border="1">
<tr>
<td>目录</td>
<td align="center">
<select name="dir">
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
<td>选择文件</td>
<td><input type="file" name="userfiles[]" id = "file"></td>
</tr>
<td>选择文件</td>
<td><input type="file" name="userfiles[]" id = "file"></td>
</tr>
<td>选择文件</td>
<td><input type="file" name="userfiles[]" id = "file"></td>
</tr>
<td>选择文件</td>
<td><input type="file" name="userfiles[]" id = "file"></td>
</tr>
<td>选择文件</td>
<td><input type="file" name="userfiles[]" id = "file"></td>
</tr>
<tr>
<td>选择文件</td>
<td><input type="file" name="userfiles[]" id = "file"/></td>
</tr>
<tr>
<td>选择文件</td>
<td><input type="file" name="userfiles[]" id = "file"/></td>
</tr>
<tr>
<td>选择文件</td>
<td><input type="file" name="userfiles[]" id = "file"/></td>
</tr>
<tr>
<td>选择文件</td>
<td><input type="file" name="userfiles[]" id = "file"/></td>
</tr>
<tr>
<td>选择文件</td>
<td><input type="file" name="userfiles[]" id = "file"/></td>
</tr>
<tr>
<td align="center"><input type="reset" name="res" value="重置"/></td>
<td align="center"><input type="submit" name="submit" value="提交"/></td>
</tr>
</table>
</form>
<a href="index.php"><font size="3" color="green">(返回主页)</font></a>
</body>
</center>
</html>