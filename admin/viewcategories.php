<?php include('includes/header.php');
if(isset($_SESSION['email']) && $_SESSION['email'] != '') 
{

} else{
    header('Location: login.php');
}
include('includes/sidebar.php');
?> 

<?php
include('includes/config.php');
 
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
$arr_users = [];
if ($result->num_rows > 0) {
    $arr_users = $result->fetch_all(MYSQLI_ASSOC);
}
?>

<style>
.getting{
	margin-top: 50px;
}
</style>
<?php
   if(isset($_GET['delete']))
   {      
   	require_once('includes/config.php');
      $id = $_GET['delete'];
      $sql02 = "DELETE FROM categories WHERE id=$id";
      $del = mysqli_query($conn, $sql02);
      if($del)
      {
        echo "<script>alert('Category Has Been Deleted')</script>";
        echo "<script>window.open('viewcategories.php','_self')</script>";
      } else{
         echo "coudln't Delete";
      }
   }
?>
<div class="container">
	<div class="row getting">
			<div class="col-md-3 col-sm-12"></div>
		<div class="col-md-8 col-sm-12">		
			<table class="table table-bordered" id="userTable">
				<thead>				
					<th>S.No</th>
					<th>Category </th>
					<th>Image</th>					
					<th>Edit</th>
					<th>Delete</th>
				</thead>
				 <tbody>				 	
            <?php 
                     $sql = "SELECT * FROM categories";
                     $result = mysqli_query($conn,$sql);
                     if($result){
                           $counter = $i++;
                          while($data = mysqli_fetch_assoc($result)){
                             $id = $data['id'];
                             $category = $data['category'];
                             $image_name = $data['image'];                           

                     ?>
                    <tr>
                    	<td><?php echo $i++;?>.</td>  
                        <td><?php echo $data['category']; ?></td>
                        <td><?php echo $data['image']; ?></td>                         
                        <td style="text-align:center;">                  
                           <a href="editcategory.php?editid=<?php echo $data['id']; ?>" class="btn btn-warning">
                              <span class="glyphicon" aria-hidden="true"></span>  Edit</a>  
                              </td>
                              <td>             
                           <a href="viewcategories.php?delete=<?php echo $data['id']; ?>"class="btn btn-danger">
                           <span class="glyphicon"aria-hidden="true"></span>  Delete</a>
                        </td>                   
                    </tr>
                <?php } } ?>          
        </tbody>
			</table> 
		</div>
	</div>
</div>




<?php include('includes/footer.php');?>