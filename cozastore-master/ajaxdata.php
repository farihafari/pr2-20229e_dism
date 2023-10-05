<?php
include("connection.php");
$query= $pdo->query("select * from product");
					$row = $query->fetchAll(PDO::FETCH_ASSOC);
					foreach($row as $product){
						echo"
						<div class='col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women'>
					<!-- Block2 -->
					<div class='block2'>
						<div class='block2-pic hov-img0'>
							<img src='../dashmin/img/". $product['product_image']."' alt='IMG-PRODUCT'>

							<a href='#' class='block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1'>
								Quick View
							</a>
						</div>

						<div class='block2-txt flex-w flex-t p-t-14'>
							<div class='block2-txt-child1 flex-col-l '>
								<a href='product-detail.php?pid='". $product['id']."' class='stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6'>
									". $product['product_name']."
								</a>

								<span class='stext-105 cl3'>
									". $product['product_price']."
								</span>
							</div>

							<div class='block2-txt-child2 flex-r p-t-3'>
								<a href='#' class='btn-addwish-b2 dis-block pos-relative js-addwish-b2'>
									<img class='icon-heart1 dis-block trans-04' src='images/icons/icon-heart-01.png' alt='ICON'>
									<img class='icon-heart2 dis-block trans-04 ab-t-l' src='images/icons/icon-heart-02.png' alt='ICON'>
								</a>
							</div>
						</div>
					</div>
				</div>"; 

						
						
					}
?>