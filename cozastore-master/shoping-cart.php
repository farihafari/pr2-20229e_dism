<?php
// session_start();
// session_unset();
include("query.php");
include("header.php");

?>
<?php
if (isset($_POST['AddToCart'])) {
	if (isset($_SESSION['cart'])) {
		$productId = array_column($_SESSION['cart'], "p_id");
		if (in_array($_POST['p_id'], $productId)) {
			echo "<script>
	alert('product already added into cart');
	location.assign('shoping-cart.php')
	</script>";
		} else {
			$count = count($_SESSION['cart']);
			$_SESSION['cart'][$count] = array("p_id" => $_POST['p_id'], "p_name" => $_POST['p_name'], "p_image" => $_POST['p_image'], "p_price" => $_POST['p_price'], "p_qty" => $_POST['p_qty']);
			echo "<script>
	alert('product added into cart');
	location.assign('shoping-cart.php')
	</script>";
		}

	} else {
		$_SESSION['cart'][0] = array("p_id" => $_POST['p_id'], "p_name" => $_POST['p_name'], "p_image" => $_POST['p_image'], "p_price" => $_POST['p_price'], "p_qty" => $_POST['p_qty']);
		echo "<script>
		alert('product added into cart');
		location.assign('shoping-cart.php')
		</script>";
	}
}
// REMOVE PRODUCT 
if (isset($_GET['removeId'])) {
	foreach ($_SESSION['cart'] as $key => $value) {
		if ($_GET['removeId'] == $value['p_id']) {
			// row delete
			unset($_SESSION['cart'][$key]);
			// reset
			$_SESSION["cart"] = array_values($_SESSION['cart']);
			echo "<script>alert('item removed successfully from cart');
			location.assign('shoping-cart.php')
			</script>";
		}

	}
}
?>
<!-- breadcrumb -->
<div class="container">
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
		<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
			Home
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>

		<span class="stext-109 cl4">
			Shoping Cart
		</span>
	</div>
</div>


<!-- Shoping Cart -->
<form class="bg0 p-t-75 p-b-85">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
				<div class="m-l-25 m-r--38 m-lr-0-xl">
					<div class="wrap-table-shopping-cart">
						<table class="table-shopping-cart">
							<tr class="table_head">
								<th class="column-1">Product</th>
								<th class="column-2"></th>
								<th class="column-3">Price</th>
								<th class="column-4">Quantity</th>
								<th class="column-5">Total</th>
								<th class="column-5">Action</th>
							</tr>
							<?php
							if (isset($_SESSION['cart'])) {
								foreach ($_SESSION['cart'] as $key => $value) {
									?>
									<tr class="table_row">
										<td class="column-1">
											<div class="how-itemcart1">
												<img src="../dashmin/img/<?php echo $value['p_image'] ?>" alt="IMG">
											</div>
										</td>
										<td class="column-2">
											<?php echo $value['p_name'] ?>
										</td>
										<td class="column-3">
											<?php echo $value['p_price'] ?>
										</td>
										<td class="column-4">
											<?php echo $value['p_qty'] ?>
										</td>
										<td class="column-5">
											<?php echo $value['p_qty'] * $value['p_price'] ?>
										</td>
										<td class="column-5"><a href="?removeId=<?php echo $value['p_id'] ?>"
												class="btn btn-outline-danger">
												remove

											</a></td>
									</tr>
									<?php
								}
							}

							?>

						</table>
					</div>

					<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
						<div class="flex-w flex-m m-r-20 m-tb-5">
							<input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text"
								name="coupon" placeholder="Coupon Code">

							<div
								class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
								Apply coupon
							</div>
						</div>

						<div
							class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
							Update Cart
						</div>
					</div>
				</div>
			</div>

			<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
				<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
					<h4 class="mtext-109 cl2 p-b-30">
						Cart Totals
					</h4>



					<div class="flex-w flex-t p-t-27 p-b-33">
						<div class="size-208">
							<span class="mtext-101 cl2">
								Total:
							</span>
						</div>

						<div class="size-209 p-t-1">
							<span class="mtext-110 cl2">
								<?php
								$count = 0;
								if (isset($_SESSION['cart'])) {
									foreach ($_SESSION['cart'] as $key => $val) {
										$subtotal = $val['p_qty'] * $val['p_price'];
										$count += $subtotal;

									}
									echo $count;
								} else {
									echo $count;
								}
								?>


							</span>
						</div>
					</div>
					<?php
					if (isset($_SESSION['useremail'])) {
						?>

						<a href="?checkout"
							class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">Proceed to
							Checkout</a>

						<?php
					} else {
						?>
						<a href="login.php"
							class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">Proceed to
							Checkout</a>
						<?php
					}
					?>

				</div>
			</div>
		</div>
	</div>
</form>




<?php
if (isset($_GET['checkout'])) {
	$userid = $_SESSION['userId'];
	$username = $_SESSION['userName'];
	$totalfinalAmount = 0;
	$proCount = 0;
	foreach ($_SESSION['cart'] as $key => $val) {

		$proCount++;
		$proID = $val['p_id'];
		$proname = $val['p_name'];
		$proqty = $val['p_qty'];
		$proprice = $val['p_price'];
		$totalAmount = $proqty * $proprice;
		$totalfinalAmount += $totalAmount;
		$query = $pdo->prepare("INSERT INTO `orders`(`user_id`, `user_name`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`) VALUES (:ui,:un,:pi,:pn,:pq,:pp)");
		$query->bindParam("ui", $userid);
		$query->bindParam("un", $username);
		$query->bindParam("pi", $proID);
		$query->bindParam("pn", $proname);
		$query->bindParam("pq", $proqty);
		$query->bindParam("pp", $proprice);
		$query->execute();
	}
	$proCount;
	$totalfinalAmount;
	$invoice_query = $pdo->prepare("INSERT INTO invoice (user_id, user_name, total_products_count, sum_of_total_products) VALUES (:user_id, :user_name, :total_products_count, :sum_of_total_products)");
	$invoice_query->bindParam(":user_id", $userid);
	$invoice_query->bindParam(":user_name", $username);
	$invoice_query->bindParam(":total_products_count", $proCount);
	$invoice_query->bindParam(":sum_of_total_products", $totalfinalAmount);
	$invoice_query->execute();
	echo "<script>
alert('order place successfully');
location.assign('index.php');
</script>";
	unset($_SESSION['cart']);
}
include("footer.php");
?>