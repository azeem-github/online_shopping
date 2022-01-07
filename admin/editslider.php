<?php 
   include('includes/header.php');
   if(isset($_SESSION['email']) && $_SESSION['email'] != '') 
   {
      
   } else
   {
      header('Location: index.php');
   }
   include('includes/sidebar.php');
   
   include('includes/config.php'); 
      $id = $_GET['editid'];
      $sql = "SELECT * FROM slider WHERE id=$id";
      $result = mysqli_query($conn,$sql);
      $data = mysqli_fetch_assoc($result);
      $image = $data['image'];
      
      if(isset($_POST['submit'])){
         
         //image update trial
         $image_name = $_FILES['image']['name'];

         //temporary name of file
         $tmp_name = $_FILES['image']['name'];

         //uploaded file name
         move_uploaded_file($tmp_name,"images/slider/$image");
         
         $sql = "UPDATE slider SET id=$id,image='$image_name' WHERE id=$id";
         $result = mysqli_query($conn,$sql);
         if($result){
            echo "<script>alert('Has Been Updated successfully')</script>";
            echo "<script>window.open('addslider.php','_self')</script>";
         } else{
            echo "couldn't update";
         }
      }

?>

<!-- Page Content Holder -->
<div id="content">
    <!-- <nav class="navbar navbar-default"> -->
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                <i class="glyphicon glyphicon-align-left"></i>
                <!-- <span>Toggle Sidebar</span> -->
            </button>
        </div>
    </div>  
<div class="conatiner">
   <div class="row">
      <div class="col-md-3 col-sm-12"></div>
      <div class="col-md-4 col-sm-12">
         <form action="" method="post" enctype="multipart/form-data">
            <span class="h3" style="text-decoration:underline;"><b>Edit Sliders</b></span>
            <br><br>                       
            <div class="form-group">
               <label style="text-decoration:underline">Add Image: </label>               
               <input type="file" name="image" class="form-control">
               <br>
                <img src="images/slider/<?php echo $image;?>"width="80px" height="70px;">
            </div>   
            <input type="submit" name="submit" value="Update" class="btn btn button">
            <a href="addslider.php" class="btn btn-default">Back</a>
         </form>
      </div>

      <div class="col-md-3 col-sm-12"></div>
   </div>
</div>

<?php include('includes/footer.php');?>