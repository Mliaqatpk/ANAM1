<?php ob_start();
 session_start();
$uid=$_SESSION['UID'];
if($_SESSION['type']!='nutritionist'){
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
$intro=$row['intro'];
$pic=$row['pic'];
$qualification=$row['qualification'];
$experience=$row['experience'];


    
  }
}

?>
<center>
<img src="img/<?php echo $pic?>"style="border-radius:90px;width:200px !important; height: 200px !important;box-shadow: 0 2px 5px green">
</center>
<center><?php echo "<a href='change_info.php?UID=$UID' style='border-radius:10px' class='btn btn-info' >update contact details</a>"; ?> 
 <?php echo "<a href='change_pic.php'  style='border-radius:10px' class='btn btn-info' >Update profile picture</a>"; ?> 
</center>

<table class="table" width="100%">
<tr>
    <th>UID</th>
    <th>NAME</th>
    <th>Photo</th>
    <th>intro</th>
    <th>USERNAME</th>
    <th>Phoneno</th>
    <th>Email</th>
    <th>Password</th>
   
    <th>Qualification</th>
    <th>Experience</th>
    <th>Status</th>
 
    
</tr>


<tr>
    <td> <?php Echo $UID;  ?> </td>
    <td> <?php Echo $name;  ?> </td>
    <td> <img src="img/<?php Echo $pic;  ?>" width="40px" height="40px"> </td>
    <td> <?php Echo $intro;  ?> </td>
    <td> <?php Echo $username;  ?> </td>
    <td> <?php Echo $phone;  ?> </td>
    <td> <?php Echo $email;  ?> </td>
    <td> <?php Echo $password;  ?> </td>
    <td> <?php Echo $qualification;  ?> </td>
    <td> <?php Echo $experience;  ?> </td>
    <td> <?php Echo $status;  ?> </td>
    

 
</tr>

</table>

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