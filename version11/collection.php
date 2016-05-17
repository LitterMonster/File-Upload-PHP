<?php
if (empty($_COOKIE['username']))
{
    echo "<script>alert('Please login first!')</script>";
    echo "<script>window.location.href='login.php';</script>";
}
?>
<html>
<head>
<title>Collection</title>
<meta charset="utf-8"/></head>
<body>
<center>
<hr/>
<font size="5" color="green">Recycle Bin</font>
<hr/>
<a href="index.php"><font size="3" color="green">(Return home page)</font></a>
<hr/>
<table cellspan="0" border="1">
<th>File Name</th>
<th>Modified date</th>
<th>File Type</th>
<th>Size</th>
<th>Remove</th>
<?php
    function deldir($dirname)
    {
        $dh = opendir($dirname);
        while ($file = readdir($dh))
        {
            if ($file != "." && $file != "..")
            {
                $fullpath = $dirname.$file;
                if (!is_dir($fullpath))
                    unlink($fullpath);
                else
                    deldir($fullpath);
            }
        }
        closedir($dh);

        if(rmdir($dirname))
            return true;
        else
            return false;
    }
?>
<?php
    if (!empty($_GET['fullpath']))
    {
        if (is_file($_GET['fullpath']))
        {
            if (unlink($_GET['fullpath']))
                echo "<script>alert('Remove successfully!!')</script>";
            else
                echo "<script>alert('Remove failed!')</script>";
        }
        else
        {
            if (deldir($_GET['fullpath']) == true)
                echo "<script>alert('Remove successfully!!')</script>";
            else
                echo "<script>alert('Remove failed!')</script>";
        } 
    }
?>
<?php
    $dirName = "/var/www/html/up/Collection/";
    $dir = opendir($dirName);
    while ($fileName = readdir($dir))
    {
        $file = $dirName.$fileName;
        if ($fileName != "." && $fileName != "..")
        {
            echo "<tr color='green'>";
            echo "<td>$fileName</td>";
            echo "<td>".date("Y-m-d H:i:s", filectime($file))."</td>";
            echo "<td>".(is_file($file)?
                strtoupper(substr(strrchr($fileName,'.'),1)) : 'DIR')
                ."</td>";
            echo "<td align='center'>".toSize(filesize($file))."</td>";
            #$file = iconv('utf-8', 'gb2312', $file);
            echo "<td> <a href='collection.php?".
                "fullpath=$file"."&dir=$old_dir"."'/>".
                Remove."</a>"."</td>";
            echo "</tr>";
        }
    }
    closedir($dir);

    function toSize($size)
    {
        $dw;
        if ($size > pow(2, 30)) 
        {
            $dw = "GB";
            $size = round($size/pow(2, 30), 2);
        }
        else if ($size > pow(2, 20))
        {
            $dw = "MB";
            $size = round($size/pow(2, 20), 2);
        }
        else if ($size > pow(2, 10))
        {
            $dw = "KB";
            $size = round($size/pow(2, 20), 2);
        }
        else 
        {
            $dw = "bytes";
        }
        return $size.$dw;
    }
?>
</table>
</center>
</body>
</html>

