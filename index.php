<?php 
if (session_status() !== PHP_SESSION_ACTIVE) {    session_start();   }
require "config.php";
include "header.php";
$cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
define('title', 'Cart | E-Shopper');

?>
<style>
.pagination .active a, .pagination .active span, .pagination .active a:hover, .pagination .active span:hover, .pagination .active a:focus, .pagination .active span:focus {
    background-color: dodgerblue;
    border-color: #0FBBFE;;
    color: #FFFFFF;
    cursor: default;
    z-index: 2;
}
.get{
	background: dodgerblue;
	color:white;
}
.control-carousel:hover {
    color: dodgerblue;
}
.buttonadd{
	background-color:dodgerblue;
	color: white;
}
.control-carousel {
    position: absolute;
    top: 50%;
    font-size: 60px;
    color: grey;
}

.carousel-indicators li.active {
    background: dodgerblue;
}
.pagination li a:hover {
    background: dodgerblue;
    color: #fff;
}
.solidbox{
	border: 1px solid #D3D3D3;
}
</style>
<?php
$limit = 3;
if(isset($_GET['page'])){
$page = $_GET['page'];
}else{
	$page=1;
}
$offset = ($page - 1) * $limit;

//ADD Item To Cart
if(isset($_POST['addCart'])){
	 $_SESSION['prodId'] = $_POST['id'];
	echo "<script>window.location.href='cart.php';</script>";

}

if (isset($_POST['prodId']) && $_POST['prodId']!=""){
	$prodId = $_POST['prodId'];
	$result = mysqli_query(
	$conn,
	"SELECT * FROM products WHERE id='$prodId'"
	);
	$row = mysqli_fetch_assoc($result);
	$image_name = $_FILES['image'];
	$short_description = $row['short_description'];
	$mrp = $row['mrp'];
	
	
	$cartArray = array(
		$prodId=>array(
		'image'=>$image_name,
		'short_description'=>$short_description,
		'mrp'=>$mrp,
		'quantity'=>1)
	);
	
	 }
	 if(isset($_POST['addToWishList'])){
		$_SESSION['wishId'] = $_POST['prodId'];
		echo "<script>window.location.href='wishlist.php';</script>";
	}
	
	if (isset($_POST['prodId']) && $_POST['prodId']!=""){
		$prodId = $_POST['prodId'];
		$result = mysqli_query(
		$conn,
		"SELECT * FROM products WHERE id='$prodId'"
		);
		$row = mysqli_fetch_assoc($result);
		$image_name = $_FILES['image'];
		$short_description = $row['short_description'];
		$mrp = $row['mrp'];

		$cartArray = array(
			$prodId=>array(
			'image'=>$image_name,
			'short_description'=>$short_description,
			'mrp'=>$mrp,
			)
		);
		
		}

