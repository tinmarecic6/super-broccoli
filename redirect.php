<?php 

require('db.php');
session_start();

$conn = db();
$username = $_POST['username'];
$pass = $_POST['password'];
$hashed_pass = md5($pass);
$sql = 'SELECT * FROM app_vlasta.users where username="'.$username.'" and password = "'.$hashed_pass.'";';
$result = $conn->query($sql);
if($result->num_rows==1){
    $row = $result->fetch_assoc();
    $_SESSION['username'] = $username;
    header('Location:guest_evidention.php');
}
else{
    $_SESSION['isUser']=0;
    header('Location:index.php');
}

?>