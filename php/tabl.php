<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
 <style>
    table{
        border-collapse:collapse;
        width:400px;
        text-align:center
    }
 </style>
<table border="1">
    <tbody>
        <?php
        $num=5;
        for($i=1;$i<=10;$i++){
            if($i%2==0){

          
?>
<tr style="background-color:#7895CB;color:#1D5B79">
    <td><?php echo $num?></td>
    <td>X</td>
    <td><?php echo $i?></td>
    <td>=</td>
    <td><?php echo $num*$i?></td>
</tr>

<?php 

  }else{

    ?>
    <tr style="background-color:#A78295;color:#331D2C">
    <td><?php echo $num?></td>
    <td>X</td>
    <td><?php echo $i?></td>
    <td>=</td>
    <td><?php echo $num*$i?></td>
</tr>
    <?php
  }

        }
        ?>

    </tbody>
</table>
</body>
</html>