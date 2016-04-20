<meta charset="utf-8"/>
<?php
$username = $_POST['username'];
$password = md5($_POST['password']);
if (empty($username) || empty($password))
{
    echo "<script>alert('用户名和密码不能为空!')</script>";
    echo "<script>window.location.href='login.php';</script>";
}

if (($username == 'zhangtao') || ($username == 'unclecattony'))
{
    if ($username == "zhangtao")
    {
        //I removed the password
        if ($password == md5("zt521.+a"))
        {
            setcookie('username', "zhangtao", time()+3600);
            #header("location:index.php");
            echo "<script>window.location.href='index.php';</script>";
        }
        else
        {
            echo "<script>alert('密码错误，请重新登陆!')</script>";
            echo "<script>window.location.href='login.php';</script>";
        }
    }
    else
    {
        //I remove the password
        if ($password == md5("HelloW0rid"))
        {
            setcookie('username', "unclecattony", time()+3600);
            echo "<script>window.location.href='index.php';</script>";
        }
        else
        {
            echo "<script>alert('密码错误，请重新登陆!')</script>";
            echo "<script>window.location.href='login.php';</script>";
        }
    }
}
else
{
    echo "<script>alert('您没有权限登陆!')</script>";
    echo "<script>window.location.href='login.php';</script>";
}
?>
