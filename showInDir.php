<?php
function showInDir($dirMas){
    for($i = 0; $i < $dirMas[$i]; $i++){
        if($dirMas[$i] == '.' || $dirMas[$i] == '..')continue;
        if(is_dir($dirMas[$i])){
            print_r( '<tr class = "table">
            <td action= ><a href =./' . $dirMas[$i] . '>'.  $dirMas[$i] . '</a> </td> 
            <td>Directory</td><td></td></tr>' );
        } 
        else if(is_file($dirMas[$i])){
            print_r('
           <tr class = "table">
           <td> <a href =./' . $dirMas[$i] .'>' . $dirMas[$i] . '</a> </td>
            <td> File</td>
            <td ><button> delete </button></td></tr>'
        );
       }
            else {break;}
    }

};

?>