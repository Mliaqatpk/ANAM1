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

      <br><br>
	<!-- Hero section -->
	
<div class="row">
  <div class="column" style="background-color:#aaa;padding:30px;border:black;border-width: medium;">
  <section class="hero-section set-bg" data-setbg="img/head.jpg">
	<center>
  <br><Br>
  <form method="post" style="width:300px">
   <select name="type" class="form-control">
    <option value=""> Select User</option>
    <option value="admin" >Admin</option>
    <option value="Nutritionist" >Nutritionist</option>
</select>
    <input type="submit" name="search" value="Search" class="btn btn-danger"  style="width:300px"> </center>
  </form>
<table class="table">
<tr>
 <th>
DP
</th>
 <th>
Name
</th>
<th>
Type
</th>


<th>
message
</th>
</tr>
<br>
<?php
if(isset($_POST['search'])){
$type=$_POST['type'];
$conn=mysqli_connect('localhost','root','','diet');
$sql="select * from user Where  type='$type';";

$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num>0){
while($row=mysqli_fetch_assoc($result)){


 
 $UID=$row['UID'];
 $username=$row['username'];
 $type=$row['type'];




?>

<?php
echo "<tr >";
echo "<td><img src='img/1000_F_116244459_pywR1e0T3H7FPk3LTMjG6jsL3UchDpht.jpg' height='40px' width='40px' style='border-radius:90px'></td>";

echo "<td> $username </td>"; 
echo "<td> $type </td>";
echo "<td><a href='message.php?UID=$UID' class='btn btn-warning' style='border-radius:10px 50px'>Send Message</a></td>";

echo "</tr>";
}
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
Date of Reply
</th>
<th>
Send Message
</th>
</tr>
<?php
$UID=$_SESSION['UID'];
$conn=mysqli_connect('localhost','root','','diet');
$sql="select * from messages Where reciever_ID=$UID";

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
echo "<td style='padding:10px'> $reply </td>";
echo "<td style='padding:10px'> $date_reply </td>";
echo "<td><a href='message.php?UID=$UID' class='btn btn-warning' >Message Again</a></td>";

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