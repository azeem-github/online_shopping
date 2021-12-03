<?php include('includes/header.php');
if(isset($_SESSION['email']) && $_SESSION['email'] != '') 
{

} else{
    header('Location: login.php');
}
include('includes/sidebar.php');
?> 

<style>
.boxing{
	margin-top: 50px;
	padding:  10px;
/*	border: 1px solid black;
	border-left*/
}
.jumbotron{
   width:40%;
   height:100%;
   margin-left: 270px;
   margin-top: 50px;
}
.button{
  	background-color:#17a2b8;
    color:white;
  
}
</style>
<?php
      include('includes/config.php'); 
      $id = $_GET['editid'];
      $sql = "SELECT * FROM users WHERE id=$id";
      $result = mysqli_query($conn,$sql);
      $data = mysqli_fetch_assoc($result);
      $email = $data['email'];
      $contact = $data['contact_no'];
      $address = $data['address'];

 

      if(isset($_POST['submit'])){
         $email = $_POST['email'];
         $contact = $_POST['contact_no'];
         $address = $_POST['address'];

       
         $sql = "UPDATE users SET id=$id,email='$email',contact_no='$contact',address='$address' WHERE id=$id";
         $result = mysqli_query($conn,$sql);
         if($result){
            echo "<script>alert('User Has Been Updated successfully')</script>";
            echo "<script>window.open('viewusers.php','_self')</script>";
         } else{
            echo "couldn't update";
         }
      }
?>
	<div class="conatiner">
   <div class="row jumbotron">
            <div class="col-md-3 col-sm-12"></div>
            <div class="col-md-4 col-sm-12">
               <form action="" method="post">
                  <span class="h3" style="text-decoration:underline;"><b>Edit Users</b></span>
                  <br><br>                   
                  <div class="form-group">
                     <label style="text-decoration:underline">Email: </label>
                     <input type="email" name="email" value="<?php echo $email;?>" />
                  </div>
                     <div class="form-group">
                     <label style="text-decoration:underline">Contact No: </label>
                     <input type="tel" name="contact_no" maxlength="10" value="<?php echo $contact;?>"/>
                  </div>
                     <div class="form-group">
                     <label style="text-decoration:underline">Address: </label>
                     <input type="text" name="address"  value="<?php echo $address;?>"/>  
                  </div>
                  <input type="submit" name="submit" value="Update" class="btn btn button">
                  <a href="viewusers.php" class="btn btn-default">Back</a>
               </form>
            </div>

            <div class="col-md-3 col-sm-12"></div>
   </div>
</div>


<?php include('includes/footer.php');?>