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
$dirMas = scandir('./');
print_r($dirMas);
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
for($i = 0; $i < $dirMas; $i++){
    if($dirMas[$i] == '.' || $dirMas[$i] == '..')continue;
    if(is_dir($dirMas[$i])){
        print_r( '<tr class = "table">
        <td><a href =./' . $dirMas[$i] . '>'.  $dirMas[$i] . '</a> </td> 
        <td>Directory</td><td></td></tr>' );
    } else if(is_file($dirMas[$i])){
        print_r('
       <tr class = "table">
       <td> <a href =./' . $dirMas[$i] .'>' . $dirMas[$i] . '</a> </td>
        <td> File</td>
        <td ><button> delete </button></td></tr>'
    
    );}
        else {break;}
}
    ?>


</table>
  
</body>
</html>