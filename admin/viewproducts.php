<?php include('includes/header.php');

if(isset($_SESSION['email']) && $_SESSION['email'] != '') 
{

} else{
    header('Location: index.php');
}

include('includes/sidebar.php');?>

<?php
 include('includes/config.php');
//  $sql = "SELECT * FROM products";
//  $result = $conn->query($sql);
//  $arr_users = [];
//  if ($result->num_rows > 0) {
//     $arr_users = $result->fetch_all(MYSQLI_ASSOC);
//    }
//    ?>

<style>
.getting{
	margin-top: 50px;
}
</style>
<?php
//trial delete data
include('includes/config.php');
if(isset($_POST['delete_btn']))
{
   $id= $_POST['delete_id'];
   
   $query1 = "DELETE FROM products WHERE id='$id'";
   $query_run = mysqli_query($conn,$query1);
   if($query_run)
   {
      echo "<script>alert('Product Has Been Deleted')</script>";
    echo "<script>window.open('viewproducts.php','_self')</script>";
   }
   else
   {
      echo "<script>alert('Product Has Not Been Deleted')</script>";
      echo "<script>window.open('insert_products.php','_self')</script>";
   }

}


?>

<div class="container">
	<div class="row getting">
			<div class="col-md-3 col-sm-12"></div>
		<div class="col-md-8 col-sm-12">		
			<table class="table table-bordered" id="userTable">
         <thead>
                     <tr>              
                        <th>S.No</th> 
                        <th style="text-align:center;">Description</th> 
                        <th style="text-align:center;">Price</th>                    
                        
                        <th style="text-align:center;">image</th>
                        <th style="text-align:center;">Edit</th>            
                        <th style="text-align:center;">Delete</th>  
                     </tr>
                  </thead>  
               <tbody>
                     <?php 
                     $sql = "SELECT * FROM products";
                     $result = mysqli_query($conn,$sql);
                     if($result){
                           $counter = $i++;
                          while($data = mysqli_fetch_assoc($result)){
                             $id = $data['id'];
                             $short_description = $data['short_description'];
                             $mrp = $data['mrp'];                             
                             $image_name = $data['image'];

                     ?>
                     <tr>    
                           <td><?php echo $i++;?>.</td>                                                              
                           <td style="text-align:center;"><?php echo $data['short_description'];?></td>    
                           <td style="text-align:center;">$<?php echo $data['mrp'];?></td>   
                           <td style="text-align:center;"><?php echo $data['image'];?></td>                                         
                              <td style="text-align:center;">                  
                          <form action="editproduct.php" method="POST">
                           <input type="hidden" name="edit_id" value="<?php echo $data['id']; ?>">
                           <button type="submit" name="editid" class="btn btn-warning">Edit</button>
                           </form>
                          </td>
                          <td>
                           <form action="" method="POST">
                              <input type="hidden" name="delete_id" value="<?php echo $data['id'];?>">
                              <button type="submit" name="delete_btn" class="btn btn-danger">Delete</button>
                           </form>
                          </td>                           
                        </td>
                     </tr>            
                     <?php } }?>
                  </tbody>        
			</table>
		</div>
	</div>
</div>




<?php include('includes/footer.php');?>