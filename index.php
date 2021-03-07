<?php 
//logout logika
session_start();
if(isset($_GET['action']) && $_GET['action'] == 'logout'){
   session_start();
   unset($_SESSION['uName']);
   unset($_SESSION['pass']);
   unset($_SESSION['logged_in']);
   $_SESSION['logout_msg'] = '<p style="color: red;">You are logged out</p>';
   header('Location:/' . end(explode('\\', getcwd())) .'/' );
   exit;
 }
 //Login logika
 if (isset($_POST['login']) && !empty($_POST['uName']) && !empty($_POST['pass'])){
   if ($_POST['uName'] == 'Justas' && $_POST['pass'] == '123') {
       $_SESSION['logged_in'] = true;
       $_SESSION['timeout'] = time();
       $_SESSION['uName'] = 'Justas';
       header('Location: /' . end(explode('\\', getcwd())) . '/');
   } else {
       print_r('<div class="login"style="color:red">Neteisingi prisijungimo duomenys</div>');
   }}
   //upload logika
   if (isset($_FILES['file'])){
    if ($_FILES['file']['name'] === ""){
        print('<div style="color: red;">No file selected to upload</div>');
    } else {
            $file_name = $_FILES['file']['name'];
            $file_size = $_FILES['file']['size'];
            $file_tmp = $_FILES['file']['tmp_name'];
            $file_type = $_FILES['file']['type'];
            move_uploaded_file($file_tmp, $_GET['path'] . $file_name);
    }}
    //download logika
    if(isset($_POST['download'])){
        $file='./' . $_POST['download'];
        $fileToDownloadEscaped = str_replace("&nbsp;", " ", htmlentities($file, null, 'utf-8'));
        ob_clean();
        ob_start();
        header('Content-Description: File Transfer');
        header('Content-Type: application/pdf'); 
        header('Content-Disposition: attachment; filename=' . basename($fileToDownloadEscaped));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($fileToDownloadEscaped)); 
        flush();
        readfile($fileToDownloadEscaped);
        exit;
    }
    
    //delete logika
    if (isset($_POST['delete'])) {
        unlink($_GET['path'] . $_POST['delete']);
    }
    //naujos direktorijos logika
    if (isset($_POST['newDir'])) {
        if (is_dir($_POST['newDir'])) {
            print('<div style="color: red;">Directory with name "' . $_POST['newDir'] . '" already exists</div>');
        } else {
            mkdir($_GET['path'] . $_POST['newDir']);
        }
    }

?>
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
    if ($_SESSION['logged_in'] === true) {
    ?>

<table>
    <!--FAILU NARSYKLE-->
<?php
$path = './' . $_GET['path']; 
$pathArr = scandir($path);
print_r("Directory contents:" . $path );
print("<br>");

for($i = 1; $i < count($pathArr); $i++){
    if($pathArr[$i] === '.' || $pathArr[$i] === '..' || $pathArr[$i] === '.git' || $pathArr[$i] === '.gitattributes'){continue;}
    else if(is_dir($path . '/' . $pathArr[$i])){
        if(isset($_GET['path'])){
            print_r( '
                <tr class = "table">
                <td ><a href="' . $_SERVER['REQUEST_URI'] . $pathArr[$i] . '/">' . $pathArr[$i] . '</a> </td> 
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
            <td><form action="" method="POST">
            <button type="submit" class="del" name="delete" value="' . $pathArr[$i] . '">Delete</button>
            </form>
            <form action="" method="POST">
            <button type="submit" class="btn" name="download" value="' . $pathArr[$i] . '">Download</button>
            </form></td></tr>');}
            else{print("Folder is empty!");}
        };
?>
  </table>
  <!-- back -->
  <?php print('<button class="bck" onclick="history.go(-1);"><---Back</button>');?>
  <br>
  <!-- Upload -->
 <div class="upload"> 
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" id="file" name="file">
        <input type="submit" class="uploadBtn" name="upload" value="Upload file">
    </form>
 </div>
 <br>
 <!-- new dir -->
 <div class="newDir">
    <form action="" method="POST">
        <input type="hidden" name="path" value="<?php print($_GET['./']) ?>" /> 
        <input placeholder="New folder" type="text" name="newDir">
        <button type="submit">Submit</button>
    </form>
</div>         
<br>
  <!-- log-out-->
<div class="logout">
    Press to <a class="logoutBtn" href="index.php?action=logout"> logout </a>
</div>
<?php } else { ?>
  <!-- login-->
  <div class="login">
    <form action="" method="post">
        <input class="log" type="text" name="uName" placeholder="Justas" required autofocus><br>
        <input class="log" type="password" name="pass" placeholder="123" required><br>
        <button class="loginBtn" type="submit" name="login">Login</button>
    </form>
  </div>
<?php } ?>

</body>
</html>