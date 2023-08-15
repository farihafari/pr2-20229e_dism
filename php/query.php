<?php
session_start();
include("connection.php");
if(isset($_POST['login'])){
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $query= $pdo->prepare('select * from normal where email=:pem && password =:ppas');
    $query->bindParam('pem',$email);
    $query->bindParam('ppas',$pass);
    $query->execute();
    $final = $query->fetch(PDO::FETCH_ASSOC);
    if($final){
        $_SESSION["uemail"]=$final['email'];
        echo "<script>alert('logged in successfully');
        location.assign('marksheet.php')
        </script>";
    }
}
?>