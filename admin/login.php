<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<title>Login Form</title>
	</head>
	<body>
		<?php include('includes/config.php');?>
			<style>
			.admincontrol{
				margin-top: 100px;
				margin-right:300px;
				margin-bottom: 50px;
				margin-left: 450px;				
			}
			.inpt{
				text-align: center;
				width: 290px;
			}
			.adminimg{
				margin-top: 10px;
				margin-left: 50px; 
				width: 400px;
				height: 380px;
			}
			.jumbotron{
				margin-top: 60px;
				width: 430px;
			}
			.btn{
			background-color: #5dade2;
			border: none;
			margin-left: 120px;
			color: white;
			text-align: center;
			}
			.btn:hover {
			background-color: black;
			color: white;
			}
			</style>

		<div class="container admincontrol">
			<div class="row">	
						<!--<div class="col-md-6 col-sm-12">
							<img src="images/budspro.jpg" alt="" class="adminimg">
						</div> -->
				<div class="col-md-8 col-md-12">	
					<form action="" method="POST" class="jumbotron">
									<?php
							session_start();
								if(isset($_SESSION['email']))
								{
									header('Location: dashboard.php');
								} 
								else
								{

								}

								$email = '';
								$pass = '';

								if(isset($_POST['submit']))
								{
									$email = trim($_POST['email']);
									$pass  =  trim($_POST['password']);

									$query1 = "SELECT * FROM admin WHERE email = '$email' and password = '$pass'";
									$check1 = mysqli_query($conn,$query1);
									$info1 = mysqli_fetch_assoc($check1);
									$num_row1 = mysqli_num_rows($check1);
									if($num_row1 == 0)
									{
										?>
										<div style="color:red";><h5 style="text-align:center;"><?php echo "Email or Password incorrect";?></div>
									<?php }
									else
									{
										// start session and show in admin dashboard
										$_SESSION['email'] = $email;
										echo "<script>alert('Welcome $email')</script>";
										echo "<script>window.open('dashboard.php','_self')</script>";
											
									}
								}
						?>
						<h2 style="text-decoration: underline; text-align:center;"><b>Admin Login</b></h2>
						<div class="form-group">
							<input type="text" class="form-control inpt" name="email" placeholder="Email Address" required>
						</div>

						<div class="form-group">					
							<input type="password" class="form-control inpt" name="password" placeholder="Password" required>
						</div>
						<input type="submit" name="submit" value="Login" class="btn">
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>