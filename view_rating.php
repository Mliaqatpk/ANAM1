<?php ob_start();
 session_start();
$uid=$_SESSION['UID'];
if($_SESSION['type']!='nutritionist'){
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
    
        body{
         background-image: url(img/baC.jpg);
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
	
  <div class="navbar" style="background-color: url(img/baC.jpg)"  >
     <header><b><a href="nutritionist.php"> <h1 style="color:white" ><img src="img/logo1.png" width="70px" height="70px"> Online Diet Plan Finder</h1></a></header> 
</b>
    

                     <ul class="nav nav-pills navbar-right">
                 
                                                      <li><a style="color:white" class="btn btn-danger" href="nutritionist.php" >Home</a></li>
                                                      <li><a style="color:white" class="btn btn-danger" href="update_nutritionist.php" >Update Profile</a></li>
                                                      <li><a style="color:white" class="btn btn-danger" href="n_messages.php" >Messages</a></li>
                                                      <li><a style="color:white" class="btn btn-danger" href="n_feedbacks.php" >Feedbacks</a></li>
                                                      <li><a style="color:white" class="btn btn-danger" href="view_ratings.php" >See Ratings</a></li>
                                                        <li><a style="color:white" class="btn btn-danger" href="manage_orders.php" >Manage_Orders</a></li>
                                                    <li><a href="logout.php" style="color:white" class="btn btn-danger" style="color:white" >Logout</a></li>
                                  
                           
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
Accept
</th>
<th>
Reject
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
$sql="select * from orders where NID='$uid'";

$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num>0){
  while($row=mysqli_fetch_assoc($result)){
    $OID=$row['OID'];
    $DID=$row['DID'];
    $price=$row['Price'];
    $date=$row['date'];
  
    $status=$row['status'];
   
    



 
?>
 <?php 
 $user="select * from diet_plan where DID='$DID';";

$res=mysqli_query($conn,$user);
$r=mysqli_fetch_assoc($res);
@$Name=$r['Diet_name'];

?>
<?php
echo "<tr>";
 echo "<td> $OID </td>"; 
 echo "<td> $DID </td>"; 
 echo "<td> $Name </td>"; 
 echo "<td> $price </td>"; 

  echo "<td> $date </td>"; 
  echo "<td> $status </td>"; 
 echo "<td><a href='manage_orders.php?accept=$OID' class='btn btn-success' >Accept</a></td>"; 
  echo "<td><a href='manage_orders.php?reject=$OID' class='btn btn-danger' >Reject</a></td>";  
echo "<td><a href='view_feedback.php?DID=$DID' class='btn btn-info' >Feedback</a></td>"; 
echo "<td><a href='view_rating.php?DID=$DID' class='btn btn-danger'>Rating</a></td>"; 

echo "</tr>";
}
}
?>
</table>
	<!-- Hero section end -->
</body>
</html>