
<?php
// session_start();
include("connection.php");
if(isset($_POST['loggedIn'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
$query =$pdo->prepare("select * from user where email=:pe && password =:pp");
$query->bindParam("pe",$email);
$query->bindParam("pp",$password);
$query->execute();
$row = $query->fetch(PDO::FETCH_ASSOC);
if($row){
    $_SESSION['userId']=$row['id'];
    $_SESSION['useremail']=$row['email'];
    $_SESSION['userName']=$row['name'];
    echo "<script>
    alert('logged in successfully');
    location.assign('index.php')
    </script>";
}
else{
    echo "<script>
    alert('invalid data');
    location.assign('login.php')
    </script>";
}
}
?>