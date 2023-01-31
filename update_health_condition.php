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
<body>
<?php
if(isset($_GET['HID'])){
  $HID=$_GET['HID'];
  $conn=mysqli_connect('localhost','root','','diet');
  $sql="select * from health_condition where HID='$HID'; ";
  $result=mysqli_query($conn,$sql);
  if(mysqli_num_rows($result)>0){
   while($row=mysqli_fetch_assoc($result)) {
    $HID=$row['HID'];
    $h_condition=$row['h_condition'];
    
  }
}
}
?>
<br><br><br>
 <center> <div style="background-color:WHITE;opacity:0.9;width:50%;border-radius: 50px 10px;"><br>  <h1> Update Health Condition </h1> 
 <form method="POST" style="width:300px">
  <input type="hidden" name="HID"  VALUE="<?php echo @$HID ?>"class="form-control">
  <label>Health_Condition</label> <input type="text" name="health_condition"  VALUE="<?php echo @$h_condition ?>"class="form-control">

  
   <input type="submit" name="done" value="Done" class="btn btn-success" style="width:300px">
   <br><br><br>
</form>
<?php
if(isset($_POST['done'])){
  $HID=$_POST['HID'];
  $health_condition=$_POST['health_condition'];
  
 $connection=mysqli_connect('localhost','root','','diet');
 $sql="update health_condition SET h_condition='$health_condition' where HID='$HID';";

 $result=mysqli_query($connection,$sql);
if($result){
header("location:admin.php");
  
} else{
  echo "<div class='alert alert-danger' role='alert' style='width:50%'> health_condition is not updated </div>";
}
}
?>
</center>

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