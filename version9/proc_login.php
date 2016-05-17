<meta charset="utf-8"/>
<?php
$username = $_POST['username'];
$password = md5($_POST['password']);
if (empty($username) || empty($password))
{
    echo "<script>alert('Password can not be empty!')</script>";
    echo "<script>window.location.href='login.php';</script>";
}

if (($username == 'zhangtao') || ($username == 'unclecattony')
    || $username == '')
{
    if ($username == "zhangtao")
    {
        //I removed the password
        if ($password == md5(""))
        {
            setcookie('username', "zhangtao", time()+3600);
            #header("location:index.php");
            echo "<script>window.location.href='index.php';</script>";
        }
        else
        {
            echo "<script>alert('Password Error, Please try again!')</script>";
            echo "<script>window.location.href='login.php';</script>";
        }
    }
    else if ($username == '')
    {
        if ($password == md5(""))
        {
            setcookie('username', "", time()+3600);
            #header("location:index.php");
            echo "<script>window.location.href='index.php';</script>";
        }
        else
        {
            echo "<script>alert('Password Error, Please try again!')</script>";
            echo "<script>window.location.href='login.php';</script>";
        }
    }
    else
    {
        //I remove the password
        if ($password == md5(""))
        {
            setcookie('username', "unclecattony", time()+3600);
            echo "<script>window.location.href='index.php';</script>";
        }
        else
        {
            echo "<script>alert('Password Error, Please try again!')</script>";
            echo "<script>window.location.href='login.php';</script>";
        }
    }
}
else
{
    echo "<script>alert('Permission denied!')</script>";
    echo "<script>window.location.href='login.php';</script>";
}
?>
