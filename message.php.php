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



<!-- NAVBAR
================================================== -->
  <body  >
	
  <div class="navbar" >
  <header><b><a href="user.php"> <h1 style="color:white" ><img src="img/logo1.png" width="70px" height="70px"> Online Diet Plan Finder</h1></a></header> 
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
<input type="text" name="message" class="form-control" placeholder="What you want to say.Type Here">
    <input type="submit" name="send" value="Send" class="btn btn-danger"  style="width:300px"> </center>
  </form>
<table class="table">
<br>
<?php
if(isset($_POST['send'])){
$message=$_POST['message'];
$receiver_id=$_GET['UID'];
$sender_id=$_SESSION['UID'];
$date=date("Y-m-d");
$conn=mysqli_connect('localhost','root','','diet');
$sql="insert into messages (`SID`, `sender_ID`, `message`, `date_message`, `reciever_ID`) values(null, '$sender_id','$message',now(), '$receiver_id');";

$result=mysqli_query($conn,$sql);
if($result){
  echo "<p class='alert alert-success'>message sent</p>";
}
else{
  echo "<p class='alert alert-success'>message not sent</p>";
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
$UID=$_GET['UID'];
$sender_id=$_SESSION['UID'];
$conn=mysqli_connect('localhost','root','','diet');
$sql="select * from messages Where reciever_ID='$UID' and sender_ID='$sender_id'";

$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num>0){
while($row=mysqli_fetch_assoc($result)){

 $SID=$row['SID'];
 
 $UID=$row['sender_ID'];
 $message=$row['message'];

 $reply=$row['reply'];
 $date_message=$row['date_message'];
 $receiver_id=$row['reciever_ID'];

 $date_reply=$row['date_reply'];




?>
<?php 
 $user="select * from user  where UID='$receiver_id';";

$res=mysqli_query($conn,$user);
$r=mysqli_fetch_assoc($res);
@$nameclient=$r['username'];

?>
<?php
echo "<tr>";
echo "<td> $nameclient </td>"; 
 
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