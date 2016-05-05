<?php
if (empty($_COOKIE['username']))
{
    echo "<script>alert('Please login first!')</script>";
    echo "<script>window.location.href='login.php';</script>";
}
?>
<html>
<head>
<title>Center</title>
<meta charset="utf-8"/>
</head>
<body>
<center>
<hr/>
<font size="3" color="grenn">UserName:<?php echo $_COOKIE['username'];?>
&nbsp; &nbsp; <a href='logout.php'>logout</a></font>
<hr/>
<br/>
<a href="http://file.littermonster.net"><font size="6" color="green">View Files</font></a><br/>
<a href="upload_file.php"><font size="6" color="green">Files Upload</font></a><br/>
<a href="delete_file.php"><font size="6" color="green">Delete file</font></a><br/>
<a href="add_dir.php"><font size="6" color="green">Add Directory</font></a><br/>
<a href="delete_dir.php"><font size="6" color="green">Delete Directory</font></a><br/>
</center>
</body>
</html>
