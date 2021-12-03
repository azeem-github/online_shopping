<?php include('includes/header.php');
include('includes/config.php');
include('includes/sidebar.php');?>

<style>
.jumbotron{
   width:50%;
   height:100%;
   margin-left: 290px;
   margin-top: 70px;
}
.button{
   background-color: green;
   color: white;
}
</style>
<?php 
if(isset($_POST['upload'])){
   include('includes/config.php');
    $category = $_POST['category'];
    $image_name = $_FILES["image"]["name"];

    $sql3 = "INSERT INTO categories(category,image)VALUES('$category','$image_name')";
    $add = mysqli_query($conn, $sql3);

    if($add){
        
        if(move_uploaded_file($_FILES["image"]['tmp_name'], "images/categories/".$_FILES["image"]["name"])){
            $_SESSION['success'] == "Added Successfully";
            echo "<script>alert('Categories Has Been Added')</script>";
            echo "<script>window.open('viewcategories.php','_self')</script>";

        }else{
           echo "not comming";
        }
    }
    else{
        $_SESSION['success'] = " not added " ;
        header("Location : addcat.php");
    }

}
?>
<div class="conatiner">
   <div class="row jumbotron">
            <div class="col-md-3 col-sm-12"></div>
            <div class="col-md-4 col-sm-12">
               <form action="" method="post" enctype="multipart/form-data">
                  <span class="h3" style="text-decoration:underline;"><b>Add Category</b></span>
                  <br><br>          
                  <div class="form-group">
                     <label style="text-decoration:underline">Category:</label><br>
                     <select class="form-control" name="category">
                           <option value="Sportswear">Sportswear</option>
                           <option value="Men">Men</option>
                           <option value="Women">Women</option>
                           <option value="kids">kids</option>
                           <option value="Fashion">Fashion</option>
                           <option value="Household">Household</option>
                           <option value="Interiors">Interiors</option>
                           <option value="Bags">Bags</option>
                           <option value="Shoes">Shoes</option>
                           <option value="Clothing">Clothing</option>
                        </optgroup>
                     </select>                     
                  </div>           
                  <div class="form-group">
                     <label style="text-decoration:underline">Image: </label>
                     <input type="file" name="image" id="file" required>   
                  </div>

                  <input type="submit" name="upload" value="Submit" class="btn btn button">
                  <a href="dashboard.php" class="btn btn-default">Back</a>
               </form>
            </div>

            <div class="col-md-3 col-sm-12"></div>
   </div>
</div>