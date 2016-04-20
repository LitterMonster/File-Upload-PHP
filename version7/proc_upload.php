<?php
if (empty($_COOKIE['username']))
{
    echo "<script>alert('请先登陆!')</script>";
    echo "<script>window.location.href='login.php';</script>";
}
?>
<?php
echo "<meta http-equiv='Content-Type' content='text/html' charset='utf-8'/>";
#var_dump($_POST);
#var_dump($_FILES);
for ($count = 0; !empty($_FILES["userfiles"]["name"][$count]); $count++);
//echo $count;
/*
if (empty($_POST["file"]))
    echo "Empty";
else
    echo "Not Empty!";
var_dump ($_FILES);
 */
$succnum = 0;
$failnum = 0;
for ($i = 0; $i < $count; $i++) 
{
    if (!empty($_FILES["userfiles"]["name"][$i]))
    {
        $tmp_name = $_FILES["userfiles"]["tmp_name"][$i];
        $des_dir = $_POST["dir"];
        $true_name = $_FILES["userfiles"]["name"][$i];
        #echo "===========$i=============="."<br/>";
        #echo $tmp_name."<br/>";
        #echo $des_dir."<br/>";
        #echo $tmp_name."<br/>";
    }
    if (file_exists($des_dir.$true_name))
    {
        echo "<script>alert('".$true_name." has existed in ".$des_dir."')</script>";
        continue;
    }

    if($_FILES["userfiles"]["error"][$i] > 0)
    {
        echo "<script>alert('上传文件超过了20M,上传终止！')</script>";
        echo "<script>window.location.href='upload_file.php';</script>";
        die;
    }
    else 
    {
        $true_name_cp = $true_name;
        $true_name = iconv("utf-8", "utf-8", $true_name);
        if (move_uploaded_file($tmp_name, "$des_dir$true_name"))
        {
            $true_name = iconv("utf-8", "utf-8", $true_name);
            $succnum += 1;
            $success .= "$true_name_cp ---";
        } 
        else 
        {
            $failnum += 1;
            $failure .= "$true_name_cp ---";
        }
    }
}

if (!empty($success) && empty($failure))
    echo "<script>alert('成功:".$succnum."个;;;失败:0个;;;".$success."文件上传成功!"."')</script>";
else if (!empty($success) && !empty($failure))
    echo "<script>alert('成功:".$succnum."个;;;失败:$failnum个;;;".$success."文件上传成功!".$failure."文件上传失败!')</script>";
else if (empty($success) && !empty($failure))
    echo "<script>alert('成功:0个;;;失败".$failnum."个;;;".$failure."文件上传失败!')</script>";
echo "<script>window.location.href='upload_file.php';</script>";
?>
