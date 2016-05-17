<?php
if (empty($_COOKIE['username']))
{
    echo "<script>alert('Please login first!')</script>";
    echo "<script>window.location.href='login.php';</script>";
}
?>
<html>
<head>
<title>Add new directory</title>
<meta charset="utf-8"/></head>
<body>
<center>
<font size="6" color="green"> Add new directory</font>
<form name="adddir" method="GET" action="add_dir.php" enctype="multipart/form-data">
<table cellspan="0" border="1">
<tr>
<td>Directory Name</td>
<td><input type = "text" name="dirname"/></td>
</tr>
<tr>
<td align="center"><input type="reset" name="res" value="Reset"/></td>
<td align="center"><input type="submit" name="submit" value="Submit"/></td>
</tr>
</table>
<a href="index.php"><font size="3" color="green">(Return home page)</font></a>

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
                echo "<script>alert('Directory was created successfully!')</script>";
            }
            else
            {
                echo "<script>alert('Directory has been existed!')</script>";
            }

        }
        else
        {
            echo "<script>alert('Directory name can not be empty!')</script>";
        }
    echo "<script>window.location.href='add_dir.php';</script>";
    }
?>
</div>
</center>
</html>
