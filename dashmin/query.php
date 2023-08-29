<?php
session_start();
include("connection.php");

// sign up
if(isset($_POST['sign_up'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    $query=$pdo->prepare('Insert into user(name,email,password) Values(:pname,:pemail,:ppassword)');
    $query->bindParam("pname",$name);
    $query->bindParam("pemail",$email);
    $query->bindParam("ppassword",$password);
    $query->execute();

    echo "<script>alert('Successfully submitted');
    location.assign('signin.php');
    </script>";
}
// sign in
if(isset($_POST['sign_in'])){
    $email=$_POST['email'];
    $password=$_POST['password'];

    $query=$pdo->prepare('select * from user where email=:pemail && password=:ppass');
    $query->bindParam("pemail",$email);
    $query->bindParam("ppass",$password);
    $query->execute();
    $final = $query->fetch(PDO::FETCH_ASSOC);
    if($final){
        $_SESSION['uemail']=$final['email'];
        $_SESSION['urole']=$final['role'];
        echo"<script>
        alert('logged in successfully');
        location.assign('index.php');
        </script>";
    }

   
}

// add category 

if(isset($_POST['cat_add'])){
    $cname=$_POST['cat_name'];
    $filename=$_FILES["cat_file"]['name'];
    $file_tmp_name=$_FILES['cat_file']['tmp_name'];
    $filesize=$_FILES['cat_file']['size'];
    $extension = pathinfo($filename,PATHINFO_EXTENSION);
    $destination='img/'.$filename;
    if($extension=="jpg" || $extension == "png" || $extension =="jpeg"){
if(move_uploaded_file($file_tmp_name,$destination)){
    $checkcategory=$pdo->prepare("select * from category where name=:pname");
    $checkcategory->bindParam("pname",$cname);
    $checkcategory->execute();
    $count = $checkcategory->fetchColumn();
    if($count>0){
        echo "<script>
        alert('already existance')
        </script>";
    }else{

   
    $query= $pdo->prepare("insert into category (name,image) values (:pname,:pimg)");
    $query->bindParam("pname",$cname);
    $query->bindParam("pimg",$filename);
    $query->execute();
    echo"
    <script>
    alert('category added succesfully')
    </script>
    ";
}
}
else{
    echo"
    <script>
    alert('something went wrong')
    </script>
    ";
}

    }
}

?>