<?php include('includes/header.php');

if(isset($_SESSION['email']) && $_SESSION['email'] != '') 
{

} else{
    header('Location: login.php');
}

include('includes/sidebar.php');?>

<?php
include('includes/config.php');
 
$sql = "SELECT * FROM post";
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
      $sql02 = "DELETE FROM post WHERE id=$id";
      $del = mysqli_query($conn, $sql02);
      if($del)
      {
        echo "<script>alert('Post Has Been Deleted')</script>";
        echo "<script>window.open('viewpost.php','_self')</script>";
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
                     <tr>              
                        <th>S.No</th> 
                        <th style="text-align:center;">Name</th>
                        <th style="text-align:center;">Description</th>                    
                        <th style="text-align:center;">image</th>
                        <th style="text-align:center;">Edit</th>            
                        <th style="text-align:center;">Delete</th>  
                     </tr>
                  </thead>  
               <tbody>
                     <?php 
                     $sql = "SELECT * FROM post";
                     $result = mysqli_query($conn,$sql);
                     if($result){
                           $counter = $i++;
                          while($data = mysqli_fetch_assoc($result)){
                             $id = $data['id'];
                             $name = $data['name'];
                             $description_a = $data['description_a'];
                             $image_name = $data['descrtiption_b'];

                     ?>
                     <tr>    
                           <td><?php echo $i++;?>.</td>      
                           <input type="hidden" name="id" value="<?php echo $id;?>">
                           <td style="text-align:center;"><?php echo $data['name'];?></td>                    
                           <td><?php echo $data['description_a'];?></td>    
                           <td style="text-align:center;">
                              <img  data-enlargeable style="cursor: zoom-in" src="images/posts/<?php echo $data['description_b'];?>"  width="60px" height="60px;">
                           </td>
                        <td style="text-align:center;">                  
                           <a href="editpost.php?editid=<?php echo $data['id']; ?>" class="btn btn-warning">
                              <span class="glyphicon" aria-hidden="true"></span>  Edit</a>  
                              </td>
                              <td>             
                           <a href="viewpost.php?delete=<?php echo $data['id']; ?>"class="btn btn-danger">
                           <span class="glyphicon"aria-hidden="true"></span>  Delete</a>
                        </td>
                     </tr>            
                     <?php } }?>
                  </tbody>        
			</table>
		</div>
	</div>
</div>




<?php include('includes/footer.php');?>