<?php
if (empty($_COOKIE['username']))
{
    echo "<script>alert('Please login first!')</script>";
    echo "<script>window.location.href='login.php';</script>";
}
?>
<html>
<head>
<title>Delete file</title>
<meta charset="utf-8"/></head>
<body>
<center>
<font size="6" color="green">Upload files</font>
<form name="upload" method="POST" action="proc_upload.php" enctype="multipart/form-data">
<table cellspan="0" border="1">
<tr>
<td>Directory</td>
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
<td>Select file</td>
<td><input type="file" name="userfiles[]" id = "file"></td>
</tr>
<td>Select file</td>
<td><input type="file" name="userfiles[]" id = "file"></td>
</tr>
<td>Select file</td>
<td><input type="file" name="userfiles[]" id = "file"></td>
</tr>
<td>Select file</td>
<td><input type="file" name="userfiles[]" id = "file"></td>
</tr>
<td>Select file</td>
<td><input type="file" name="userfiles[]" id = "file"></td>
</tr>
<tr>
<td>Select file</td>
<td><input type="file" name="userfiles[]" id = "file"/></td>
</tr>
<tr>
<td>Select file</td>
<td><input type="file" name="userfiles[]" id = "file"/></td>
</tr>
<tr>
<td>Select file</td>
<td><input type="file" name="userfiles[]" id = "file"/></td>
</tr>
<tr>
<td>Select file</td>
<td><input type="file" name="userfiles[]" id = "file"/></td>
</tr>
<tr>
<td>Select file</td>
<td><input type="file" name="userfiles[]" id = "file"/></td>
</tr>
<tr>
<td align="center"><input type="reset" name="res" value="Reset"/></td>
<td align="center"><input type="submit" name="submit" value="Submit"/></td>
</tr>
</table>
</form>
<a href="index.php"><font size="3" color="green">(Return home page)</font></a>
</body>
</center>
</html>
