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
	<?php 
if(isset($_GET['FID'])){?>
<div class="row"> 
  <div class="column" style="background-color:#aaa;padding:30px;border:black;border-width: medium;">
  <section class="hero-section set-bg" data-setbg="img/head.jpg">
	<center>
  <br><Br>
  <form method="post" style="width:300px">
<input type="text" name="feedback" class="form-control" placeholder="Reply">
    <input type="submit" name="send" value="Send" class="btn btn-danger"  style="width:300px"> </center>
  </form>
<table class="table">
<br>
<?php
if(isset($_POST['send'])){
$feedback=$_POST['feedback'];

$FID=$_GET['FID'];

$conn=mysqli_connect('localhost','root','','diet');
$sql="UPDATE feedback SET reply='$feedback', date_reply=now() where FID='$FID';";

$result=mysqli_query($conn,$sql);
if($result){
  echo "<p class='alert alert-success'>Feedback Added</p>";
}
else{
  echo "<p class='alert alert-success'>message not sent</p>";
}}
?>

</table>
  </div>
 
  <div class="column" style="background-color:#bbb;">
  <?php } ?>
  <section class="hero-section set-bg" data-setbg="img/head.jpg">
	
  <br><Br>
<table class="table">
 <tr>
 <th>
Client
</th>
<th>
Diet Name
</th>
<th>
Feedback
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
Send Reply
</th>
</tr>
<?php
$DID=$_GET['DID'];
$NID=$_SESSION['UID'];
$conn=mysqli_connect('localhost','root','','diet');
$sql="select * from feedback Where NID='$NID' and DID='$DID'";

$result=mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result)){

 $FID=$row['FID'];
 $DID=$row['DID'];
 $message=$row['Message'];

 $reply=$row['reply'];
 $date_message=$row['date_message'];
 $NID=$row['NID'];
 $username=$row['UID'];
 $date_reply=$row['date_reply'];




?>
<?php 
 $user="select * from user  where UID='$username' ;";

$res=mysqli_query($conn,$user);
$r=mysqli_fetch_assoc($res);
@$nameclient=$r['username'];

?>
<?php 
 $user1="select * from diet_plan  where DID='$DID' ;";

$res1=mysqli_query($conn,$user1);
$r1=mysqli_fetch_assoc($res1);
@$diet_name=$r1['Diet_name'];

?>
<?php
echo "<tr>";
echo "<td> $nameclient </td>"; 
echo "<td> $diet_name </td>"; 
echo "<td> $message </td>"; 
echo "<td> $date_message </td>";
echo "<td> $reply </td>";
echo "<td> $date_reply </td>";
echo "<td><a href='view_feedback.php?FID=$FID&&DID=$DID' class='btn btn-warning' >Reply</a></td>";

echo "</tr>";
}

?>
</table>
  </div>
</div>
	<!-- Hero section end -->
</body>
</html>