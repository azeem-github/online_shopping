<div class="wrapper">
    <!-- Sidebar Holder -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3><a href="dashboard.php">Admin Panel</h3>
        </div>
        <?php
            $emailsession = $_SESSION['email'];
            $email = $_GET['email'];
        ?>
        <h4 style="margin-left:10px;">Welcome <?php
        echo $emailsession; ?></h4>
        <ul class="list-unstyled">
            <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false"><i class="glyphicon ion-android-people"></i> <b>Users</b></a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li><a href="addusers.php">Add Users</a></li>                   
                    <li><a href="viewusers.php">View Users</a></li>
                </ul>
            </li>      
            <li>
                <div class="dropdown">
                    <a href="#dropdownMenu" data-toggle="collapse" aria-expanded="false">
                        <i class="glyphicon glyphicon-edit"></i> 
                        <b>Products</b>
                    </a>
                    <ul class="collapse list-unstyled" id="dropdownMenu">
                        <li><a href="insert_product.php">Add Product</a></li>
                        <li><a href="viewproducts.php">View Products</a></li>
                     </ul>
                </div>
            </li>
            <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false"> <i class="glyphicon glyphicon-th-list"></i> <b>Categories</a></b>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li><a href="addcat.php">Add Category</a></li>                
                    <li><a href="viewcategories.php">View Category</a></li>
                </ul>
            </li>  
                   <li>
                <a href="#downsub" data-toggle="collapse" aria-expanded="false"> <i class="glyphicon glyphicon-tags"></i> <b>Tags</a></b>
                <ul class="collapse list-unstyled" id="downsub">
                    <li><a href="addcat.php">Add Tag</a></li>                
                    <li><a href="viewcategories.php">View Tags</a></li>
                </ul>
            </li>     
            <li>
                <a href="#jack" data-toggle="collapse" aria-expanded="false"> <i class="glyphicon glyphicon-plus"></i> <b>Post</a></b>
                <ul class="collapse list-unstyled" id="jack">
                    <li><a href="addpost.php">Add Post</a></li>                
                    <li><a href="viewpost.php">View Post</a></li>
                </ul>
            </li>     
            <li>
                <a href="#crack" data-toggle="collapse" aria-expanded="false"> <i class="glyphicon ion-play"></i> <b>Caraousel</a></b>
                <ul class="collapse list-unstyled" id="crack">
                    <li><a href="addslider.php">Add slide</a></li>                
                    <li><a href="viewslides.php">View slide</a></li>
                </ul>
            </li>         
            <li>
            <a href="logout.php"> <i class="icon ion-unlocked"></i> <b>Logout</a></b>
            </li>
        </ul>                
    </nav>