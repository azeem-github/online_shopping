<?php  
    include ('includ/header.php');
    include('config.php'); 
    include('includ/functions.php'); 
?>
<style>
    .btn:hover, .btn:focus {
        color: #eae4e4;
        text-decoration: none;
    }
    .b{
        background-color: indigo;
        color:white;
    }

    .reg{    
        margin-top:110px;
        margin-right:100px;
    }
</style>
<?php
    $errfname = $errlname = $erremail = $errpassword = '';
    if(isset($_POST['submit'])) 
    {

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $conn = mysqli_connect('localhost', 'root', '', 'users_admin');

        if ($email != '') 
        {
            $sql= "SELECT * FROM user WHERE email='$email'";
            $search = mysqli_query($conn, $sql);
            $rows = mysqli_num_rows($search);

            if($rows > 0) 
            {
                echo "<script>alert('Email Already Exists!');</script>";
            } 
            else 
            {
                $sql = "INSERT INTO user (fname, lname, email , password) VALUES ('$fname', '$lname', '$email', '$password')";
                $result = mysqli_query($conn, $sql);
                if($result === TRUE)
                {
                    header("Location: login.php");
                    echo "Registered Sucessfully";
                } 
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Registration</title>
</head>
<body>
<div class="container reg">
   <div class="row">
      <div class="col-lg-4 col-sm-12 jumbotron">
         <form method="POST" action="">
            <h3 class="text-center" style="text-decoration:underline"><b>Registeration form</b></h3><br>
            <input type="text" class="form-control" name="fname" Placeholder="First Name" required>

            <input type="text" class="form-control" name="lname" Placeholder="Last Name" required>

            <input type="text" class="form-control" name="email" Placeholder="E-mail" required>

            <input type="password" class="form-control" name="password" Placeholder="Password" required>
            <br>
            <button type="submit" name="submit" class="btn b">Register</button>
            <h5>Already have an Account?<a href="login.php"> Login</h5></p>
         </form>
      </div>
   </div>
</div>
</body>
</html>