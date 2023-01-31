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
<body>
<?php
if(isset($_SESSION['UID'])){
  $UID=$_SESSION['UID'];


  $db=mysqli_connect('localhost','root','','diet');
          
  $sql="select * from user where UID=$UID ";

  $result=mysqli_query($db,$sql);
 
         


while($row=mysqli_fetch_assoc($result)){
$UID=$row['UID'];

$pic=$row['pic'];



    
  }
}

?>
<center>
<img src="img/<?php echo $pic?>"style="border-radius:90px;width:200px !important; height: 200px !important;box-shadow: 0 2px 5px green">


<form method="POST" style="width:300px" enctype="multipart/form-data">
<b style="color:white">Current Picture</b>
<img src="img/<?php echo @$edit_pic?>"style="width:170px !important;  !important;box-shadow: 0 2px 5px green">
     <input type="hidden" name="oldimage" class="form-control"value="<?php echo @$edit_pic ?>" readonly >
<br><b style="color:white">
IF you want to change this picture then choose new picture</b>
<input type="file" name="image" class="form-control" > <br>
<input type="submit" name="update" value="update" class="btn btn-info" style="width:300px">
   <br><br><br>
</form>
</center>

<?php
if(isset($_POST['update'])){
  $UID=$_SESSION['UID'];
 

  
if($_FILES['image']['name'] == ''){
  $image =$_POST['oldimage']; 
  }else{
  
  $destination = __DIR__ . "/img/";
  $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination.$_FILES['image']['name']);
  $image = $_FILES['image']['name'];
  
  }
 $connection=mysqli_connect('localhost','root','','diet');
 $sql="update user SET pic='$image' where UID='$UID';";

 $result=mysqli_query($connection,$sql);
if($result){
header("location:update_nutritionist.php");
  
} else{
  echo "<div class='alert alert-danger' role='alert' style='width:50%'> Profile Picture info is not updated </div>";
}
}
?>
</body>
<br><Br><Br><br><br><br><Br>
<footer style="background-color:black;height:25%">
<center>
  <img src="img/logo1.png" height="50px" width="50px">
<a href="index.php" style="color:white">Final Phase for cs619 Final Year Project </a>
</center>

</footer>
</html>