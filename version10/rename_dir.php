<?php
if (empty($_COOKIE['username']))
{
    echo "<script>alert('Please login first!')</script>";
    echo "<script>window.location.href='login.php';</script>";
}
?>
<html>
<head>
<title>Rename Directory</title>
<meta charset="utf-8"/></head>
<body>
<center>
<font size="6" color="green">Rename Directory</font>
<form name="rename" method="GET" action="rename_dir.php"
 enctype="multipart/form-data">
<table cellspan="0" border="1">
<tr>
<td>Old Directory</td>
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
<td>New Directory</td>
<td><input type="text" name='newname'/></td>
</tr>
<tr>
<td align="center"><input type="reset" name="res" value="Reset"/></td>
<td align="center"><input type="submit" name="submit" value="Rename"/></td>
</tr>
</table>
</form>
<a href="index.php"><font size="3" color="green">(Return home page)</font></a>

<div>
<?php
    if (isset($_GET['submit']))
    {
        $dirname = $_GET['dirname'];
        if (!empty($dirname))
        {
            if (file_exists($dirname))
            {
                $newname = $_GET['newname'];
                if (!empty($newname))
                {
                $newname =  dirname($dirname)."/".$newname;
                if (rename($dirname,$newname))
                    echo "<script>alert('Rename directory successfully!')</script>";
                else
                    echo "<script>alert('Rename directory failed!')</script>";
                }
                else
                    echo "<script>alert('New name can not be empty!')</script>";
            }
            else
            {
                echo "<script>alert('File not exist! Can not be renamed!')</script>";
            }

        }
        else
        {
            echo "<script>alert('Directory name can not be empty!')</script>";
        }
    echo "<script>window.location.href='rename_dir.php';</script>";
    }
?>
</div>
</center>
</body>
</html>
