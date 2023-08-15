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
<div class="row">
<div class="col-md-4">
    <label for="inputEmail4" class="form-label">name</label>
    <input type="text" class="form-control" name="uname">
  </div>
  <div class="col-md-4">
    <label for="inputEmail4" class="form-label">email</label>
    <input type="email" class="form-control" name="uemail">
  </div>
  <div class="col-md-4">
    <label for="inputEmail4" class="form-label">qaulification</label>
    <input type="text" class="form-control" name="uqaul">
  </div>
</div>

  <div class="col-12">
    <button type="submit" class="btn btn-primary mt-3" name="get_code" >click</button>
  </div>

    </form>
</div>
<div class="container" >
<table class="table">
  <thead>
    <tr>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">qualification</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"></th>
      <td></td>
      <td></td>
      <td></td>
</tr>
  </tbody>
</table>
</div>
  
  </body>
</html>