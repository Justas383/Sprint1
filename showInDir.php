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