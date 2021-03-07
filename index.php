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
    <!--FAILU NARSYKLE-->
<?php
    $path = './' . $_GET['path']; 
    $pathArr = scandir($path);
    print_r("Directory contents:" . $path );
    print("<br>");

    //NEPAVYKO PADARYTI JOG NARSYKLE EITU GILIAU NEGU TRECIAS LYGIS
for($i = 1; $i < count($pathArr); $i++){
    if($pathArr[$i] === '.' || $pathArr[$i] === '..'){continue;}
    else if(is_dir($path . '/' . $pathArr[$i])){
        if(isset($_GET['path'])){
        print_r( '
            <tr class = "table">
            <td ><a href=' . $_SERVER['REQUEST_URI'] . $pathArr[$i] . '/>' . $pathArr[$i] . '</a> </td> 
            <td>Directory</td><td></td></tr>');
            }
            else{
            print_r( '
            <tr class = "table">
            <td ><a href="' . $_SERVER['REQUEST_URI'] . '?path=' . $pathArr[$i] . '/">' . $pathArr[$i] . '</a></td> 
            <td>Directory</td><td></td></tr>' );
            }
        }
        else if(is_file($path .'/'. $pathArr[$i])){
        print_r('
            <tr class = "table">
            <td> <a href="' . $_SERVER['REQUEST_URI'] . $pathArr[$i] . '/">' . $pathArr[$i] . '</a></td>
            <td> File</td>
            <td><button href = class = "delete" action = "delete"> delete </button>
            </td></tr>');}};
?>
  </table>
  <!-- BACK MYGTUKAS -->
  <?php print('<button class="bck" onclick="history.go(-1);">Back</button>');?>
<form action="" method="POST" >
    <input class="newDir" type="text" id="newDir" placeholder="New Folder" name="newDir" value="<?php mkdir(""); ?>">
    <br>
    <input class = "newDir"type="submit" value="Submit">
</form>
</body>
</html>