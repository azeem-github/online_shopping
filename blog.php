<?php include('header.php');?>
<?php include('config.php');?>

<style>
.nec{
text-align:center;
margin-bottom: 50px;
}
.box{
   margin-left:10px;
}
.buttonadd{
   background-color: indigo;
   color:white;
}
.btn:hover, .btn:focus 
   {
      color: #eae4e4;
      text-decoration: none;
   }

.boxclr{
   background-color: indigo;
   color: white;
}
.get2{
   margin-left:290px;
}
</style>
<div class="container">
   <div class="row boxclr">
      <div class="col-md-12 col-sm-12">        
         <h2 class="nec" style="text-decoration:underline;"><b> Welcome To The Blog Page</b</h2>
      </div>
   </div>
</div>
<br><br>
<?php 
$query1 = "SELECT * FROM post";
$run = mysqli_query($conn,$query1);
while($post=mysqli_fetch_assoc($run))
{
   ?>
   <a href="post.php?id=<?=$post['id']?>" style="text-decoration:none; color:black;">
<div class="container jumbotron">
   <div class="row box">                                  
   <img  data-enlargeable style="cursor: zoom-in" src="admin/images/posts/<?php echo $post['description_b'];?>">         
      <div class="col-md-8">                  
         <h4 style="text-decoration:underline"><?php echo $post['name']?></h4>
         <h5><?php echo $post['description_a']?></h5>
         <p><small class="text-muted">Posted On <?=date('F jS,Y',strtotime($post['created_at']))?></p>      
      </div>                                         
   </div>  
</div> 
</a>
<br>
<?php }
?> 
<?php include('footer.php');?>