<?php
include("query.php");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>login</title>
</head>
<body>
    <div class="container" >
        <form method="post">
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" name="email">
    
</div>

<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">password</label>
    <input type="password" class="form-control" name="password">
    
</div>
<button type="submit" class="btn btn-primary" name="login">log in</button>
</form>
    </div>

</body>
</html>