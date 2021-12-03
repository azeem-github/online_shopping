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
      include('includes/config.php'); 
      $id = $_GET['editid'];
      $sql = "SELECT * FROM post WHERE id=$id";
      $result = mysqli_query($conn,$sql);
      $data = mysqli_fetch_assoc($result);
      $name = $data['name'];
      $description_a = $data['description_a'];
      $image = $data['description_b'];

      if(isset($_POST['submit']))
      {
         $name = $_POST['name'];
         $description_a = $_POST['description_a'];

         //image update trial
         $image = $_FILES['description_b']['name'];

         //temporary name of file
         $tmp_name = $_FILES['description_b']['tmp_name'];

         //uploaded file name
         move_uploaded_file($tmp_name,"images/posts/$image");
       
         // $sql = "UPDATE products SET id=$id,image='$image_name' WHERE id=$id";
         $sql = "UPDATE post SET id=$id,name='$name',description_a='$description_a',description_b='$image' WHERE id=$id";
         $result = mysqli_query($conn,$sql);
         if($result){
            echo "<script>alert('Post Has Been Updated successfully')</script>";
            echo "<script>window.open('viewpost.php','_self')</script>";
         } 
         else
         {
            echo "couldn't update";
         }
      }
?>
  
<div class="conatiner">
   <div class="row jumbotron">
      <div class="col-md-3 col-sm-12"></div>
      <div class="col-md-4 col-sm-12">
         <form action="" method="post" enctype="multipart/form-data">
            <span class="h3" style="text-decoration:underline;"><b>Edit Post</b></span>
            <br><br>         
            <div class="form-group">
               <label style="text-decoration:underline">Name : </label>
               <input type="text" class="form-control" name="name" value="<?php echo $name;?>" >   
            </div>  
            <div class="form-group">
               <label style="text-decoration:underline">Description: </label>
               <textarea type="text" name="description_a" rows="6" cols="19" ><?php echo $description_a;?></textarea>
            </div>
            <div class="form-group">
               <label style="text-decoration:underline">Add Image: </label>
               <input type="file" name="description_b">
               <br>
               <img  data-enlargeable style="cursor: zoom-in" src="images/posts/<?php echo $image;?>"width="70px" height="70px;">
            </div>   
            <input type="submit" name="submit" value="Update" class="btn btn button">
            <a href="viewpost.php" class="btn btn-default">Back</a>
         </form>
      </div>

      <div class="col-md-3 col-sm-12"></div>
   </div>
</div>

<?php include('includes/footer.php');?>