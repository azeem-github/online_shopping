<?php session_start();?>
<?php
include 'header.php';
include 'config.php';
define('title', 'Cart | E-Shopper');
?>
<style>

#cart_items .cart_info .cart_menu {
    background: #0FB0FE;
}
.btn:hover, .btn:focus 
   {
		background-color:indigo;
      color: white;
      text-decoration: none;
   }
	.kj:hover, .kj:focus
	{
		background-color:white;
      color: black;
      text-decoration: none;
   }
.kj{
	background-color: indigo;
   color:white;
}
.table-condensed > tbody > tr > td, .table-condensed > tbody > tr > th, .table-condensed > tfoot > tr > td, .table-condensed > tfoot > tr > th, .table-condensed > thead > tr > td, .table-condensed > thead > tr > th {
    padding: 20px;
}

</style>
<?php
if(isset($_POST['deleteAll']))
{ 
	if(isset($_SESSION['cart']))
	{ 
		session_unset(); 
		echo "<script>alert('Cart is made empty!');</script>";
	}
}
if(isset($_POST['mod_quantity']))
{
	foreach($_SESSION['cart'] as $key => $value)
	{
		if($value['id']==$_POST['id'])
		{
			$_SESSION['cart'][$key]['qty']=$_POST['mod_quantity'];     
			// print_r($_SESSION['cart']);
			echo "<script>
			window.location.href='cart.php';
			</scipt>";
		}
	}
}
$conn = mysqli_connect("localhost","root","","users_admin");
if(mysqli_connect_error()){
	echo "<script>
	alert('cannot connect to database');
	window.location.href='cart.php';
	</script>
	";
	exit();
}
// if($_SERVER["REQUEST_METHOD"]=="POST")
// {
// 	if(isset($_POST['purchase']))
// 		{
// 			if(isset($_SESSION['cart'])){
// 			$query1 = "INSERT INTO  order_manager(full_name, phone_no, address, pay_mode)VALUES('$_POST[full_name]','$_POST[phone_no]','$_POST[address]','$_POST[pay_mode]')";
// 			if (mysqli_query($conn,$query1))
// 			{    
// 				// $order_id = mysqli_insert_id($conn);
// 				// ?marks are prepared statements 

// 				// mysqli_prepare is used to prepare and sql execution
// 				$query2 = "INSERT INTO user_orders(order_id, short_description, mrp, quantity) VALUES (?,?,?,?)";
// 				$stmt = mysqli_prepare($conn,$query2);
// 				if($stmt)
// 				{  
// 					//The mysqli_stmt_bind_param() function is used to bind variables to the parameter markers of a prepared statement.
// 					mysqli_stmt_bind_param($stmt,"isii",$id,$short_description,$mrp,$quantity);
// 					foreach($_SESSION['cart'] as $key => $value)
// 					{
// 						$short_description = $value['short_description'];
// 						$mrp = $value['mrp'];
// 						$quantity= $value['quantity'];
// 						mysqli_stmt_execute($stmt);
// 					}
// 					unset($_SESSION['cart']);
// 					// unset($_SESSION['cart'][$key]);
// 					echo "<script>
// 					alert('Order Placed');
// 					window.location.href='index.php';
// 					</script>";
// 				}
// 				}
// 			}
// 			else
// 			{
// 				echo "<script>
// 				alert('SQL Error');
// 				window.location.href='cart.php';
// 				</script>";
// 			}
// 		}
// }

if(isset($_POST['delete']))
{
	if($_POST['id'] != '')
	{
		if(isset($_SESSION['cart']))
		{ 
			foreach($_SESSION['cart'] as $key => $value)
			{
				
				//print_r($key)
				if($value['id'] == $_POST['id'])
				{
					unset($_SESSION['cart'][$key]);
					unset($_SESSION['prodId']);
					echo "<script> alert('Item has been Removed'); </script>"; 
				}
			}
		} elseif(isset($_SESSION['prodId']))
		{
			echo "<script> alert('Session is not set'); </script>"; 
			unset($_SESSION['prodId']);
			session_unset();
		}
	}
}

if(isset($_POST['update']))
{
	if($_POST['qty'] != '')
	{
		if(isset($_SESSION['cart']))
		{ 
			foreach($_SESSION['cart'] as $key => $value)
			{
				//print_r($key)
				if($value['id'] == $_POST['id'])
				{
					$_SESSION['cart'][$key]['qty'] = $_POST['qty'];
					
					//print_r($_SESSION['cart']);
					// echo "<script>alert('Quantity Updated');</script>";
				}
			}
		}
	}
}

if(isset($_SESSION['prodId']))
{ 
		$sql = mysqli_query($conn, "SELECT id, image, short_description, mrp, qty FROM products WHERE id='$_SESSION[prodId]'");
	while($cartRows = mysqli_fetch_assoc($sql))
	{
		if(isset($_SESSION['cart']))
		{ 		
			//	print_r($_SESSION);
			$items = array_column($_SESSION['cart'], 'short_description');
			$prod = $cartRows['short_description'];
			if(in_array($prod, $items))
			{	
				echo "<script>alert('Welcome to Cart');</script>";
			} 
			else
			{
					$count = count($_SESSION['cart']);
					$_SESSION["cartItems"]=$count+1;
					$_SESSION['cart'][$count] = $cartRows;
					echo "<script>
					alert('Item added to cart'); 
					</script>"; 
			}
		}
		else
		{ 
			$_SESSION["cartItems"] = 1;
			$_SESSION['cart']['0'] = $cartRows;
			echo "<script>
			alert('Item added to cart');
			</script>"; 
		}
	}
}
?>
<h2 style="text-align:center;">My Cart</h2>
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
			</div>
			<div class="table-responsive cart_info ">
			<?php
