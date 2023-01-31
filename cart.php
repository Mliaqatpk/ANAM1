<?php ob_start();
 session_start();
$uid=$_SESSION['UID'];
if($_SESSION['type']!='user'){
    header('location: Logout.php');
}

     ?>

 <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Online Diet Plan Finder</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
    
       
      
  td{
    background-color:white;
  }
  th{
    background-color:purple;
    color:white;
  }
  .navbar{
     background-image: url(img/p.jpg);
     background-repeat:no-repeat;
     background-size:100%;
    }  
    </style>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   
  </head>
 
  <div class="navbar" >
     <header><b><a href="user.php"> <h1 style="text-shadow: 2px 2px blue;color:white" ><img src="img/logo1.png" width="70px" height="70px"> Online Diet Plan Finder</h1></a></header> 
</b>
    

                     <ul class="nav nav-pills navbar-right">
                 
                                 
                     <li><a style="border-radius:10px"  class="btn btn-default" href="user.php" >Home</a></li>
                                                      <li><a style="border-radius:10px" class="btn btn-default" href="update_user.php" >Update Profile</a></li>
                                                      <li><a style="border-radius:10px" class="btn btn-default" href="user_messages.php" >Send Messages</a></li>
													  <li><a style="border-radius:10px" class="btn btn-default" href="order_status.php" >View My Orders</a></li> 
													  
                                                      <li><a style="border-radius:10px"  class="btn btn-default" href="search.php" >Search Diet Plan</a></li>
                                                     
<?php
$items=0;
if(isset($_SESSION['items'])){
$items=$_SESSION['items'];}


?> 
<li><a href='cart.php' style="border-radius:10px" class="btn btn-default">Add to Cart <sup style='color:red'> <?=@$items?> </sup></a></li>
                                                    <li><a href="logout.php"  class="btn btn-default" style="border-radius:10px" >Logout</a></li>
                                  
                           
                            </ul>
        </div>
        <table class="table">
        <tr>
            <th>Name</th>
        <th>Price</th>
    
        <th>Delete</th>
        </tr>
 <?php if(isset($_GET['del'])){
        $did = $_GET['del'];
$_SESSION['items']-=$_SESSION['Products'][$did];
        unset($_SESSION['Products'][$did]);
 
    header('location: cart.php');
    }?>
    
    <?php if(isset($_SESSION['Products'])){
        $total_price=0;
        ?>
    
        

        <?php
     foreach ($_SESSION['Products'] as $did => $quantity) {
      echo"<tr>";
      $db=mysqli_connect('localhost','root','','diet');
         $query="select * from diet_plan where DID='$did'";
   
         $result = mysqli_query($db,$query);
        $row = mysqli_fetch_assoc($result);
        $name=$row['Diet_name'];
        $price=$row['price'];
        $did=$row['DID'];
        $nid=$row['UID'];
        

        $total_product_price=$price * $quantity;
        $total_price+=$total_product_price;
        echo"<td>$name</td>";
        echo"<td>$price</td>";
       
      
      
        echo"<td><a href='cart.php?del=$did'>Delete</a></td>";
     echo"</tr>";
        
         
     }
     $_SESSION['price']=$price;
}?>
            </table>
</div>
    <div class="col-md-3">
      
            <h4 >Total Price</h4>
        <h5><?php echo @$price?></h5>
        <a href="checkout.php?did=<?php echo @$did ?>&&price=<?php echo @$price ?>&&nid=<?php echo @$nid ?>" class="btn btn-warning">Checkout</a>
        
 
    </div>
  
   




    
        