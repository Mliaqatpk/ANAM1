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
 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Lahore City Steer</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background-image:url(img/b.png);
            background-repeat: no-repeat;
            background-size: 100%;
         
        }
        th{
            background-color:skyblue;
            color:black;
        }
      label{
        float:left;
      }
    </style>

  
   
  </head>



<!-- NAVBAR
================================================== -->
  <body  >
	
  <div class="navbar" style="background-image: url(img/head.jpg);"  >
      <header><b> <h1 style="color:white" >Lahore City Steer</h1></header> 
</b>


                     <ul class="nav nav-pills navbar-right">
                           <li><a   style="color:black" class="btn btn-info"href="admin.php" >Home</a></li>
                                  
                                                        <li><a   style="color:black" class="btn btn-info"href="logout.php" >Logout</a></li>
                                                        
                                                    
                                                   
			
                                                    
                                                   
                           
                            </ul>
        </div>
<body>
<?php
if(isset($_GET['SID_info'])){
  $SID_info=$_GET['SID_info'];
  $conn=mysqli_connect('localhost','root','','lahore');
  $sql="select * from services_info where SID_info='$SID_info'; ";
  $result=mysqli_query($conn,$sql);
  if(mysqli_num_rows($result)>0){
   while($row=mysqli_fetch_assoc($result)) {
    $SID_info=$row['SID_info'];
    $name=$row['name'];
    $Image_1=$row['Image_1'];
    $Location=$row['Location'];
    $Contact=$row['Contact'];
    $Email=$row['Email'];
    $SID=$row['SID'];
    
  }
}
}
?>
<br><br><br>
 <center> <div style="background-color:skyblue;opacity:0.9;width:50%;border-radius: 50px 10px;"><br>  <h1> Update Service Information </h1> 
 <img src="img/<?php echo $Image_1 ?>" height="100px" weight="100px">
 <form method="POST"  style="width:300px">
  <input type="hidden" name="SID"  VALUE="<?php echo @$SID ?>"class="form-control">
 <label >Name</label><input type="text" name="name"  VALUE="<?php echo @$name ?>"class="form-control">
 <br><input type="hidden" name="image" value="<?php echo @$Image_1?>" >
     
 <label>Image</label><input type="file" name="image"  class="form-control">
 <label>Location</label><input type="text" name="location"  VALUE="<?php echo @$Location ?>"class="form-control">
 <label>Contact</label><input type="number" name="contact"  VALUE="<?php echo @$Contact ?>"class="form-control">
 <label>Email</label><input type="text" name="email"  VALUE="<?php echo @$Email ?>"class="form-control">
 <input type="hidden" name="type_s" value="<?php echo @$SID?>" >
 <select name="type_s" class="form-control" style="width: 100%">

<option value="<?php echo @$SID ?>" disabled selected>Choose Service Type.....</option>


<?php 
 $db=mysqli_connect('localhost','root','','lahore');
$find = "SELECT * FROM services";
$result = mysqli_query($db,$find);

$num = mysqli_num_rows($result);
if($num > 0){



while($row = mysqli_fetch_assoc($result)){

$SID = $row['SID'];
$ty = $row['Type'];
echo "<option value='$SID '>". ucfirst($ty)."</option>";

}
}


?>

</select>         
  
   <input type="submit" name="done" value="Done" class="btn btn-success" style="width:300px">
   <br><br><br>
</form>
<?php
if(isset($_POST['done'])){
$SID=$_POST['SID'];
  $SID_info=$_GET['SID_info'];
  $name=$_POST['name'];
  $location=$_POST['location'];
  $Type_s=$_POST['type_s'];
  $email=$_POST['email'];
  $contact=$_POST['contact'];

  if(@$_FILES['image']['name'] == ''){
    @$image = $_POST['image'];
    }else{
    
    $destination = __DIR__ . "/img/";
    $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination.$_FILES['image']['name']);
    $image = $_FILES['image']['name'];
    
    }
 $connection=mysqli_connect('localhost','root','','lahore');
 $sql="update services_info SET name='$name' , image_1='$image' , Location='$location' ,contact='$contact' , SID='$Type_s' ,email='$email' where SID_info='$SID_info';";
 $result=mysqli_query($connection,$sql);
if($result){

  header("location:services_info.php?SID=$SID");
} else{
  echo "<div class='alert alert-danger' role='alert' style='width:50%'> Service is not updated </div>";
}
}
?>
</center>

</div>
</body>
<br><Br><Br><br><br><br><Br>
<footer style="background-color:black;height:25%">
<center>
  <img src="img/VU_Logo.png" height="50px" width="50px">
<a href="index.php" style="color:white">Test Phase for cs619 Final Year Project </a>
</center>

</footer>
</html>