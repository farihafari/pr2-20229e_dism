<?php
include("connection.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Title</title>
</head>
<body>
    <?php
    if(isset($_GET['id'])){
        $sid=$_GET['id'];
        $query=$pdo->prepare("select * from marksheet where id=:pid");
        $query->bindParam("pid",$sid);
        $query->execute();
       $obj= $query->fetch(PDO::FETCH_ASSOC);?>
<div class="container">
<form method="post">
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">NAME </label>
    <input type="text" class="form-control" name="name" value="<?php echo $obj['name']?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">english </label>
    <input type="number" class="form-control"  name="english" value="<?php echo $obj['english']?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">urdu</label>
    <input type="number" class="form-control"  name="urdu" value="<?php echo $obj['urdu']?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">maths</label>
    <input type="number" class="form-control" name="maths" value="<?php echo $obj['math']?>" >
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">physics</label>
    <input type="number" class="form-control" name="physics" value="<?php echo $obj['physics']?>" >
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">chemistry</label>
    <input type="number" class="form-control" name="chemistry" value="<?php echo $obj['chemistry']?>" >
  </div>
  <button type="submit"  name="update"  class="btn btn-info">update</button>
</form>
</div>
<?php
    }
    ?>
    <?php
    if(isset($_POST['update'])){
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
        $query= $pdo->prepare("update marksheet set name=:pname,english=:peng,urdu=:purdu,math=:pmaths,chemistry=:pchem,physics=:pphysics,obtained=:pobt,percentage=:pper,grad=:pgrad,remarks=:prmks where id=:pid");
        $query->bindParam("pid",$sid);
        $query->bindParam("pname",$name);
        $query->bindParam("peng",$english);
        $query->bindParam("purdu",$urdu);
        $query->bindParam("pmaths",$maths);
        $query->bindParam("pchem",$chemistry);
        $query->bindParam("pphysics",$physics);
        $query->bindParam("pobt",$obtain);
        $query->bindParam("pper",$percentage);
        $query->bindParam("pgrad",$grad);
        $query->bindParam("prmks",$remarks);
        $query->execute();
        echo "<script>alert('data update successfully')</script>";
    }
    ?>
</body>
</html>