<?php include('includes/header.php');  if(isset($_SESSION['email']) && $_SESSION['email'] != '') 
   {
      
   } else
   {
      header('Location: index.php');
   }
   ?>

<?php include('includes/sidebar.php');?>

<div class="container ">
   <div class="row">  
      <div class="col-md-3 col-sm-12"></div>
         <div class="col-md-6 col-sm-12">
            <h3>View Sliders</h3>
            <div class="table table-bordered">
               <table class="table table-hover table-striped table-bordered" id="dashdocumentlist">   
                  <thead>
                     <tr>                                   
                        <th>Id</th>                                    
                        <th>Slider</th>                       
                        <th>Action</th>
                     </tr>
                  </thead>  
                  <tbody>
                  <?php
                     include('includes/config.php');
                     if(isset($_GET['delete']))
                     {
                        $deleteid = $_GET['delete'];
                        
                        $delete = "DELETE FROM slider WHERE id='$deleteid'";
                        
                        $run_delete = mysqli_query($conn,$delete);
                        
                        if($run_delete)
                        {
                           echo "<script>alert('slider deleted')</script>";
                        }
                     }
                     
                     $i=0;
                     $get = "SELECT * FROM slider";
                     
                     $run = mysqli_query($conn, $get);
                     
                     while($row=mysqli_fetch_array($run))
                        {
                           $id = $row['id'];
                           $image = $row['image'];

                           $i++;                       
                        ?>
                        <tr>                  
                           <td><?php echo $i; ?>.</td>         
                           <td><img src="images/slider/<?php echo $image; ?>" style="height:70px; width:120px;"></td>                                                                                              
                           <td>
                              <a href="editslider.php?editid=<?php echo $id; ?>"class="btn btn-warning"><span class="glyphicon"aria-hidden="true"></span> Edit</a> 
                              <a href="addsliders.php?delete=<?php echo $id; ?>" class="btn btn-danger">  <span class="glyphicon"aria-hidden="true"></span>  Delete</a>
                           </td>
                        </tr>
                        <?php } ?>
                  </tbody>
               </table>
         </div>
   </div>
</div>
<?php include('includes/footer.php');?>