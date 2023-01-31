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
    background-color:maroon;
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
        <CENTER>
        <h3 > Checkout </h3>
    <form method="post"   style="width:400px">
       
       
          
         Enter Credit Card no <input type="number" name="ano" class="form-control" placeholder="Enter your credit card no " ><br>
        Enter Pin Code  <input type="number" name="pin" class="form-control" placeholder="pin Code " ><br>
     
        Total Price<input type="text" class="form-control" readonly value="<?=@$_GET['price']?>" ><br>

     <input type="submit" class="btn-success" name="confirm" value="Confirm-Order"><hr>
         
    </form>
               

      
    <?php 
        if(isset($_POST['confirm'])){
       $ano=$_POST['ano'];
       
        $pin=$_POST['pin'];
         
 $DID= $_GET['did'];
 $nid= $_GET['nid'];
 $UID= $_SESSION['UID'];
     $totalprice=$_GET['price'];
  
     $db=mysqli_connect('localhost','root','','diet');
 $order="INSERT INTO orders( DID,UID,Price,date, accountno, pin,status,NID) VALUES ('$DID','$UID','$totalprice',now(),'$ano','$pin','pending','$nid');";

         $r = mysqli_query($db,$order);
         
         $oid=mysqli_insert_id($db);
     
    if($r){
     echo "Successfully placed order your tracking no is . $oid Go to Check Order Status <a href='order_status.php'>Order Status</a>";
       
    
    
}
 
 
 }
        ?>

   
<div class="clearfix"></div>
</div>





    
        