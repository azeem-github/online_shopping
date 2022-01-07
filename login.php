<?php session_start();
?>
<?php include 'includ/header.php';?>
<?php include 'config.php';?>
<?php
$erroremail = '';
$erropass = '';

if(isset($_POST['login']))
{
   $email = $_POST['email'];
   $password = $_POST['password'];

   $query = mysqli_query($conn, "SELECT * FROM user WHERE email ='$email' AND password ='$password'");

   if(mysqli_num_rows($query)>0)
   {
      $_SESSION['email'] = $email;
      header("Location: index.php");
      echo "login sucessful";
   } 
   else 
   {
      echo "<script>alert('Email Or Password Invalid !');</script>";
   }
}

// if(isset($_POST['submit']))
// {
//    $email = trim($_POST['email']);
//    $pass  =  trim($_POST['password']);

?>
<style>
      .btn:hover, .btn:focus 
   {
      color: #eae4e4;
      text-decoration: none;
   }
   .b
   {
      background-color: indigo;
      color:white;
   }
   .reg
   {
      margin-top:130px;
      margin-right:100px;
   }

</style>
   <div class="container reg">
      <div class="row">
         <div class="col-lg-4 col-sm-12 jumbotron">
            <form method="POST" action="">
               <?php
                  // session_start();
                  // if(isset($_SESSION['email']))
                  // {
                  //    header('Location: index.php');
                  // } 
                  // else
                  // {
                  //    // echo "<script>alert('Couldn't Login!');</script>";
                  // }
               ?>
               <h3 class="text-center" style="text-decoration:underline"><b>Login form</b></h3><br>
               <input type="text" class="form-control" type="email" name="email" Placeholder="E-mail" required>
               <input type="password" class="form-control" name="password" Placeholder="Password" required>
               <br>
               <button class="btn b" type="submit" name="login">Login</button><br><br>
               Haven't Registered Yet?<a href="register.php"> Registeration</a>
            </form>                            
         </div>
      </div>
   </div>
