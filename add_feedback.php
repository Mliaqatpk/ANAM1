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
    * {
  box-sizing: border-box;
}
.navbar{
     background-image: url(img/p.jpg);
     background-repeat:no-repeat;
     background-size:100%;
    }
/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 50%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
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
	
<div class="row">
  <div class="column" style="background-color:#aaa;padding:30px;border:black;border-width: medium;">
  <section class="hero-section set-bg" data-setbg="img/head.jpg">
	<center>
  <br><Br>
  <form method="post" style="width:300px">
<input type="text" name="feedback" class="form-control" placeholder="Add Feedback">
    <input type="submit" name="send" value="Send" class="btn btn-danger"  style="width:300px"> </center>
  </form>
<table class="table">
<br>
<?php
if(isset($_POST['send'])){
$feedback=$_POST['feedback'];
$NID=$_GET['NID'];
$DID=$_GET['DID'];
$UID=$_SESSION['UID'];
$date=date("Y-m-d");
$conn=mysqli_connect('localhost','root','','diet');
$sql="insert into feedback (FID,UID,DID,Message,date_message,NID) values(null, '$UID','$DID','$feedback',now(), '$NID');";

$result=mysqli_query($conn,$sql);
if($result){
  echo "<p class='alert alert-success'>Feedback Added</p>";
}
else{
  echo "<p class='alert alert-danger'>message not sent</p>";
}}
?>

</table>
  </div>
  <div class="column" style="background-color:#bbb;">
  <section class="hero-section set-bg" data-setbg="img/head.jpg">
	
  <br><Br>
<table class="table">
 <tr>
 <th>
Client
</th>
<th>
Nutritionist
</th>
<th>
Diet_name
</th>
<th>
Message
</th>
<th>
Date of Message
</th>
<th>
Reply
</th>
<th>
Date Reply
</th>
</tr>
<?php
$UID=$_SESSION['UID'];
$NID=$_GET['NID'];
$conn=mysqli_connect('localhost','root','','diet');
$sql="select * from feedback Where UID='$UID' and NID='$NID'";

$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num>0){
while($row=mysqli_fetch_assoc($result)){

 $FID=$row['FID'];
 
 $message=$row['Message'];

 $reply=$row['reply'];
 $date_message=$row['date_message'];
 $NID=$row['NID'];

 $date_reply=$row['date_reply'];




?>
<?php 
 $user="select * from user  where UID='$UID' ;";

$res=mysqli_query($conn,$user);
$r=mysqli_fetch_assoc($res);
@$nameclient=$r['username'];

?>
<?php 
 $user1="select * from user  where UID='$NID' ;";

$res1=mysqli_query($conn,$user1);
$r1=mysqli_fetch_assoc($res1);
@$nameN=$r1['username'];

?>
<?php 
 @$user1="select * from diet_plan  where DID='$DID' ;";

$res1=mysqli_query($conn,$user1);
$r1=mysqli_fetch_assoc($res1);
@$diet_name=$r1['Diet_name'];

?>
<?php
echo "<tr>";
echo "<td> $nameclient </td>"; 
echo "<td> $nameN </td>"; 
echo "<td> $diet_name </td>"; 
echo "<td> $message </td>"; 
echo "<td> $date_message </td>";
echo "<td> $reply </td>";
echo "<td> $date_reply </td>";

echo "</tr>";
}
}
?>
</table>
  </div>
</div>
	<!-- Hero section end -->
</body>
</html>