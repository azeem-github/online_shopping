<?php include 'header.php';?>
<?php include 'config.php';?>
<style>
.contact{
   margin-right:300px;
   margin-bottom: 50px;
   margin-left: 500px;
}
.btn{
   margin-left:190px;
   text-align: center;
   background-color:indigo;
   color:white;
}
.btn:hover {
	background-color: indigo;
	color: white;
	}
</style>
<?php  
if(isset($_POST['submit']))
{
   $fullname = $_POST['fullname'];
   $email = $_POST['email'];
   $message = $_POST['message'];
   $query5 = "INSERT INTO contact_us(fullname,email,message)VALUES('$fullname','$email','$message')";
   if(mysqli_query($conn,$query5)){
      echo"<script>alert('Contact Form Is Saved!');</script>";
   }else{
      echo "<script>alert('contact form wasnt saved');</script>";
   }
}
?>
<h3 style="text-align:center"><b style="text-decoration:underline">Contact Us</b></h3>
<div class="conatiner">
   <div class="row contact"><br><br>
      <div class="col-md-6">
         <form method="POST" action="">
            <div class="form-group">
               <label>Full Name:</label>
               <input type="text" name="fullname" class="form-control" placeholder="Full name" required>
            </div>
            <div class="form-group">
               <label>Email:</label>
               <input type="text" name="email" class="form-control" placeholder="Full name" required>
            </div>
            <div class="form-group">
               <label>Message:</label>
               <textarea type="text" name="message" col="3" row="4" class="form-control" placeholder="Full name" required></textarea>
            </div>
            <input type="submit" name="submit" class="btn  btn" value="Send">
         </form>
      </div>
   </div>
</div>
<?php include 'footer.php'; ?>