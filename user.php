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
  a {
  margin:0 auto;
}
table {
  text-align: left;
  position: relative;
  border-collapse: collapse;
  margin:0 auto;
}

table th {
  background: #2c3b46;
  box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);
  text-align: center;
  padding: 8px;
  color: aliceblue;
  width: 150px;
}

table tr td {
  background: #ccc;
  text-align: center;
  border: 1px;
  padding: 7px 0px 7px 0px;
}

tbody td:hover {
  transform: scale(1) !important;
  -webkit-transform: scale(1) !important;
  -moz-transform: scale(1) !important;
  box-shadow: 0px 0px 5px 2px rgba(13, 84, 139, 0.3) !important;
  -webkit-box-shadow: 0px 0px 5px 2px rgba(13, 84, 139, 0.3) !important;
  -moz-box-shadow: 0px 0px 5px 2px rgba(13, 84, 139, 0.3) !important;
}

tbody tr:hover td:first-child {
  background-color: rgb(119, 160, 190) !important;
  color: #fff !important;
  font-weight: bold;
}

tbody td {
  border-right: rgba(63, 63, 63, 0.507) 1px solid !important;
}
    </style>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   
  </head>



<!-- NAVBAR
================================================== -->

	
  <div class="navbar" >
     <header><b><a href="user.php"> <h1 style="text-shadow: 2px 2px blue;color:white"  ><img src="img/logo1.png" width="70px" height="70px"> Online Diet Plan Finder</h1></a></header> 
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
        <body  >

	<!-- Hero section -->
<center>
				<h2 style="color:black"><b><i>My MEAL PLAN</i></b></h2>
				<P style="color:black"><b><i>If your diet order is not accepted yet only one free meal will be disp</i></b></P>
</center>


  <br><Br>
  <table class="table">
    <tr>
   
	<th>
DID
</th>
<th>
Week
</th>
<th>
Day
</th>
<th>
Meal Description
</th>



</tr>
<?php

$conn=mysqli_connect('localhost','root','','diet');
$sql="select * from orders WHERE UID='$uid' ;";

$result=mysqli_query($conn,$sql);

  while($row=mysqli_fetch_assoc($result)){
    
    $DID=$row['DID'];
   $status=$row['status'];
   
  }


 
?>
<?php

$conn=mysqli_connect('localhost','root','','diet');
if((@$status=='pending' )){$sql="select * from meal WHERE   DID='$DID' and fee_Type='free';";

$result=mysqli_query($conn,$sql);

  while($row=mysqli_fetch_assoc($result)){
    
    $DID=$row['DID'];
    $week=$row['Week'];
    $day=$row['Day'];
    $des=$row['Description'];

    $price=$row['Price'];
    $fee_type=$row['fee_Type'];
   



 
?>
 <?php 
 $user="select * from diet_plan where DID='$DID';";

$res=mysqli_query($conn,$user);
$r=mysqli_fetch_assoc($res);
@$dname=$r['Diet_name'];

?>
<?php
echo "<tr>";
 echo "<td> $dname </td>"; 
 echo "<td> $week </td>"; 
 echo "<td> $day </td>"; 
 echo "<td> $des </td>"; 




echo "</tr>";
}
}
?>

    
<?php

$conn=mysqli_connect('localhost','root','','diet');
$sql="select * from orders WHERE UID='$uid' ;";

$result=mysqli_query($conn,$sql);

  while($row=mysqli_fetch_assoc($result)){
    
    $DID=$row['DID'];
   $status=$row['status'];
   
  }


 
?>

<?php

$conn=mysqli_connect('localhost','root','','diet');
if((@$status=='accepted')){$sql="select * from meal WHERE   DID='$DID' ;";

$result=mysqli_query($conn,$sql);

  while($row=mysqli_fetch_assoc($result)){
    
    $DID=$row['DID'];
    $week=$row['Week'];
    $day=$row['Day'];
    $des=$row['Description'];

    $price=$row['Price'];
    $fee_type=$row['fee_Type'];
   



 
?>
 <?php 
 $user="select * from diet_plan where DID='$DID';";

$res=mysqli_query($conn,$user);
$r=mysqli_fetch_assoc($res);
@$dname=$r['Diet_name'];

?>
<?php
echo "<tr>";
 echo "<td> $dname </td>"; 
 echo "<td> $week </td>"; 
 echo "<td> $day </td>"; 
 echo "<td> $des </td>"; 




echo "</tr>";
}
}
?>
</table>
</body>
</html>
