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
    </style>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   
  </head>


  <?php

if(isset($_GET['mid'])){
  $did=$_GET['mid'];
  
  
   $_SESSION['items']++;
  $_SESSION['Products'][$did]++;
  header('location: view_diet_plan.php');
  



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
        </div><center>

        
	<!-- Hero section -->
	<section class="hero-section set-bg" data-setbg="img/head.jpg">

		<div class="container">
			<div class="hero-text text-black">
        

   <?php
       
       if(isset($_GET['DID'] )){
      
        @$DID=$_GET['DID'];
    
   $db=mysqli_connect('localhost','root','','diet');
              
   $sql="select * from diet_plan where DID='$DID' ";

   $result=mysqli_query($db,$sql);
   @$num=mysqli_num_rows($result);
   if($num>0){
     while($row=mysqli_fetch_assoc($result)){
       
       $DID=$row['DID'];
       $HID=$row['HID'];
       $Diet_name=$row['Diet_name'];
       $diet_food=$row['diet_food'];
   
       $diet_limit=$row['diet_limit'];
       $health_benefits=$row['health_benefits'];
      
       $image=$row['image'];
       $downside=$row['downside'];
       $daily_calories=$row['daily_calories'];
       $description=$row['description'];
       $price=$row['price'];
    
    ?>
     <?php 
 $user="select * from health_condition  where HID='$HID';";

$res=mysqli_query($db,$user);
$r=mysqli_fetch_assoc($res);
@$condition=$r['h_condition'];

?>
<?php 
 $user="select * from rating  where DID='$DID';";

$res=mysqli_query($db,$user);
$r=mysqli_fetch_assoc($res);
@$rating=$r['rating'];

?>
 <div class="container"  align="center" style="background-color:white;opacity:0.9;width:80%;border-radius: 50px 10px;">
			<div class="hero-text text-black">
				
      <h2>Diet Plan Details</h2>
   
      




 
<div class="row" style="border-radius: 10px 50px;">
  <div class="column" style="background-color:whitesmoke;border-radius: 50px 0px 50px 0px">
  <img src="img/<?php echo @$image ?>" style="border-radius: 50px 10px;" width="500px" height="280px">
  
</div>
  <div class="column" style="background-color:whitesmoke;border-radius: 0px 50px 0px 0px"><br><br>
 <table class="table table-hover"> 
 <td><h4><b>Diet Name</b><br> <?php echo $Diet_name ?> </h4></td>
 
  <td><h4><b>Health Condition</b> <br><?php echo $condition ?> </h4>
     
     </tr>
  <tr><th><p><b>Diet Benefits</b> </th>
<th><p><b>DownSide</b></th></tr>
<tr>
<td><?php echo $health_benefits ?> </p></td>
  <td> <?php echo $downside ?> </p></td>

     </tr>
  <tr> <td> <p><b>Price</b> <?php echo $price ?> </p></td>
  <td> <p><b><i style="color:yellow" class="glyphicon glyphicon-star"></b></i> <?php echo $rating ?> </p></td>
</tr></table>
  
  </div>
</div>
   
    </table>
  <table class="table table-bordered"> <tr> <td><h4><b>Daily Calories</b><br> <?php echo $daily_calories ?> </h4></td> 
   <td><h4><b>Daily Limits</b><br> <?php echo $diet_limit ?> </h4></td> 
   <td><h4><b>Daily Food</b><br> <?php echo $diet_food ?> </h4></td> 
  </tr>
  <tr> 
   <td><h4><b>Detailed Overview of Diet </b><br> <?php echo $description ?> </h4></td> 
  </tr>
     </table>
  <?php 
  
 
 
echo "<td><a href='view_diet_plan.php?mid=$DID' class='btn btn-danger'>Purchase</a></td>";
        ?>
    
    <?php 
    } } else {
      echo "sorry no record found";
    } } ?>
 </DIV>
  </DIV>
	<!-- Hero section end -->
</body>
</html>