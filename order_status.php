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
    
    .navbar{
     background-image: url(img/p.jpg);
     background-repeat:no-repeat;
     background-size:100%;
    }
      
  td{
    background-color:white;
  }
  th{
    background-color:maroon;
    color:white;
  }
    </style>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   
  </head>

  <?php
if(isset($_GET['accept'])){
  $OID=$_GET['accept'];
 
  
 $connection=mysqli_connect('localhost','root','','diet');
 $sql="update orders SET status='accepted' where OID='$OID';";

 $result=mysqli_query($connection,$sql);
 if($result){

  header("location:manage_orders.php");
    
     }
}
?>
<?php
if(isset($_GET['reject'])){
  $OID=$_GET['reject'];
 
  
 $connection=mysqli_connect('localhost','root','','diet');
 $sql="update orders SET status='rejected' where OID='$OID';";

 $result=mysqli_query($connection,$sql);
 if($result){

header("location:manage_orders.php");
  
   }
}

?>

<!-- NAVBAR
================================================== -->
  <body  >
	
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
 <span style="background-image: url(img/baC.jpg)">
      <br><br>
	<!-- Hero section -->

  <table class="table">
    <tr>
    <th>
Order ID
</th>
<th>
Diet PLan Id
</th>
<th>
Name
</th>
<th>
Price
</th>
<th>
Order Date
</th>
<th>
Order Status
</th>
<th>
Nutritionist
</th>
<th>
View Feedback
</th>
<th>
View Rating
</th>

</tr>
<?php
$conn=mysqli_connect('localhost','root','','diet');
$sql="select * from orders where UID='$uid'";

$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num>0){
  while($row=mysqli_fetch_assoc($result)){
    $OID=$row['OID'];
    $DID=$row['DID'];
    $NID=$row['NID'];
    $price=$row['Price'];
    $date=$row['date'];
  
    $status=$row['status'];
   
    



 
?>
 <?php 
 $dq="select * from diet_plan where DID='$DID';";

$res=mysqli_query($conn,$dq);
$r=mysqli_fetch_assoc($res);
@$Name=$r['Diet_name'];


?>
 <?php 
 $user="select * from user where UID='$NID';";

$resa=mysqli_query($conn,$user);
$rc=mysqli_fetch_assoc($resa);
@$Nname=$rc['name'];

?>
 <?php 
 $ratingq="select * from rating where UID='$uid' and DID=$DID;";

$ress=mysqli_query($conn,$ratingq);
$rcs=mysqli_fetch_assoc($ress);
@$RID=$rcs['RID'];
@$rating=$rcs['rating'];

?>
<?php
echo "<tr>";
 echo "<td> $OID </td>"; 
 echo "<td> $DID </td>"; 
 echo "<td> $Name </td>"; 
 echo "<td> $price </td>"; 

  echo "<td> $date </td>"; 
  echo "<td> $status </td>"; 
  echo "<td> $Nname </td>"; 
echo "<td><a href='add_feedback.php?DID=$DID&&NID=$NID' class='btn btn-info' >Give Feedback</a></td>"; 
IF($RID==0){echo "<td><a href='add_rating.php?DID=$DID&&NID=$NID' class='btn btn-danger'>Give Rating</a></td>"; 
}
IF($RID!==0){echo "<td> $rating </td>"; }
echo "</tr>";
}
}
?>
</table>
	<!-- Hero section end -->
</body>
</html>
