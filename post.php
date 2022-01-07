<?php include('header.php');?>
<?php include('config.php');?>


<style>
.boxx{
   border-radius: 1px solid;
}
</style>
<?php 
$post_id=$_GET['id'];
$query1 = "SELECT * FROM post WHERE id='$post_id'";
$run = mysqli_query($conn,$query1);
$post=mysqli_fetch_assoc($run);
?>
<div class="container boxx">
   <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-2"></div>
      <div class="col-md-6">
         <img  data-enlargeable style="cursor: zoom-in" src="admin/images/posts/<?php echo $post['description_b'];?>">    
      </div>     
      <div class="col-md-8">                  
         <h4 style="text-decoration:underline"><?php echo $post['name']?></h4>
         <h5><?php echo $post['description_a']?></h5>
         <p><small class="text-muted">Posted On <?=date('F jS,Y',strtotime($post['created_at']))?></p>      
      </div>
   </div>
</div>
<?php include('footer.php');?>