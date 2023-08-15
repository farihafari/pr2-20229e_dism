<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>isset</title>
  </head>
  <body>
<div class="container" >
    <form method="post">

  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">country code</label>
    <input type="text" class="form-control" name="code">
  </div>

  <div class="col-12">
    <button type="submit" class="btn btn-primary mt-3" name="get_code" >click</button>
  </div>

    </form>
</div>
<?php
if(isset($_POST['get_code'])){
$code =$_POST['code'];
$pak ="+92";
$cm = strcmp($code,$pak);
if($cm == 0){
    echo "true of pakistan";
}
else{
    echo "false of pakistan";
}
}
?>
  
  </body>
</html>