<?php
if (empty($_COOKIE['username']))
{
    echo "<script>alert('Please login first!')</script>";
    echo "<script>window.location.href='login.php';</script>";
}
?>
<html>
<head>
<script type='text/javascript'>
function sure() {
    if (confirm('Are you sure you want to delete file?') == true){
        return true;
    }
    else {
        return false;
    }
}
</script>
<title>Delete file</title>
<meta charset="utf-8"/></head>
<body>
<center>
<font size="6" color="green">Delete file</font>
<form name="upload" method="GET" action="delete_file.php" enctype="multipart/form-data">
<table cellspan="0" border="1">
<tr>
<td>Directory</td>
<td align="center">
<select name="dir">
<option value=""></option>
<?php 
    $filesnames = scandir("/var/www/html/file/");
    $baseurl = "/var/www/html/file/";
    foreach ($filesnames as $name) {
            if ($name != '.' && $name != '..')
                echo "<option value='".$baseurl.$name."/'>$name</option>";
    }
?>
</select>
</td>
</tr>
<tr>
<td align="center"><input type="reset" name="res" value="Reset"/></td>
<td align="center"><input type="submit" name="submit" value="Submit"/></td>
</tr>
</table>
</form>
<a href="index.php"><font size="3" color="green">(Return home page)</font></a>

<div>
<?php

    if (!empty($_GET["dir"]))
    {
        $dirName = $_GET["dir"];
        $dir = opendir($dirName);
        $old_dir = $_GET["dir"];
?>
<br/>
<br/>
<font size="5" color="green">Delete Lists(<?php echo explode('/',
$dirName)[5];?>)</font>
<table cellspan="0" border="1">
<th>File Name</th>
<th>Modified date</th>
<th>File Type</th>
<th>Size</th>
<th>Operation</th>
<?php
        while ($fileName = readdir($dir))
        {
            $file = $dirName.$fileName;
            if ($fileName != "." && $fileName != "..")
            {
                echo "<tr color='green'>";
                echo "<td>$fileName</td>";
                echo "<td>".date("Y-m-d H:i:s", filectime($file))."</td>";
                echo "<td>".strtoupper(substr(strrchr($fileName,'.'),1))
                    ."</td>";
                echo "<td align='center'>".toSize(filesize($file))."</td>";
                #$file = iconv('utf-8', 'gb2312', $file);
                echo "<td> <a href='proc_delete.php?".
                    "fullpath=$file"."&dir=$old_dir"."'/>".
                    Delete."</a>"."</input>";
                echo "</tr>";
            }
        }
        closedir($dir);
    }

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
</div>
</center>
</body>
</html>
