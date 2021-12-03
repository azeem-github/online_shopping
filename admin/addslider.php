<?php include('includes/header.php');
  if(isset($_SESSION['email']) && $_SESSION['email'] != '') 
  {
     
  } else
  {
     header('Location: index.php');
  }
include('includes/sidebar.php');?>
<?php
include('includes/config.php');

if(isset($_POST['upload']))
{

   $image_name  = $_FILES["image"]["name"];
   $sql3 = "INSERT INTO slider(image)VALUES('$image_name')";
   $add = mysqli_query($conn, $sql3);
   if($add)
   {
       if(move_uploaded_file($_FILES["image"]['tmp_name'], "images/slider/".$_FILES["image"]["name"]))
      {
           $_SESSION['success'] == "Added Successfully";
           echo "<script>alert('Slides Have Been Added')</script>";
           echo "<script>window.open('viewslides.php','_self')</script>";

      }
      else
      {
          echo "not comming";
      }
   }
   else
   {
       $_SESSION['success'] = " not added " ;
       header("Location : addslider.php");
   }

}

?>
<style>
.cont{
   margin-top: 80px;
}
</style>

<div class="container cont">
   <div class="row">
      <div class="col-md-3 col-sm-12"></div>
      <div class="col-md-6 col-sm-12">
         <h3>Add Sliders</h3>
         <form action="" method="post" enctype="multipart/form-data">
            <div class="jumbotron">
               <label> Slider </label>
               <input type="file" name="image">
               <br>         
               <button type="submit" name="upload" class="btn btn-primary">Upload Sliders</button>
            </div>
         </form>
      </div>
      <div class="col-md-1 col-sm-12"></div>
      <div class="col-md-2 col-sm-12"></div>
   </div>
</div>
<?php include('includes/footer.php');?>