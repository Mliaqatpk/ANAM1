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
                                                        <li><a style="color:white" class="btn btn-danger" href="Add_meals.php" >Add Meals</a></li>
                                                    <li><a href="logout.php" style="color:white" class="btn btn-danger" style="color:white" >Logout</a></li>
                                  
                           
                           
                            </ul>
        </div>
 <span style="background-image: url(img/baC.jpg)">
<h1 STYLE="COLOR:WHITE">All Diet Plan Feedbacks</h1>
  <table class="table">

<?php
$NID=$_SESSION['UID'];
$conn=mysqli_connect('localhost','root','','diet');
$sql="select * from feedback WHERE NID=$NID";

$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num>0){
  while($row=mysqli_fetch_assoc($result)){
    
    $FID=$row['FID'];
    $UID=$row['UID'];
    $DID=$row['DID'];
    $message=$row['Message'];

    $reply=$row['reply'];
    $date_message=$row['date_message'];
   
    $date_reply=$row['date_reply'];
   



 
?>
 <?php 
 $user="select * from user  where UID='$UID';";

$res=mysqli_query($conn,$user);
$r=mysqli_fetch_assoc($res);
@$nameclient=$r['username'];

?>
 <?php 
 $user="select * from diet_plan  where DID='$DID';";

$res=mysqli_query($conn,$user);
$r=mysqli_fetch_assoc($res);
@$dname=$r['Diet_name'];

?>
<?php
echo "<tr>";
 echo "<td> $nameclient </td>"; 
 echo "<td> $dname </td>"; 

 echo "<td> $message </td>";
 echo "<td> $date_message </td>"; 
 echo "<td> $reply </td>"; 

 
  echo "<td> $date_reply </td>"; 

 
 echo "<td><a href='view_feedback.php?FID=$FID&&DID=$DID' class='btn btn-warning' >Reply</a></td>";
 
echo "</tr>";
}
}
?>
</table>
	<!-- Hero section end -->
</body>
</html>