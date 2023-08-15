<?php
include("query.php");
if(!isset($_SESSION['uemail'])){
  echo"<script>
  location.assign('login.php')
  </script>";
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Title</title>
</head>
<style>
    .con{
        display:flex;
        justify-content: flex-end;
    }
</style>
<body>
<div class="container">
<form method="post">
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">NAME </label>
    <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">english </label>
    <input type="number" class="form-control"  name="english" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">urdu</label>
    <input type="number" class="form-control"  name="urdu" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">maths</label>
    <input type="number" class="form-control" name="maths"  id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">physics</label>
    <input type="number" class="form-control" name="physics"  id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">chemistry</label>
    <input type="number" class="form-control" name="chemistry"  id="exampleInputPassword1">
  </div>
  <button type="submit"  name="marksheet"  class="btn btn-primary">Submit</button>
</form>
</div>
<div class="container mt-3 con">
  <form action="" method="post">
  <button type="submits" class="btn btn-success" name="view" >view table</button>
  </form>
</div>
<?php
if(isset($_POST['marksheet'])){
    $name=$_POST['name'];
    $english=$_POST['english'];
    $urdu=$_POST['urdu'];
    $maths=$_POST['maths'];
    $physics=$_POST['physics'];
    $chemistry=$_POST['chemistry'];
    $obtain=$english  + $chemistry + $maths + $physics + $urdu;
    $total=500;
    $percentage=($obtain/$total)*100;
    $grad="";
    $remarks="";
    if($percentage>90 && $percentage<=100){
        $grad="A+1";
        $remarks ="EXCELLENT";
    }
    elseif($percentage>80 && $percentage<=90){
        $grad="A+"; 
        $remarks ="very good";
       
    }
    elseif($percentage>70 && $percentage<=80){
        $grad="A"; 
        $remarks ="good";
       
    }
    elseif($percentage>60 && $percentage<=70){
        $grad="B"; 
        $remarks ="better";
       
    }
    elseif($percentage>50 && $percentage<=60){
        $grad="C"; 
        $remarks ="FAIR";
       
    }
    elseif($percentage>40 && $percentage<=50){
        $grad="D"; 
        $remarks ="NEED TO WORK HARD";
    }else{
        $grad="fail";
        $remarks ="better luck next time";
    }

    $query=$pdo->prepare('insert into marksheet(name,english,urdu,math,physics,chemistry,obtained,percentage,grad,remarks)values(:pname,:peng,:purdu,:pmath,:pphy,:pchem,:pobt,:pper,:pgrad,:pres)');
        $query->bindParam("pname",$name);
        $query->bindParam("peng",$english);
        $query->bindParam("purdu",$urdu);
        $query->bindParam("pmath",$maths);
        $query->bindParam("pphy",$physics);
        $query->bindParam("pchem",$chemistry);
        $query->bindParam("pobt",$obtain);
        $query->bindParam("pper",$percentage);
        $query->bindParam("pgrad",$grad);
        $query->bindParam("pres",$remarks);
        $query->execute();
        echo "<script>alert('data stored')</script>";
}
?>

<a href="logout.php" class="btn btn-info">logout</a>
</body>
</html>