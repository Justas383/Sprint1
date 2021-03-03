for($i = 1; $i < $pathArr; $i++){
    if($path . $pathArr[$i] == '.' || $path . $pathArr[$i] == '..'){
        continue;}
    if(is_dir($path . $pathArr[$i])){
        for($j = 1; $j < $pathArr[$i]; $j++){
            
             if(is_dir($pathArr[$j])){
                print_r( '<tr class = "table">
                <td ><a href=?path=' . urlencode($pathArr[$j]) . '/>'.  $pathArr[$j] . '</a> </td> 
                <td>Directory</td><td></td></tr>' );
            } else{break;}
        }
        print_r( '<tr class = "table">
        <td ><a href=?path=' . urlencode($pathArr[$i]) . '/>'.  $pathArr[$i] . '</a> </td> 
        <td>Directory</td><td></td></tr>' );
    } 
    if(is_file($pathArr[$i])){
        for($j = 1; $j < $pathArr[$i]; $j++){
            
                    if(is_file($pathArr[$j])){
                        print_r('
                       <tr class = "table">
                       <td> <a href=?path=' . urlencode($pathArr[$j]) . '/>' . $pathArr[$j] . '</a> </td>
                        <td> File</td>
                        <td><button class = "del"> delete </button></td></tr>'
                    );} else{break;}}
        print_r('
       <tr class = "table">
       <td> <a href=?path=' . urlencode($pathArr[$i]) . '/>' . $pathArr[$i] . '</a> </td>
        <td> File</td>
        <td><button class = "del"> delete </button></td></tr>'
    );
    
   }
            else {break;}} 
        
                               
                            