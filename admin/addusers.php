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
if(isset($_POST['submit'])){
	include('includes/config.php');
    $email = $_POST['email'];
    $contact = $_POST['contact_no'];
    $address = $_POST['address'];

    $sql3 = "INSERT INTO users(email,contact_no,address )VALUES('$email','$contact','$address')";
    $add = mysqli_query($conn, $sql3);

    if($add){
            $_SESSION['success'] == "Added Successfully";
            echo "<script>alert('User Has Been Added')</script>";
            echo "<script>window.open('viewusers.php','_self')</script>";

        }else{
           echo "not comming";exit;
        }
}
?>
	<div class="conatiner">
   <div class="row jumbotron">
            <div class="col-md-3 col-sm-12"></div>
            <div class="col-md-4 col-sm-12">
               <form action="" method="post">
                  <span class="h3" style="text-decoration:underline;"><b>Add Users</b></span>
                  <br><br>                   
                  <div class="form-group">
                     <label style="text-decoration:underline">Email: </label>
                     <input type="email" name="email" placeholder="email@example.com" required>   
                  </div>
                     <div class="form-group">
                     <label style="text-decoration:underline">Contact No: </label>
                     <input type="tel" name="contact_no" minlength="10" maxlength="10" placeholder="Field 2" required>   
                  </div>
                     <div class="form-group">
                     <label style="text-decoration:underline">Address: </label>
                     <input type="text" name="address" placeholder="Field 3" required>   
                  </div>


                  <input type="submit" name="submit" value="Submit" class="btn btn button">
                  <a href="dashboard.php" class="btn btn-default">Back</a>
               </form>
            </div>

            <div class="col-md-3 col-sm-12"></div>
   </div>
</div>


<?php include('includes/footer.php');?>