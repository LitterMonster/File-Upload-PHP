<?php
if (empty($_COOKIE['username']))
{
    echo "<script>alert('Please login first!')</script>";
    echo "<script>window.location.href='login.php';</script>";
}
?>
<html>
<head>
<script type='text/javascript'>
function sure() {
    if (confirm('Are you sure you want to delete directory?'))
        document.upload.submit();
    else
        return false;
}
</script>
<title>Delete Directory</title>
<meta charset="utf-8"/></head>
<body>
<center>
<font size="6" color="green">Delete Directory</font>
<form name="upload" method="GET" action="delete_dir.php"
 enctype="multipart/form-data">
<table cellspan="0" border="1">
<tr>
<td>Directory</td>
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
<td align="center"><input type="reset" name="res" value="Reset"/></td>
<td align="center"><input type="submit" name="submit" value="Delete"/></td>
</tr>
</table>
</form>
<a href="index.php"><font size="3" color="green">(Return home page)</font></a>

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
                    echo "<script>alert('Delete directory successfully!')</script>";
                else
                    echo "<script>alert('Delete directory failed!')</script>";
            }
            else
            {
                echo "<script>alert('File not exist! Can not delete!')</script>";
            }

        }
        else
        {
            echo "<script>alert('Directory name can not be empty!')</script>";
        }
    echo "<script>window.location.href='delete_dir.php';</script>";
    }
?>
</div>
</center>
</body>
</html>
