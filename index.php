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

<div class="table">
<p>
    Type
</p>
<p>
    File name
</p>
<p>action</p>

<?php
$dirMas = scandir("C:\Program Files\Ampps\www\Sprint1");
for($i = 0; $i < $dirMas; $i++){
    if(is_dir($dirMas[$i])){
        print_r( '<div class="container">
        <div class="name">
        <a href =C:\Program Files\Ampps\www\Sprint1\\' . $dirMas[$i] . '>'.  $dirMas[$i] . '</a> </div> 
        <div class ="type"> ' . "Directory" . "<br>" . '</div>');
    } else if(is_file($dirMas[$i])){
        print_r('<div class="container">
        <div class="name">
        <a href =C:\Program Files\Ampps\www\Sprint1\\' . $dirMas[$i] .'>' . $dirMas[$i] . '</a> </div>
        <div class ="type"> ' . " File" . "<br>" . '</div>' );}
        else {break;}
}
    ?>
    </div>


    
    </div>
</body>
</html>