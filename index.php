<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
<?php
$path = "./" . $_GET['path'];
$pathArr = scandir($path);
print_r("Directory contents: /" . $path );
print("<br>");
print_r($pathArr);
?>
<table class = "table">
    <tr class = "table">
        <td>
            File name
        </td>
        <td>
            Type
        </td>
        <td>
            Action
        </td>
    </tr>
<?php

for($i = 1; $i < count($pathArr); $i++){
    if($pathArr[$i] == '.' || $pathArr[$i] == '..'){
        continue;}
    else if(is_dir($path . $pathArr[$i])){
      
        print_r( '<tr class = "table">
        <td ><a href=?path=' . urlencode($pathArr[$i]) . '/>'.  $pathArr[$i] . '</a> </td> 
        <td>Directory</td><td></td></tr>' );
    } 
    else if(is_file($path . $pathArr[$i])){
        print_r('
       <tr class = "table">
       <td> <a href=?path=' . urlencode($pathArr[$i]) . '/>' . $pathArr[$i] . '</a> </td>
        <td> File</td>
        <td><button class = "del"> delete </button></td></tr>'
    );
    
    }
        else {break;}
     };
    ?>


</table>
  <button class="bck"> Back </button>
</body>
</html>