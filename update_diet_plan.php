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
if(isset($_GET['DID'])){
  $DID=$_GET['DID'];


  $db=mysqli_connect('localhost','root','','diet');
          
  $sql="select * from diet_plan where DID=$DID ";

  $result=mysqli_query($db,$sql);
 
         


while($row=mysqli_fetch_assoc($result)){
  $DID=$row['DID'];
    $HID=$row['HID'];
    $Diet_name=$row['Diet_name'];
    $diet_food=$row['diet_food'];

    $diet_limit=$row['diet_limit'];
    $health_benefits=$row['health_benefits'];
   
    $downside=$row['downside'];
    $daily_calories=$row['daily_calories'];
    $description=$row['description'];
    $price=$row['price'];
    $edit_pic=$row['image'];

    
  }
}

?>
<br><br><br>
 <center> <div style="background-color:WHITE;opacity:0.9;width:50%;border-radius: 50px 10px;"><br>  <h1> Update Health Condition </h1> 
 <form method="POST" style="width:300px" enctype="multipart/form-data">
  <input type="hidden" name="DID"  VALUE="<?php echo @$DID ?>"class="form-control">
  <select name="h_condition" class="form-control" style="width: 100%;">

<option value="<?php echo $HID ?>" disabled selected>Search by Health_Condition.....</option>

      <?php 
 $db=mysqli_connect('localhost','root','','diet');
$find = "SELECT * FROM health_condition";
$result = mysqli_query($db,$find);

$num = mysqli_num_rows($result);
if($num > 0){



while($row = mysqli_fetch_assoc($result)){

$HID = $row['HID'];
$ty = $row['h_condition'];
echo "<option value='$HID '>". ucfirst($ty)."</option>";

}
}


?>
</select> 
Current Picture
<img src="img/<?php echo @$edit_pic?>"style="width:170px !important;  !important;box-shadow: 0 2px 5px green">
     <input type="hidden" name="oldimage" class="form-control"value="<?php echo @$edit_pic ?>" readonly >
<br>
IF you want to change this picture then choose new picture
<input type="file" name="image" class="form-control" > <br>
<label>Diet Name</label>
<input type="text" name="diet_name" value="<?php echo @$Diet_name ?>" class="form-control" placeholder="Diet Name"   required>
<label>Diet Food</label>
     <input type="text" name="diet_food" value="<?php echo @$diet_food ?>" class="form-control"  required>
     <label>Diet Limit</label>
     <input type="text" name="diet_limit" value="<?php echo @$diet_limit ?>" class="form-control" required>
     <label>Health Benefits</label>
     <input type="text" name="health_benefits" value="<?php echo @$health_benefits ?>" class="form-control"  required>
     <label>Downside</label>
     <input type="text" name="downside" value="<?php echo @$downside ?>" class="form-control"  required>
     <label>Daily Calories</label>
     <input type="number" name="calories" value="<?php echo @$daily_calories ?>" class="form-control"   required>
     <label>Description(other Details)</label>
     <input type="text" name="des" value="<?php echo @$description ?>" class="form-control"   required>
     <label>Price</label>
     <input type="number" name="price"  value="<?php echo @$price ?>" class="form-control"    required>
  
     
      

   <input type="submit" name="update" value="update" class="btn btn-info" style="width:300px">
   <br><br><br>
</form>
<?php
if(isset($_POST['update'])){
  $UID=$_SESSION['UID'];
 
  $diet_name=$_POST['diet_name'];
  $diet_food=$_POST['diet_food'];
  $diet_limit=$_POST['diet_limit'];
  $health_benefits=$_POST['health_benefits'];
  $downside=$_POST['downside'];
  $calories=$_POST['calories'];
  $des=$_POST['des'];
  $price=$_POST['price'];
  
if($_FILES['image']['name'] == ''){
  $image =$_POST['oldimage']; 
  }else{
  
  $destination = __DIR__ . "/img/";
  $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination.$_FILES['image']['name']);
  $image = $_FILES['image']['name'];
  
  }
 $connection=mysqli_connect('localhost','root','','diet');
 $sql="update diet_plan SET Diet_name='$diet_name' , diet_food='$diet_food' , diet_limit='$diet_limit' , health_benefits='$health_benefits' , downside='$downside', daily_calories='$calories' , description='$des' , price='$price' ,image='$image' where DID='$DID';";

 $result=mysqli_query($connection,$sql);
if($result){
header("location:nutritionist.php");
  
} else{
  echo "<div class='alert alert-danger' role='alert' style='width:50%'> Diet info info is not updated </div>";
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