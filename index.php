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
$dirMas = scandir("C:\Program Files\Ampps\www\Sprint1");
print_r($dirMas);
?>

<div class="table">
    <div class="header"> <p>File name</p></div>
    <div class="header"> <p>File type</p></div>
    <div class="header"> <p>Action</p></div>

<?php
for($i = 0; $i < $dirMas; $i++){
    if(is_dir($dirMas[$i])){
        print_r( '
        <div class="name">
        <a href =C:\Program%Files\Ampps\www\Sprint1\\' . $dirMas[$i] . '>'.  $dirMas[$i] . '</a> </div> 
        <div class ="type"> ' . "Directory"  . '</div>' . "<button> delete </button>");
    } else if(is_file($dirMas[$i])){
        print_r('
        <div class="name">
        <a href =C:\Program Files\Ampps\www\Sprint1\\' . $dirMas[$i] .'>' . $dirMas[$i] . '</a> </div>
        <div class ="type"> ' . " File"  . '</div> ' .
        "<button> delete </button>"
    
    );}
        else {break;}
}
    ?>
    </div>
  
</body>
</html>