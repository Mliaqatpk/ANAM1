<?php ob_start();
 session_start();
$uid=$_SESSION['UID'];
if($_SESSION['type']!='user'){
    header('location: Logout.php');
}

     ?>
     <?php
if(isset($_GET['UID'])){
  $UID=$_GET['UID'];
  $conn=mysqli_connect('localhost','root','','diet');
  $sql="delete from user where UID='$UID' ";

  $result=mysqli_query($conn,$sql);
if($result){
  Header("location:register.php");
}
else{
  echo "oops something went wrong";
}
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
    background-color:purple;
    border-radius:10px 50px;
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

<body>
<?php
if(isset($_SESSION['UID'])){
  $UID=$_SESSION['UID'];


  $db=mysqli_connect('localhost','root','','diet');
          
  $sql="select * from user where UID=$UID ";

  $result=mysqli_query($db,$sql);
 
         


while($row=mysqli_fetch_assoc($result)){
$UID=$row['UID'];
$name=$row['name'];
$username=$row['username'];
$phone=$row['phone'];
$email=$row['email']; 
$password=$row['password'];
$status=$row['status'];



    
  }
}

?>
<div class="container"  align="center" style="background-color:white;opacity:0.9;width:50%;border-radius: 50px 10px;">
			<div class="hero-text text-black">
				
      <h2>Update Profile</h2>
 
   <h1 style="background-color:purple;color:white;width:50%;border-radius:10px 50px"><?php Echo $name;  ?> </h1>  <bR>
  
   <p> <b>User Name</b> <?php Echo $username;  ?>  <bR>
   <b>Phone No</b> <?php Echo $phone;  ?>  <bR>
   <b>Email Address</b> <?php Echo $email;  ?> <bR>
   <b>Password</b> <?php Echo $password;  ?>  <bR>
   
   <b>Profile Status</b>  <?php Echo $status;  ?>  <bR> </p>
    <tr>
 <?php echo "<td><a href='change_user_info.php?UID=$UID' class='btn btn-warning' >update contact details</a></td>"; ?> 
 <?php echo "<td><a href='update_user.php?UID=$UID' class='btn btn-danger' >Delete my Profile</a></td>"; ?> 
  <br><br><br>
 
</tr>



</div>
</div>
</div>
</body>
<br><Br><Br><br><br><br><Br>
<footer style="background-color:black;height:25%">
<center>
  <img src="img/logo1.png" height="50px" width="50px">
<a href="index.php" style="color:white">Final Phase for cs619 Final Year Project </a>
</center>

</footer>
</html>