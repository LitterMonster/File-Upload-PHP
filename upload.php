<?php
echo "<meta http-equiv='Content-Type' content='text/html' charset='utf-8'/>";
/*
var_dump($_POST);
if (empty($_POST["file"]))
    echo "Empty";
else
    echo "Not Empty!";
var_dump ($_FILES);
 */
    if (!empty($_FILES["file"]["name"]))
    {
        $tmp_name = $_FILES["file"]["tmp_name"];
        $des_dir = $_POST["dir"];
        $true_name = $_FILES["file"]["name"];
    }
        if (file_exists($des_dir.$true_name))
        {
            echo "<script>alert('".$true_name." has existed in ".$des_dir."')</script>";
            die;
        }

        if($_FILES["file"]["error"] > 0)
        {
            echo "<script>alert('上传文件超过了20M,上传终止！')</script>";
            echo "<meta http-equiv='refresh' content='0;index.php'/>";
            die;
        }
        else 
        {
            if (move_uploaded_file($tmp_name, "$des_dir$true_name"))
            {
                
                echo "<script>alert('上传文件成功')</script>";
                echo "<meta http-equiv='refresh' content='0;index.php'/>";
            } 
            else 
            {
                echo "<script>alert('上传文件失败!')</script>";
                echo "<meta http-equiv='refresh' content='0;index.php'/>";
            }
        }
?>
