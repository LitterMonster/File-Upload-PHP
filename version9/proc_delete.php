<?php
if (empty($_COOKIE['username']))
{
    echo "<script>alert('Please login first!')</script>";
    echo "<script>window.location.href='login.php';</script>";
}
?>
<meta charset="utf-8"/></head>
<?php
#$fullpath = iconv('gbk', 'utf-8', $_GET['fullpath']);
if (! file_exists($_GET['fullpath']))
{
    echo "<script>alert('File not exist!Delete failed!')</script>";
    die;
}

if (unlink($_GET['fullpath']))
    echo "<script>alert('Delete successed!!')</script>";
else
    echo "<script>alert('Delete failed!')</script>";
echo "<script>window.location.href='delete_file.php';</script>";
?>