$sql = mysqli_query($conn, "SELECT * from Slider");
	 ?>
			 <section id="slider"><!--slider-->
			 <div class="container">
				 <div class="row">
					 <div class="col-sm-12">
						 <div id="slider-carousel" class="carousel slide" data-ride="carousel">
	 
							 <!-- Indicators -->
							 <ol class="carousel-indicators">
						 <?php
						 $a = 0;
						 foreach($sql as $row){
							 $active = '';
							 if($a == 0){
								 $active = "active";
							 }
						 ?>
								 <li data-target="#slider-carousel" data-slide-to="<?php echo $a; ?>" class="<?php echo $active; ?>"></li>
								 <?php $a++; } ?>
							 </ol>
							 <!-- Wrapper for slides -->
							 <div class="carousel-inner">
								 <?php
								 $a = 0;
								 foreach($sql as $row){
									 $active = ''; 
									 if($a == 0){
										 $active = "active";
									 }
								 ?>
								 <div class="item <?php echo $active; ?>">
									 <div class="col-sm-6">
										 <h1><span style="color:dodgerblue;">E</span>-Commerce</h1>
										 <h2>Free E-Commerce Template</h2>
										 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
										 <button type="button" class="btn btn-default get">Get it now</button>
									 </div>
									 <div class="col-sm-6">
										 <img src="admin/images/slider/<?= $row['image']?>" class="girl img-responsive" alt="" />
										 <!-- <img src="images/carousel/pricing.png"  class="pricing" alt="" /> -->
									 </div>
								 </div>							
								 <?php $a++; } ?>
							 </div>
	 
							 <!-- Left and right controls -->
							 <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							 <span>&#60;</span> 
							 </a>
							 <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							 <span>&#62;</span> 
							 </a>
						 </div>
						 
					 </div>
				 </div>
			 </div>
		 </section><!--/slider-->
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar solidbox">
						<h2 style="color:dodgerblue">Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
							<?php
							if(isset($_GET['addCart'])){
								$id = $_GET['id'];
							}
							  $query = mysqli_query($conn, "SELECT * FROM categories");
							  
							  while($rows = mysqli_fetch_array($query)){
							  
								//   $count = mysqli_query($conn, "SELECT id FROM products WHERE products.category = $rows[id]");
								//   $prodCount = mysqli_num_rows($count);
								  ?>
								<div class="panel-heading">
								<h4 class="panel-title"><a href="categories.php?id=<?php echo $rows['id']; ?>">
										<img src="admin/images/categories/<?php echo $rows['image']; ?>" height="30" width="30" alt="" />
										<?php echo $rows['category']; ?>
										<!-- <span class="pull-right">(<?php echo $prodCount; ?>)</span> -->
										</a>
										</h4>
								</div>
                                <?php } ?>
							</div>
					
						</div><!--/category-productsr-->
					</div>
				</div>
			
				<div class="col-sm-8 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center" style="color:dodgerblue">Featured Items</h2>
						
						<?php
						// if(isset($_GET['id'])){
						// 	$id = $_GET['id'];
						//    $query2 = mysqli_query($conn, "SELECT * FROM products WHERE category=$id");
						//    var_dump($query2);
						   											 
                        //  while($row = mysqli_fetch_array($query2)){
                        //     print_r($row);

						$query2 = mysqli_query($conn, "SELECT * FROM products LIMIT " . $offset . "," .$limit);
						while($row = mysqli_fetch_assoc($query2)){
						 ?>
						<div class="col-sm-4" id="allProds">			
							<div class="product-image-wrapper">
								<div class="single-products">
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
									</ul>
								</div>
							</div>
						</div>
                        <?php  
				} 

							$query3= mysqli_query($conn, "SELECT * FROM products");
							while($row1 = mysqli_fetch_array($query3)){

							?>	
							<div class="col-sm-3">			
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<form action="" method="post" enctype="multipart/form-data">
										<img data-enlargeable style="cursor: zoom-in" src="admin/images/upload/<?php echo $row1['image']; ?>" alt="" />
										<h3 style="color:black;">$ <?php echo $row1['mrp']; ?></h3>
											<p><?php echo $row1['short_description']; ?></p>
											<input type="hidden" name="id" value="<?php echo $row1['id']; ?>">
										<button type="submit" name="addCart" class="btn btn buttonadd" style="width:100%;">Add to Cart</button><br>
										<button type="submit" name="addCart" class="btn btn-default" style="width:100%;">Add To Wishlist</button>
									</form>
									</div>
								</div>					
							</div>
						</div>					
						<?php  } 
						$paginaton = mysqli_query($conn, "SELECT * FROM products");
						$count = mysqli_num_rows($paginaton);
						if($count > 0){
							$tot_pages = ceil($count / $limit);
							echo "<div class='col-sm-12' id='paging'><ul class='pagination' >";
							if($page >1){
								echo "<li><a href='index.php?page=".($page-1)."'>Prev</a></li>";
							}		
							for($i=1; $i <= $tot_pages; $i++){
								if($i == $page){
									$active = "active";
								}
								else{
									$active="";
								}
							echo "<li class='$active'><a href='index.php?page=".$i."'>$i</a></li>";
							}
							if($tot_pages > $page){
								echo '<li style="background-color:dodgerblue"><a href="index.php?page='.($page+1).'">Next</a></li>';
							}		
						}
						echo "</ul></div>";
						
						?> 
				</div>
				</div>
			</div>
		</div>
	</section>	


<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>
	<?php include "footer.php"; ?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script>
	$('img[data-enlargeable]').addClass('img-enlargeable').click(function() {
    var src = $(this).attr('src');
    var modal;
  
    function removeModal() {
	modal.remove();
	$('body').off('keyup.modal-close');
    }
    modal = $('<div>').css({
	background: 'RGBA(0,0,0,0.7) url(' + src + ') no-repeat center',
	backgroundSize: 'contain',
	width: '100%',
	height: '100%',
	position: 'fixed',
	zIndex: '10000',
	top: '0',
	left: '0',
	cursor: 'zoom-out'
    }).click(function() {
	removeModal();
    }).appendTo('body');
    //handling ESC
    $('body').on('keyup.modal-close', function(e) {
	if (e.key === 'Escape') {
	removeModal();
	}
    });
	});
	</script>

	<script>
		$('#allProds').show(function(){
			$('#paging').show();
		});
		</script>