<?php ob_start();
 session_start();
$uid=$_SESSION['UID'];
if($_SESSION['type']!='admin'){
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



<!-- NAVBAR
================================================== -->
  <body  >
	
  <div class="navbar" style="background-color: url(img/baC.jpg)"  >
  <header><b><a href="admin.php"> <h1 style="color:white" ><img src="img/logo1.png" width="70px" height="70px"> Online Diet Plan Finder</h1></a></header> 
</b>
    

                     <ul class="nav nav-pills navbar-right">
                 
                                                      <li><a style="color:white" class="btn btn-danger" href="admin.php" >Home</a></li>
                                                      <li><a style="color:white" class="btn btn-danger" href="manage_users.php" >Manage Users</a></li>
                                                      <li><a style="color:white" class="btn btn-danger" href="manage_nutritionist.php" >Manage Nutritionist</a></li>
                                                      <li><a style="color:white" class="btn btn-danger" href="admin_messages.php" >Messages</a></li>
                                                      <li><a href="logout.php" style="color:white" class="btn btn-danger" style="color:white" >Logout</a></li>
                                  
                           
                           
                            </ul>
        </div>
 <span style="background-image: url(img/baC.jpg)">
      <br><br>
	<!-- Hero section -->
	<div class="row">
  <div class="column" style="background-color:#bbb;">
  <section class="hero-section set-bg" data-setbg="img/head.jpg">
	
  <br><Br>
<table class="table">
 <tr>
 <th>
DP
</th>
 <th>
Client
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


<th>
Reply
</th>
</tr>
<?php
$UID=$_SESSION['UID'];
$conn=mysqli_connect('localhost','root','','diet');
$sql="select * from messages where reciever_ID=$UID";

$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num>0){
while($row=mysqli_fetch_assoc($result)){

 $SID=$row['SID'];
 
 $sender_id=$row['sender_ID'];
 $message=$row['message'];

 $reply=$row['reply'];
 $date_message=$row['date_message'];
 $receiver_id=$row['reciever_ID'];

 $date_reply=$row['date_reply'];



?>
 <?php 
 $user="select * from user  where UID='$sender_id';";

$res=mysqli_query($conn,$user);
$r=mysqli_fetch_assoc($res);
@$nameclient=$r['username'];

?>
<?php
echo "<tr>";

echo "<td><img src='img/1000_F_116244459_pywR1e0T3H7FPk3LTMjG6jsL3UchDpht.jpg' height='40px' width='40px' style='border-radius:90px'></td>";
echo "<td> $nameclient </td>"; 
 
echo "<td> $message </td>"; 
echo "<td> $date_message </td>";
echo "<td> $reply </td>";
echo "<td> $date_reply </td>";


echo "<td><a href='admin_messages.php?send=$sender_id&&mid=$SID' class='btn btn-warning' style='border-radius:20px'>Reply</a></td>";

echo "</tr>";

?>
<?php }
}?>
</table>


  </div>
  <div class="column" style="background-color:grey;">
  <?php 
  if(isset($_GET['send'])){
$send=$_GET['send'];
$mid=$_GET['mid'];
$db=mysqli_connect('localhost','root','','diet');
$sql1="select * from user where UID=$send";

$resultn = mysqli_query($db,$sql1);

while($rown = mysqli_fetch_assoc($resultn)){

$usernamen = $rown['username'];

  }
  echo " <br><br><center> <img src='img/1000_F_116244459_pywR1e0T3H7FPk3LTMjG6jsL3UchDpht.jpg' height='40px' width='40px' style='border-radius:90px'>
  <form method='post' style='width:300px;'>
  <b style='color:white'> $usernamen </b>
  <input type='hidden' name='SID' value='$SID' class='form-control' style='border-radius:20px'>

<input type='text' name='message' placeholder='Send Reply to This Client' class='form-control' style='border-radius:20px'>
<input type='submit' name='reply' value='Send Reply' class='btn btn-success' style='width:300px;border-radius:20px'>
</form> 

</center>";
}

  ?>
  <?php
  if(isset($_POST['reply'])){
    $message=$_POST['message'];
    $db=mysqli_connect('localhost','root','','diet');
    $send="update messages  set reply='$message' ,  date_reply=now() where SID='$mid'  ";
   
    $UPDATE = mysqli_query($db,$send);
    if($UPDATE){
      echo "<br><bR><center><span class='alert alert-success'>reply sent successfully</span></center>";
    }
  }
  ?>
 
</div>
</div>
	<!-- Hero section end -->
</body>
</html>