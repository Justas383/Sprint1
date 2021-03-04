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
<?php //nesugalvojau kaip apjungti login forma, jog pradzioje rodytu ja, o po validacijos ieitu i browseri.

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!isset($_POST['uName']) || empty($_POST['uName'])){
        print('Vartotojo vardo langelis tuscias<br>');}

    if(!isset($_POST['pass']) || empty($_POST['pass'])){
        print('Vartojo slaptazodzio langelis tuscias');}
    }
?>
    
<form action="" method="POST">
    <label for="uName">Username:</label><br>
    <input type="text" name="uName" value="<?php if(isset($_POST['uName'])) print($_POST['uName']) ?>">
    <br>
    <label for="lname">Password:</label><br>
    <input type="password" id="pass" name="pass" value="<?php if(isset($_POST['pass'])) print($_POST['pass']) ?>">
    <br>
    <input type="submit" value="Submit">
</form>
<table>
<?php
    $path = "./" . $_GET['path']; //gaunu direktorijos,kurioje esu pavadinima
    $pathArr = scandir($path);//masyvas folderiu ir failu, kurie yra tame $path
    print_r("Directory contents: /" . $path );//direktorijos,kuroje ziurima adresas
    print("<br>");

//cia susiduriau su problema jog galiu ieiti tik vienu lygiu zemiau, bet nedaugiau, meta error. galima daryti su foreach ciklu, 
//bet man norisi darysi su for ciklu, nebent tai tiesiog neimanoma/techniskai sudetinga (naudoti for cikla for cikle?).

for($i = 1; $i < count($pathArr); $i++){
    if($pathArr[$i] == '.' || $pathArr[$i] == '..'){continue;}
    else if(is_dir($path . $pathArr[$i])){//tikrinu ar tai direktorija, jei taip - spausdinam apacioje esanti koda.
        print_r( '
            <tr class = "table">
            <td ><a href=?path=' . urlencode($pathArr[$i]) . '/>'.  $pathArr[$i] . '</a> </td> 
            <td>Directory</td><td></td></tr>' );}

    else if(is_file($path . $pathArr[$i])){//tikrinu ar failas
        print_r('
            <tr class = "table">
            <td> <a href=?path=' . urlencode($pathArr[$i]) . '/>' . $pathArr[$i] . '</a> </td>
            <td> File</td>
            <td><button href = '. $pathArr . 'class = "delete" action = "delete"> delete </button>
            </td></tr>');}};
?>
  </table>
  <?php print('<button class="bck" onclick="history.go(-1);">Back</button>'); //Back button - veikia pagal istorija, gali buti bugu.?>
<form action="" method="POST" >
    <input class="newDir" type="text" id="newDir" placeholder="New Folder" name="newDir" value="<?php mkdir(""); ?>">
    <br>
    <input class = "newDir"type="submit" value="Submit">
</form>
</body>
</html>