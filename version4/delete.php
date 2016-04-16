<html>
<head>
<title>文件删除</title>
<meta charset="utf-8"/></head>
<body>
<center>
<font size="6" color="green">文件删除</font>
<form name="upload" method="POST" action="delete.php" enctype="multipart/form-data">
<table cellspan="0" border="1">
<tr>
<td>目录</td>
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
<td align="center"><input type="reset" name="res" value="重置"/></td>
<td align="center"><input type="submit" name="submit" value="提交"/></td>
</tr>
</table>
</form>
<a href="index.php"><font size="3" color="green">(返回主页)</font></a>

<div>
<?php

    if (!empty($_POST["dir"]))
    {
        $dirName = $_POST["dir"];
        $dir = opendir($dirName);
?>
<br/>
<br/>
<font size="5" color="green">文件列表(<?php echo explode('/',
$dirName)[5];?>)</font>
<table cellspan="0" border="1">
<th>文件名</th>
<th>修改时间</th>
<th>文件类型</th>
<th>大小</th>
<th>操作</th>
<?php
        while ($fileName = readdir($dir))
        {
            $file = $dirName.$fileName;
            if ($fileName != "." && $fileName != "..")
            {
                echo "<tr color='green'>";
                echo "<td>$fileName</td>";
                echo "<td>".date("Y-m-d H:i:s", filectime($file))."</td>";
                #echo "<td>".filetype($file)."</td>";
                echo "<td>".$file."</td>";
                echo "<td>".toSize(filesize($file))."</td>";
                #$file = iconv('utf-8', 'gb2312', $file);
                echo "<td> <a href='proc_delete.php?"."fullpath=$file'/>".
                    删除."</a>"."</input>";
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
