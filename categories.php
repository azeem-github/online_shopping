<?php
require 'config.php';	
//  $rows2 = mysqli_fetch_array($query2);
   //while($rows2 = mysqli_fetch_array($query2));
// } else {
	// $query2 = mysqli_query($conn, "SELECT short_description, mrp, image FROM products");
// }

define('title', 'Categories| E-Shopper');
include 'header.php'; 

if(isset($_POST['addCart']))
{
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
?>

<style>
.pagination .active a, .pagination .active span, .pagination .active a:hover, .pagination .active span:hover, .pagination .active a:focus, .pagination .active span:focus {
    background-color: indigo;
    border-color: #eae4e4;;
    color: white;
    cursor: default;
    z-index: 2;
}
hr{
	border-top: 1px solid grey;
}
.solidbox{
	border: 1px solid #D3D3D3;
}
.jj{
	text-decoration:underline;
}
.pagination li a:hover {
    background: indigo;
    color: #fff;
}
.buttonadd{
	background-color: indigo;
   color:white;
}
.productinfo h2 {
    color: #131312;
}
</style>
<form action="" method="POST" >	
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar solidbox">
               <br>
               <h2 class="jj" style="color:indigo">Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
                            <?php 
                            $query = mysqli_query($conn, "SELECT * FROM categories");
							//  echo "<pre>"; print_r($query); echo "</pre>"; exit;
                            while($rows = mysqli_fetch_array($query)){
							//   echo "<pre>"; print_r($rows); echo "</pre>"; 
								$count = mysqli_query($conn, "SELECT id FROM products WHERE products.category = $rows[id]");
								$prodCount = mysqli_num_rows($count);
								?>
								<div class="panel-heading">
									
									<h4 class="panel-title"><a href="categories.php?id=<?php echo $rows['id']; ?>">
                           <img src="admin/images/categories/<?php echo $rows['image']; ?>" height="20" width="20" alt="" />
										<?php echo $rows['category']; ?>
										<!-- <span class="pull-right">(<?php echo $prodCount; ?>)</span> -->
										</a>
										</h4>
								</div>
                        <hr>
                                <?php } ?>
							</div>
					
						</div><!--/category-productsr-->																												
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center" style="color:indigo">Features Items</h2>
                        <?php
						if(isset($_GET['id'])){
							$id = $_GET['id'];
						   $query2 = mysqli_query($conn, "SELECT * FROM products WHERE category=$id");
						//    var_dump($query2);
						   											 
                         while($row = mysqli_fetch_array($query2)){
                            // print_r($row);
						 ?>
						<div class="col-sm-4">			
							<div class="product-image-wrapper">
								<div class="single-products">
                               
									<div class="productinfo text-center">
                           <form action="" method="post" enctype="multipart/form-data">
                           <img data-enlargeable style="cursor: zoom-in" src="admin/images/upload/<?php echo $row['image']; ?>" alt="" />
										<h2>$<?php echo $row['mrp']; ?></h2>
											<p><?php echo $row['short_description']; ?></p>
                                 <input type="hidden" name="id" value="<?php echo $row1['id']; ?>">
											<button type="submit" name="addCart" class="btn btn buttonadd" style="width:100%;">Add to Cart</button><br>
                                 <button type="submit" name="addCart" class="btn btn-default" style="width:100%;">Add To Wishlist</button>
                                 </form>
									</div>									
								</div>					
							</div>
						</div>
                        <?php } ?>
						<?php  } else {
							$query3 = mysqli_query($conn, "SELECT * FROM products");
							while($row1 = mysqli_fetch_array($query3)){

							?>	
							<div class="col-sm-4">			
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="images/shop/<?php echo $row1['image']; ?>" alt="" />
										<h2>$ <?php echo $row1['mrp']; ?></h2>
											<p><?php echo $row1['short_description']; ?></p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
					
						<?php } } ?>
				</div>
						<!-- <ul class="pagination">
							<li class="active"><a href="">1</a></li>
							<li><a href="">2</a></li>
							<li><a href="">3</a></li>
							<li><a href="">&raquo;</a></li>
						</ul> -->
					</div><!--features_items-->
			</div>
		</div>
</form>
<br>
<?php include 'footer.php'; ?>