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
if(isset($_GET['edit_p_cat']))
{
    include('includes/config.php');

   $edit_p_cat_id = $_GET['edit_p_cat'];

   $edit_p_query = "SELECT * FROM categories WHERE prod_cat_id='$edit_p_cat_id'";

   $run_edit = mysqli_query($conn,$edit_p_query);

   $row_edit = mysqli_fetch_array($run_edit);

   $p_cat_id = $row_edit['prod_cat_id'];
   $category = $row_edit['category'];
   $image = $row_edit['image'];


}

if(isset($_POST['update']))
{
   include('includes/config.php');
   $category = $_POST['category'];
   $image = $_POST['image'];

   $update_p_cat = "UPDATE categories SET category='$category',image='$image' WHERE prod_cat_id='$p_cat_id'";
   $run_p_cat = mysqli_query($conn,$update_p_cat);

   if($run_p_cat)
   {
      echo "<script>alert('Your Category Has Been update')</script>";
   
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

                  <input type="submit" name="upload" value="Update" class="btn btn button">
                  <a href="dashboard.php" class="btn btn-default">Back</a>
               </form>
            </div>

            <div class="col-md-3 col-sm-12"></div>
   </div>
</div>