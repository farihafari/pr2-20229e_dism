<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script> -->
</head>
<body>
<?php
$arr = ["ali",23,"cpism"];
// echo $arr[2];
// var_dump($arr)
//print_r($arr)
// $arrcount=$arr.count();
for($x=0;$x<count($arr);$x++){
    ?>
     <p>
<?php echo $arr[$x]?>
</p>
    <?php
    
}
?>
   
</body>
</html>
