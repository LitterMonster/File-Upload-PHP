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
&nbsp; &nbsp; <a href='logout.php'>Logout</a></font>
<hr/>
<br/>
<a href="http://file.littermonster.net"><font size="6" color="green">View Files</font></a><br/>
<a href="upload_file.php"><font size="6" color="green">Files Upload</font></a><br/>
<a href="delete_file.php"><font size="6" color="green">Delete files</font></a><br/>
<a href="add_dir.php"><font size="6" color="green">Add new Folder</font></a><br/>
<a href="delete_dir.php"><font size="6" color="green">Delete Folder</font></a><br/>
<a href="rename_dir.php"><font size="6" color="green">Rename Folder</font></a><br/>
<a href="collection.php"><font size="6" color="green">Recycle Bin</font></a><br/>
</center>
</body>
</html>
