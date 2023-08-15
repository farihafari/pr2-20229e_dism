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
<div class="container">
<form method="post">
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">NAME </label>
    <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email </label>
    <input type="email" class="form-control"  name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">PHONE</label>
    <input type="tel" class="form-control"  name="phone" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">age</label>
    <input type="number" class="form-control" name="age"  id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">course</label>
    <input type="text" class="form-control" name="course"  id="exampleInputPassword1">
  </div>
  <button type="submit"  name="insert"  class="btn btn-primary">Submit</button>
</form>
</div>
<?php
if(isset($_POST['insert'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $age=$_POST['age'];
    $course=$_POST['course'];
    $query= $pdo->prepare("insert into normal(name,email,phone,age,course)values(:pname,:pemail,:pphone,:page,:pcourse)");
    $query->bindParam("pname",$name);
    $query->bindParam("pemail",$email);
    $query->bindParam("pphone",$phone);
    $query->bindParam("page",$age);
    $query->bindParam("pcourse",$course);
    $query->execute();
    echo "<script>alert('data stored successfully')</script>";


}

?>
</body>
</html>