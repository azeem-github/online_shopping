<?php session_start();?>
<?php include 'config.php'?>
<?php
// if(isset($_POST['mod_quantity']))
// {
// foreach($_SESSION['cart'] as $key => $value)
// {
//    if($value['id']==$_POST['id'])
//    {
//       $_SESSION['cart'][$key]['qty']=$_POST['mod_quantity'];     
//       echo "<script>
//       window.location.href='cart.php';
//       </scipt>";
//    }
// }
// }


session_start();
mysqli_connect("localhost","root","","users_admin");

if(mysqli_connect_error())
{
   echo"<script>
   alert('cannot conenct to database');
   window.location.href='cart.php';
   </script>";
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
   if(isset($_POST['purchase']))
   {
    $query1 ="INSERT INTO order_manager(`full_name`,`phone_no`, `address`, `pay_mode`) VALUES ('$_POST[full_name]','$_POST[phone_no]','$_POST[address]','$_POST[pay_mode]')";
    if(mysqli_query($conn,$query1))
    {
       $id = mysqli_insert_id($conn);
      $query2= "INSERT INTO user_orders(id,short_description,mrp,quantity)VALUES(?,?,?,?)";
      $stmt=mysqli_prepare($conn,$query2);
      if($stmt)
      {
         mysqli_stmt_bind_param($stmt,"isii",$id,$short_description,$mrp,$quantity);
         foreach($_SESSION['cart'] as $key => $value)
         {
            $order_id = $value['id'];
            $short_description = $value['short_description'];
            $mrp = $value['mrp'];
            $quantity = $value['quantity'];
            mysqli_stmt_execute($stmt);
         }
         unset($_SESSION['cart']);
         echo "<script>
         alert('Order Placed');
         window.location.href='index.php';
         </script>";
      }
      else
      {
         echo "<script>
         alert('SQL query prepared ERROR');
         window.location.href='cart.php';
         </script>";
      }
    }
    else{
       echo "<script>
       alert('SQL ERROR');
       window.location.href='cart.php';
       </script>";
       
    }
   }
}
?>