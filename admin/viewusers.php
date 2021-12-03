<?php include('includes/header.php');
include('includes/sidebar.php');?>

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
      $sql02 = "DELETE FROM users WHERE id=$id";
      $del = mysqli_query($conn, $sql02);
      if($del)
      {
        echo "<script>alert('User Has Been Deleted')</script>";
        echo "<script>window.open('viewusers.php','_self')</script>";
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
					<th>Email</th>
					<th>Contact No</th>
					<th>Address</th>
					<th>Edit</th>
					<th>Delete</th>
				</thead>
				 <tbody>				 	
            <?php if(!empty($arr_users)) { 
 				$counter = $i++; ?>
                <?php foreach($arr_users as $user) { ?>
                    <tr>
                    	<td><?php echo $i++;?>.</td>  
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['contact_no']; ?></td>
                        <td><?php echo $user['address']; ?></td>  
                        <td style="text-align:center;">                  
                           <a href="edituser.php?editid=<?php echo $user['id']; ?>" class="btn btn-warning">
                              <span class="glyphicon" aria-hidden="true"></span>  Edit</a>  
                              </td>
                              <td>             
                           <a href="viewusers.php?delete=<?php echo $user['id']; ?>"class="btn btn-danger">
                           <span class="glyphicon"aria-hidden="true"></span>  Delete</a>
                        </td>                   
                    </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
			</table>
		</div>
	</div>
</div>




<?php include('includes/footer.php');?>