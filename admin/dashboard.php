<?php 
include('includes/header.php');
include('includes/sidebar.php'); ?>
<title>Dashboard</title>
<?php
if(isset($_SESSION['email']) && $_SESSION['email'] != '') 
{

?>        
<style>
    .small-box{        
        background-color: #17a2b8 !important;
        border-radius: .25rem;
        box-shadow: 0 0 1px rgba(0,0,0,.125),0 1px 3px rgba(0,0,0,.2);
        display: block;
        margin-top:30px;
        margin-bottom: 20px;
        position: relative;   
    }
    .small-box>a:hover{
        background-color: #167786;
    }
    .bg-success {
    background-color: #28a745 !important;
    }
    .bg-success>a:hover{
        background-color:#247336
    }
    .bg-waring{
        background-color: #FFA500 !important;
    }
    .bg-waring>a:hover{
        background-color:#C1871D;        
    }
    .bg-klose{
        background-color: #A020F0 !important;
    }
    .bg-klose>a:hover{
        background-color:#431460;
        }
    p {
    font-family: 'Poppins', sans-serif;
    font-size: 1.1em;
    font-weight: 300;
    line-height: 1.7em;
    color: #fff !important;
}
    .small-box > .small-box-footer {
    background-color: rgba(0,0,0,.1);
    color: rgba(255,255,255,.8);
    display: block;
    padding: 8px 0;
    position: relative;
    text-align: center;
    text-decoration: none;
    z-index: 10;
}
.button{
    background-color: dodgerblue;
}
.small-box > .inner {
    padding: 10px;
}
.inner{
    color: #fff !important;
}
.row {
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -7.5px;
    margin-left: -7.5px;
}
.glyphicon-search, button{
    background-color: white;
}
/* .small-box .icon {
    color: rgba(0,0,0,.15);
    z-index: 0;
} */
.ion-pricetags {
    font-size: 70px;
    padding-left: 277px;
}
.ion-person-add {
    font-size: 70px;
    padding-left: 277px;
}
.ion-filing {
    font-size: 70px;
    padding-left: 277px;
}
.ion-bag {
    font-size: 70px;
    padding-left: 277px;
}
    </style>
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
    <!-- write Body Section -->
    <div class="container">
        <div class="row blast">
            <div class="col-md-11 col-sm-12">
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input type="text" placeholder="Search.." name="search2">
                        <!-- <input type="text" placeholder="Search.." name="search2"> -->
                        <button type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    <div class="input-group-append">           
                    </div>
                    </div>
                </form>
        </div>
      </li>
            </div>
        </div>
        <div class="row">        
            <div class="col-md-5 col-sm-12">
                <!-- small box -->
                <div class="small-box">
                    <div class="inner">
                        <?php 

                            $conn = mysqli_connect('localhost','root','','users_admin');

                            $query = "SELECT id FROM products  ORDER BY id";
                            $query_run = mysqli_query($conn,$query);

                            $row = mysqli_num_rows($query_run);

                            echo "<h3> $row </h3>";

                        ?>
                        <i class="ion ion-filing"></i>
                        <p>Products</p>                
                    </div>
                <a href="#" class="small-box-footer">More info  <i class="icon ion-arrow-right-a"></i></a>
                </div>
            </div>
            <!-- <div class="col-md-3 col-sm-12"></div> -->
            <div class="col-md-5 col-sm-12">
                <!-- small box -->
                <div class="small-box bg-success ">
                    <div class="inner">
                        <?php 

                            $conn = mysqli_connect('localhost','root','','users_admin');

                            $query = "SELECT id FROM categories  ORDER BY id";
                            $query_run = mysqli_query($conn,$query);
                       
                            echo "<h3> $row </h3>";

                        ?>
                        <i class="ion ion-pricetags"></i> 
                        <p>Categories</p>                         
                    </div>
                    <!-- <div class="icon"> -->
                    <!-- </div>  -->
                        <a href="#" class="small-box-footer">More info <i class="icon ion-arrow-right-a"></i></a>
                </div>
            </div>
                <!-- <div class="col-md-3 col-sm-12"></div> -->

                 <div class="row">        
            <div class="col-md-5 col-sm-12">
                
                <div class="small-box bg-klose">
                    <div class="inner">
                        <?php 

                            $conn = mysqli_connect('localhost','root','','users_admin');

                            $query = "SELECT id FROM order_manager  ORDER BY id";
                            $query_run = mysqli_query($conn,$query);

                            $row = mysqli_num_rows($query_run);

                            echo "<h3> $row </h3>";

                        ?>
                        <i class="ion ion-bag"></i>
                        <p>Orders</p>                
                    </div>
                <a href="#" class="small-box-footer">More info <i class="icon ion-arrow-right-a"></i></a>
                </div>
            </div> 
            <div class="col-md-5 col-sm-12">
                <!-- small box -->
                <div class="small-box bg-waring">
                    <div class="inner">
                            <?php 

                                $conn = mysqli_connect('localhost','root','','users_admin');
                                $query = "SELECT id FROM user  ORDER BY id";
                                $query_run = mysqli_query($conn,$query);
                                $row = mysqli_num_rows($query_run);
                                echo "<h3> $row </h3>";

                            ?>                    
                        <i class="ion ion-person-add"></i>
                        <p>Users</p>                
                    </div>
                <a href="#" class="small-box-footer">More info <i class="icon ion-arrow-right-a"></i></a>

                
                </div>
            </div>
            <!-- <div class="col-md-3 col-sm-12"></div> -->            
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                           <h3 style="text-decoration:underline;"><b>New Orders :</h3></b>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-10 col-sm-12">
                                    <div class="table table-bordered">  
                                        <table class="table table-striped table-bordered" id="dashdocumentlist">   
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center;">No</th>
                                                    <th style="text-align:center;">Full Name</th>
                                                    <th style="text-align:center;">Phone No</th>
                                                    <th style="text-align:center;">Address</th>
                                                    <th style="text-align:center;">Mode Of Payment</th>                                                 
                                                </tr>
                                            </thead>  
                                            <tbody>
                                            <?php 
                     $sql = "SELECT * FROM order_manager";
                     $result = mysqli_query($conn,$sql);
                     if($result){
                           $counter = $i++;
                          while($data = mysqli_fetch_assoc($result)){
                             $id = $data['id'];
                             $full_name = $data['full_name'];
                             $phone_no  = $data['phone_no'];
                             $address   = $data['address'];
                             $pay_mode  = $data['pay_mode'];
                             

                     ?>
                     <tr>    
                           <td><?php echo $i++;?>.</td>                               
                           <td style="text-align:center;"><?php echo $data['full_name'];?></td>    
                           <td style="text-align:center;"><?php echo $data['phone_no'];?></td>                    
                           <td style="text-align:center;">
                              <?php echo $data['address'];?>
                           </td>
                        <td style="text-align:center;">                  
                           <?php echo $data['pay_mode']; ?></td>                           
                     </tr>            
                     <?php } }?>
<?php
                            //side table ?>
                     <div class="table table-bordered">  
                                        <table class="table table-striped table-bordered" id="dashdocumentlist">   
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center;">No</th>                                           
                                                    <th style="text-align:center;">Item Name</th>
                                                    <th style="text-align:center;">Price</th>
                                                    <th style="text-align:center;">Quantity</th>                                                 
                                                </tr>
                                            </thead>  
                                            <tbody>
                                            <?php 
                     $sql = "SELECT * FROM user_orders";
                     $result = mysqli_query($conn,$sql);
                     if($result){
                           $counter = $i++;
                          while($data = mysqli_fetch_assoc($result)){
                             $id = $data['id'];                             
                             $item_name  = $data['item_name'];
                             $price   = $data['price'];
                             $quantity  = $data['quantity'];
                     ?>
                     <tr>    
                           <td><?php echo $i++;?>.</td>                               
                           <td style="text-align:center;"><?php echo $data['item_name'];?></td>    
                           <td style="text-align:center;"><?php echo $data['price'];?></td>                    
                           <td style="text-align:center;">
                              <?php echo $data['quantity'];?>
                           </td>                                            
                     </tr>            
                     <?php } } ?>
                                            </tbody>
                                        </table>                        
                                    </div>
                                </div>
                            </div>
                        </div>  
                        <div class="col-md-6 col-sm-12"></div>
                        
                    </div>
                </div>                
        </div>
    </div>
</div>        
<?php } 
?>

<?php include('includes/footer.php');?>

        
