<?php
include("query.php");
include("header.php");

?>
 <div class="container p-4">
                            <h6 class="mb-4">view product</h6>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">name</th>
                                        <th scope="col">quantity </th>
                                        <th scope="col">price</th>
                                        <th scope="col">category type</th>
                                        <th scope="col">image</th>
                                        <th scope="col" colspan="2">action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query=$pdo->query("SELECT `product`.*, `category`.`name`
                                    FROM `product` 
                                        inner JOIN `category` ON `product`.`category_type_id` = `category`.`id`;");
                                    $data = $query->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($data as $pro){
                                        ?>
                                    <tr>
                                        <td scope="row"><?php echo $pro['id'];?></td>
                                        <td><?php echo $pro['product_name'];?></td>
                                        <td><?php echo $pro['product_qty'];?></td>
                                        <td><?php echo $pro['product_price'];?></td>
                                        <td>
                                        <?php echo $pro['name'];?>
                                        </td>
                                        <td><img src="img/<?php echo $pro['product_image'];?>" width="100px"></td>
                                        <td>
                                            <form action="" method="get">
                                            <button type="button" class="btn btn-outline-danger m-2"><a href="updateproduct.php?pid=<?php echo $pro['id']?>" class="text-dark"> Edit</a></button>

                                            </form>
                                        </td> 
                                        <td>
                                      <form action="" method="get">
                                      <button type="button" class="btn btn-outline-danger m-2"><a href="?cid=<?php echo $pro["id"];?>" class="text-dark">Delete</a></button>
                                      </form>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                    if(isset($_GET["cid"])){
                                        $id = $_GET['cid'];
                                        $query= $pdo->prepare("delete from category where id =:pid");
                                        $query->bindParam("pid",$id);
                                        $query->execute();
                                        echo "<script>
                                        alert('delete category successfully');
                                location.assign('catview.php');
                                        </script>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                        <?php
                        include("footer.php");
                        ?>