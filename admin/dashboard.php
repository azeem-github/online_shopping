<?php 
include('includes/header.php');

if(isset($_SESSION['email']) && $_SESSION['email'] != '') 
{

} else{
    header('Location: login.php');
}
include('includes/sidebar.php');
?>        

<div class="container">
    <div class="row">
        <div class="col-md-5 col-sm-12"></div>
        <div class="col-md-5 col-sm-12">
            <h3 style="text-align:center; text-decoration:underline;">Dashboard</h3>
        </div>
        <div class="col-md-2 col-sm-12">
            <div class="card-body">

            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php');?>

        
