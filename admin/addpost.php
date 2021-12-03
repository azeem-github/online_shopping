<?php include('includes/header.php');
if(isset($_SESSION['email']) && $_SESSION['email'] != '') 
{
   
} else{
   header('Location: login.php');
}
include('includes/sidebar.php');
?> 
<style>
.button{
    background-color:#17a2b8;
    color:white;
}
</style>
<?php 
if(isset($_POST['upload'])){
   include('includes/config.php'); 
    $name = $_POST['name'];
    $description_a = $_POST['description_a'];

    $image_name = $_FILES["description_b"]["name"];

    $sql3 = "INSERT INTO post(name,description_a,description_b)VALUES('$name','$description_a','$image_name')";
    $add = mysqli_query($conn, $sql3);

    if($add){
        
        if(move_uploaded_file($_FILES["description_b"]['tmp_name'], "images/posts/".$_FILES["description_b"]["name"])){
            $_SESSION['success'] == "Added Successfully";
            echo "<script>alert('Post Has Been Added')</script>";
            echo "<script>window.open('viewpost.php','_self')</script>";

        }else{
           echo "not comming";
        }
    }
    else{
        $_SESSION['success'] = " not added " ;
        header("Location : addpost.php");
    }

}
?>
<!-- Page Content Holder -->
<div id="content">

<div class="conatiner">
   <div class="row content jumbotron">
      <div class="col-md-3 col-sm-12"></div>
      <div class="col-md-4 col-sm-12">
         <form action="" method="post" enctype="multipart/form-data">
            <span class="h3" style="text-decoration:underline;"><b>Add Post</b></span>
            <br><br>          
            <div class="form-group">
               <label style="text-decoration:underline">Name : </label>
               <input type="text" name="name">   
            </div>           
            <div class="form-group">
               <label style="text-decoration:underline">Description: </label>
               <textarea rows="6" cols="19" name="description_a" placeholder="Enter description">
               </textarea>
            </div>
             
            <div class="form-group">
               <label style="text-decoration:underline">Add Image: </label>
               <input type="file" name="description_b">
            </div>

            <input type="submit" name="upload" value="Upload File" class="btn btn button">
            <a href="dashboard.php" class="btn btn-default">Back</a>
         </form>
      </div>

      <div class="col-md-3 col-sm-12"></div>
   </div>
</div>

<?php include('includes/footer.php');?>