if(isset($_SESSION['cart'])){
?>					
<!-- Testing Cart products according to User Email [START]-->
<?php //echo $_SESSION['email'];?>
<!-- Testing Cart products according to User Email [end]-->
<div class="container">
	<div class="row">
		<div class="col-md-12 text-center border rounded bg-light my-5">
			
		</div>
		<div class="col-md-8">
			<table class="table table-bordered table-striped">
				<thead class="text-center">
					<tr>
						<th class="text-center">No.</th>
						<th class="text-center">Item Name</th>
						<th class="text-center">Item Price</th>
						<th class="text-center">Quantity</th>
						<th class="text-center">Total</th>
						<th class="text-center">Action</th>
					<br>
							<form action="" method="POST">
								<input type="hidden" name="prodId" value="<?php echo $product['id']; ?>">
								<button name="deleteAll" class="btn btn-default" style="margin-left:88%;"class="cart_quantity_delete btn-danger" style="margin-left:50%;" href=""> Clear Cart</button>
								<br>
							</form>		
							<br>		
					</tr>
	  			</thead>	  			
	  			<tbody class="text-center">
	  				<?php
	  				$total=0;
	  				if(isset($_SESSION['cart']))
	  				{
	  					foreach($_SESSION['cart'] as $key => $value)
	  					{
	  						$sr=$key+1;
	  						$total =$total+$value['mrp'];
	  						echo"
	  						<tr>
		  						<td>$sr.</td>
		  						<td>$value[short_description]</td>
		  						<td>$value[mrp]<input type='hidden' class='iprice' value='$value[mrp]'</td>													  
		  						<td>
								  <form action='' method='POST'>
								  <input type='number' class='text-center iquantity'  name='mod_quantity' onchange='this.form.submit();' value='$value[qty]' name='qty'>
								  <input type='hidden' name='id' value='$value[id]'>								  
								  </form> 
								  </td>
								  <td class='itotal'></td>								  
		  						<td>
		  						   <form action='' method='POST'>
			  							<button name='delete' class='btn btn-btn-danger'>Delete</button>
			  							<input type='hidden' name='id' value='$value[id]'>
			  						</form>
		  						</td>
	  						</tr>
	  						";
	  					}
	  				}
	  				?>	    			
	  			</tbody>
			</table>
		</div>

	<div class="col-md-3">
		<div class="border bg-light rounded jumbotron">
			<h3>Grand Total:</h3>
			<h5 class="text-right" id="gtotal"></h5>
			<hr>
			<?php
				if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0)
				{
			?>
				<form action="manage_cart.php" method="POST">
					<div class="form-group">
						<label>Full Name</label>				
						<input type="text" name="full_name" class="form-control" placeholder="Full Name" required>
					</div>
					<div class="form-group">
						<label>Phone Number</label>
						<input type="tel" class="form-control" name="phone_no" placeholder="Phone No" maxlength="10">
					</div>
					<div class="form-group">
						<label>Address</label>
						<textarea name="address" class="form-control" col='6' row='5' placeholder="address" required>
						</textarea>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="pay_mode" value="COD" checked>
						<label class="form-check-label">
						Cash On Delivery
						</label>
					</div>			
					<br>		
					<button class="btn btn-block kj" type="submit" name="purchase">Make Purchase</button>	
				</form>
				<?php
				}
				?>
			</div>
		</div>
	</div>
</div>
				<?php
			}else{ 
				echo "<h1 align=center style=color:black>Your Cart Is Empty </h1> <br> ";
 } ?>
			</div>
		</div>
	</section>
<?php include "footer.php";?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
	$('img[data-enlargeable]').addClass('img-enlargeable').click(function() 
	{
		var src = $(this).attr('src');
		var modal;
	
		function removeModal() 
		{
			modal.remove();
			$('body').off('keyup.modal-close');
		}
		modal = $('<div>').css
		({
			background: 'RGBA(0,0,0,0.7) url(' + src + ') no-repeat center',
			backgroundSize: 'contain',
			width: '100%',
			height: '100%',
			position: 'fixed',
			zIndex: '10000',
			top: '0',
			left: '0',
			cursor: 'zoom-out'
		}).click(function() 
		{
		removeModal();
		}).appendTo('body');
		
		
		//Handling ESC
		$('body').on('keyup.modal-close', function(e) 
		{
		if (e.key === 'Escape') 
		{
		removeModal();
		}
		});
	});
</script>

<script>
	var gt=0;
	var iprice=document.getElementsByClassName('iprice');
	var iquantity=document.getElementsByClassName('iquantity');
	var itotal=document.getElementsByClassName('itotal');
	var gtotal=document.getElementById('gtotal');
	function subTotal()
	{
		gt=0;
			for(i=0;i<iprice.length;i++)
			{		
				itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);

				gt=gt+(iprice[i].value)*(iquantity[i].value);
			}
			gtotal.innerText=gt;
	}
	subTotal();
</script>

