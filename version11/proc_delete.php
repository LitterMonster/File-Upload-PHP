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


#if (unlink($_GET['fullpath']))
$basename = basename($_GET['fullpath']);
if (rename($_GET['fullpath'], "/var/www/html/up/Collection/$basename"))
    echo "<script>alert('Delete successfully!!')</script>";
else
    echo "<script>alert('Delete failed!')</script>";
$dir = $_GET['dir'];
echo "<script>window.location.href='delete_file.php?dir=$dir';</script>";
?>
