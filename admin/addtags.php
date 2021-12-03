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
	margin-top: 40px;
	padding:  10px;
/*	border: 1px solid black;
	border-left*/
}
.jumbotron{
   width:40%;
   height:100%;
   margin-left: 270px;
   margin-top: 20px;
}
.button{
  	background-color:#17a2b8;
    color:white;
  
}
.btn{
   margin-top: 30px;
}
</style>

<?php 
if(isset($_POST['submit'])){
   include('includes/config.php');
    $taga = $_POST['tags_a'];
    $tagb = $_POST['tag_b'];
    $tagc = $_POST['tag_c'];

    $sql3 = "INSERT INTO tags(tags_a,tag_b,tag_c)VALUES('$taga','$tagb','$tagc')";
    $add = mysqli_query($conn, $sql3);

    if($add){
            $_SESSION['success'] == "Added Successfully";
            echo "<script>alert('Tag Has Been Added')</script>";
            echo "<script>window.open('viewtags.php','_self')</script>";

        }else{
           echo "Wasn't inserted";exit;
        }
}
?>
<div class="row">
   <div class="col-md-3 col-sm-12"></div>
   <div class="col-md-3 col-sm-12"></div>
   <div class="col-md-6 col-sm-12">
      <a href="viewtags.php" class="btn btn-primary btn">View Tags</a>
   </div>

</div>
<div class="conatiner">
   <div class="row jumbotron">
         <div class="col-md-3 col-sm-12"></div>
         <div class="col-md-4 col-sm-12">
            <form action="" method="post">
                  <span class="h3" style="text-decoration:underline;"><b>Add Tags</b></span>
                  <br><br>                   
                  <div class="form-group">
                     <label style="text-decoration:underline">Tag 1: </label>
                     <input type="text" name="tags_a" placeholder="Field 1" required>   
                  </div>
                  <div class="form-group">
                     <label style="text-decoration:underline">Tag 2: </label>
                     <input type="text" name="tag_b" placeholder="Field 2" required>   
                  </div>
                  <div class="form-group">
                     <label style="text-decoration:underline">Tag 3: </label>
                     <input type="text" name="tag_c" placeholder="Field 3" required>   
                  </div>
                  <input type="submit" name="submit" value="Submit" class="btn btn button">
                  <a href="viewtags.php" class="btn btn-default">Back</a>
            </form>
         </div>
         <div class="col-md-3 col-sm-12"></div>
   </div>
</div>


<?php include('includes/footer.php');?>