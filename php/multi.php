<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table{
        border-collapse:collapse;
        width: 400px;
        text-align: center;
        
    }
</style>
<body>
    <table border="1">
        <thead>
            <tr>
                <th>name</th>
                <th>age</th>
                <th>course</th>
            </tr>
        </thead>
        <tbody>
        <?php
$std=[
    ["ali",23,"cpism"],
    ["alisha",25,"dism"],
    ["zohaib",22,"cpism"],
    ["aliyan",21,"cpism"]
];
for($i=0;$i<count($std);$i++){
    if($i%2==0){
    ?>
    <tr style="background-color:cadetblue">
    <?php
    for($j=0;$j<count($std[$i]);$j++){
        ?>
<td> <?php
echo $std[$i][$j]." ";
?>
</td>
<?php
    }
}else{
    
    ?>
    <tr style="background-color:darkseagreen">
<?php
for($j=0;$j<count($std[$i]);$j++){
?>
<td> <?php
echo $std[$i][$j]." ";
?>
</td>

<?php
}
?>

    </tr>
    
    <?php
}

?>


    </tr>
    <?php
    }
?>
        </tbody>
    </table>



</body>
</html>

