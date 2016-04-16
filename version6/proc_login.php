<meta charset="utf-8"/>
<?php
$username = $_POST['username'];
$password = md5($_POST['password']);
if (empty($username) || empty($password))
{
    echo "<script>alert('用户名和密码不能为空!')</script>";
    echo "<meta http-equiv='refresh' content='0;login.php'/>";
    die;
}
setcookie('username', $username, time()+3600);

if ($username == "zhangtao" || $username == "unclecattony")
{
    if ($username == "zhangtao")
    {
        //I removed the password
        if ($password == md5(""))
    echo "<meta http-equiv='refresh' content='0;index.php'/>";
        else
        {
            echo "<script>alert('密码错误，请重新登陆!')</script>";
            echo "<meta http-equiv='refresh' content='0;login.php'/>";
        }
    }
    else
    {
        //I remove the password
        if ($password == md5(""))
            echo "<meta http-equiv='refresh' content='0;index.php'/>";
        else
        {
            echo "<script>alert('密码错误，请重新登陆!')</script>";
            echo "<meta http-equiv='refresh' content='0;login.php'/>";
        }
    }
}
else
{
    echo "<script>alert('您没有权限登陆!')</script>";
    echo "<meta http-equiv='refresh' content='0;login.php'/>";
}
?>
