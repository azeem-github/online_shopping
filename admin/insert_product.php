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
if(isset($_POST['upload'])){
   include('includes/config.php');
    $short_description = $_POST['short_description'];
    $mrp = $_POST['mrp'];
    $image_name = $_FILES["image"]["name"];

    $sql3 = "INSERT INTO products(image,short_description,mrp)VALUES('$image_name','$short_description','$mrp')";
    $add = mysqli_query($conn, $sql3);

    if($add){
        
        if(move_uploaded_file($_FILES["image"]['tmp_name'], "images/upload/".$_FILES["image"]["name"])){
            $_SESSION['success'] == "Added Successfully";
            echo "<script>alert('Product Has Been Added')</script>";
            echo "<script>window.open('viewproducts.php','_self')</script>";

        }else{
           echo "not comming";
        }
    }
    else{
        $_SESSION['success'] = " not added " ;
        header("Location : insert_product.php");
    }

}
?>

	<div class="conatiner">
   <div class="row jumbotron">
            <div class="col-md-3 col-sm-12"></div>
            <div class="col-md-5 col-sm-12">
               <form action="" method="post" enctype="multipart/form-data">
                  <span class="h3" style="text-decoration:underline;"><b>Add Products</b></span>
                  <br><br>                   
                  <div class="form-group">
                     <label style="text-decoration:underline">Product : </label>
                     <input type="file" name="image" placeholder="Field 1" required>   
                  </div>
                     <div class="form-group">
                     <label style="text-decoration:underline">Description: </label>
                     <textarea type="text" cols="15" rows="7" name="short_description" placeholder="" required></textarea> 
                  </div>
                     <div class="form-group">
                     <label style="text-decoration:underline">Price: </label>
                     <input type="text" name="mrp" placeholder="" required>   
                  </div>


                  <input type="submit" name="upload" value="Submit" class="btn btn button">
                  <a href="dashboard.php" class="btn btn-default">Back</a>
               </form>
            </div>

            <div class="col-md-3 col-sm-12"></div>
   </div>
</div>


<?php include('includes/footer.php');?>