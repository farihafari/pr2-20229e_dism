<?php
include('connection.php');
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
    <table class="table">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">name</th>
          <th scope="col">english</th>
          <th scope="col">urdu</th>
          <th scope="col">maths</th>
          <th scope="col">physics</th>
          <th scope="col">chemistry</th>
          <th scope="col">obtained</th>
          <th scope="col">total marks</th>
          <th scope="col">percentage</th>
          <th scope="col">grade</th>
          <th scope="col">remarks</th>
        </tr>
      </thead>
      <tbody>
<?php
$query=$pdo->query('select * from marksheet');
$res = $query->fetchAll(PDO::FETCH_ASSOC);
foreach($res as $data){
    ?>
    
    <tr>
          <td><?php echo $data['id']; ?></td>
          <td><?php echo $data['name']; ?></td>
          <td><?php echo $data['english']; ?></td>
          <td><?php echo $data['urdu']; ?></td>
          <td><?php echo $data['math']; ?></td>
          <td><?php echo $data['physics']; ?></td>
          <td><?php echo $data['chemistry']; ?></td>
          <td><?php echo $data['obtained']; ?></td>
          <td><?php echo $data['total']; ?></td>
          <td><?php echo $data['percentage']; ?></td>
          <td><?php echo $data['grad']; ?></td>
          <td><?php echo $data['remarks']; ?></td>
        </tr>
    <?php
}
?>

        
       
      </tbody>
    </table>
</div>

</body>
</html>