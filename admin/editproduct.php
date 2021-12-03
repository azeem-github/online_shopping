<?php 
   include('includes/header.php');
   if(isset($_SESSION['email']) && $_SESSION['email'] != '') 
   {
      
   } else
   {
      header('Location: index.php');
   }
   include('includes/sidebar.php');?>
   <style>
   .boxing{
      margin-top: 50px;
      padding:  10px;
   /*	border: 1px solid black;
      border-left*/
   }
   .jumbotron{
      width:50%;
      height:80%;
      margin-left: 270px;
      margin-top: 20px;
   }
   .button{
        background-color:#17a2b8;
       color:white;
     
   }
   </style>
<?php
//trial code
if(isset($_POST['editid']))
{
   include('includes/config.php'); 
   $id = $_POST['edit_id'];

   $query = "SELECT * FROM products WHERE id='$id'";
   $query_run = mysqli_query($conn,$query);

   foreach($query_run as $row)
   {

      ?>
      <div class="conatiner">
      <div class="row jumbotron">
         <div class="col-md-3 col-sm-12"></div>
         <div class="col-md-4 col-sm-12">
            <form action="" method="post" enctype="multipart/form-data">
               <span class="h3" style="text-decoration:underline;"><b>Edit Product</b></span>
               <br><br>         
               <input type="hidden" name="edit_id" value="<?php echo $row['id'];?>">
               <div class="form-group">
                  <label style="text-decoration:underline">Description: </label>
                  <textarea type="text" name="short_description" rows="9" cols="19" ><?php echo $row['short_description'];?></textarea>
               </div>
               <div class="form-group">
                  <label style="text-decoration:underline">Price : </label>
                  <input type="text" class="form-control" name="mrp" value="<?php echo $row['mrp'];?>">   
               </div>  
               <div class="form-group">
                  <label style="text-decoration:underline">Add Image: </label>
                  <input type="file" name="image">
                  <br>
                  <img  data-enlargeable style="cursor: zoom-in" src="images/upload/<?php echo $row['image'];?>"width="70px" height="70px;">
               </div>   
               <input type="submit" name="submit" value="Update" class="btn btn button">
               <a href="viewproducts.php" class="btn btn-default">Back</a>
            </form>
         </div>

         <div class="col-md-3 col-sm-12"></div>
      </div>
      </div>
         <?php
   }
}
?>
<?php
if(isset($_POST['submit']))
{
   include('includes/config.php'); 
   $edit_id = $_POST['edit_id'];
   $short_description = $_POST['short_description'];
   $mrp = $_POST['mrp'];

   $image = $_FILES["image"]["name"];

   $faculty_query = "SELECT * FROM products WHERE id='$edit_id'";
   $product_run = mysqli_query($conn, $faculty_query);
   foreach($product_run as $prod_row)
   {
      // echo $prod_row['image'];
      if($image == NULL)
      {
         //update with existing image
         $image_data = $prod_row['image'];
      }
      else
      {
         //Update With New Image And Delete with old image
         if($img_path = "images/upload/".$prod_row['image'])
         {
            unlink($img_path);
            $image_data = $image;
         }
      }
   }

   $query = "UPDATE products SET short_description='$short_description',mrp='$mrp',image='$image_data' WHERE id='$edit_id'";
   $query_run = mysqli_query($conn,$query);

   if($query_run)
   {
      if($image == NULL)
      {
         //update with existing image
         echo "<script>alert('Product Has Been Updated with existing image')</script>";
      echo "<script>window.open('viewproducts.php','_self')</script>";
     
      }
      else
      {
         //Update With New Image And Delete with old image
         move_uploaded_file($_FILES["image"]['tmp_name'], "images/upload/".$_FILES["image"]["name"]);
         // $_SESSION['success'] == "Added Successfully";
         echo "<script>alert('Product Has Been Updated')</script>";
         echo "<script>window.open('viewproducts.php','_self')</script>";
      }
   }else{
      $_SESSION['success'] = "not updated" ;
      header("Location : editproduct.php");
  }
 }


?>
   <?php
      // include('includes/config.php'); 
      // $id = $_GET['editid'];
      // $sql = "SELECT * FROM products WHERE id=$id";
      // $result = mysqli_query($conn,$sql);
      // $data = mysqli_fetch_assoc($result);
      // $productname = $data['product_name'];
      // $description = $data['description'];
      // $price = $data['price'];
      // $image = $data['image'];

      // if(isset($_POST['submit']))
      // {
      //    $productname = $_POST['product_name'];
      //    $description = $_POST['description'];
      //    $price = $_POST['price'];

      //    //image update trial
      //    $image = $_FILES['image']['name'];

      //    //temporary name of file
      //    $tmp_name = $_FILES['image']['tmp_name'];

      //    //uploaded file name
      //    move_uploaded_file($tmp_name,"images/upload/$image");
       
      //    // $sql = "UPDATE products SET id=$id,image='$image_name' WHERE id=$id";
      //    $sql = "UPDATE products SET id=$id,product_name='$productname',description='$description',price='$price',image='$image' WHERE id=$id";
      //    $result = mysqli_query($conn,$sql);
      //    if($result){
      //       echo "<script>alert('Product Has Been Updated successfully')</script>";
      //       echo "<script>window.open('viewproducts.php','_self')</script>";
      //    } 
      //    else
      //    {
      //       echo "couldn't update";
      //    }
      // }
?>
  

<?php include('includes/footer.php');?>