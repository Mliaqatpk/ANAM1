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
if(isset($_GET['UID'])){
  $UID=$_GET['UID'];


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
$intro=$row['intro'];
$pic=$row['pic'];
$qua=$row['qualification'];
$ex=$row['experience'];


    
  }
}

?>
<br><br><br>


 <center> <div style="background-color:WHITE;opacity:0.9;width:50%;border-radius: 50px 10px;"><br>  <h1> Update Health Condition </h1> 
 <form method="POST" style="width:300px" enctype="multipart/form-data">
  <input type="hidden" name="UID"  VALUE="<?php echo @$UID ?>"class="form-control">
  <b style="color:white">Current Picture</b>
<img src="img/<?php echo @$pic ?>"style="width:170px !important;  !important;box-shadow: 0 2px 5px green">
     <input type="hidden" name="oldimage" class="form-control"value="<?php echo @$pic ?>" readonly >
<br><b style="color:white">
IF you want to change this picture then choose new picture</b>
<input type="file" name="image" class="form-control" > <br>
  <label>Name</label>
<input type="text" name="name" class="form-control" Value="<?php  echo @$name ?>"  minlength="3" maxlength="100"  onkeydown="return /[a-zA-Z]/i.test(event.key)"    title="min 3 and max 100 characters allowed (only alphabets) " required>
<label>UserName</label> 
     <input type="text" name="username" class="form-control" Value="<?php  echo @$username ?>"  minlength="8" maxlength="100"  onkeydown="return /[a-zA-Z0-9-]/i.test(event.key)"  title="min 8 and max 100 characters allowed (only alphabets and numbers with no special Character) " required>
     <label>Password</label>
<input type="password" name="password" class="form-control" Value="<?php  echo @$password ?>" minlength="8" maxlength="20" title="min 8 and max 20 characters allowed  " required>
<label>Email</label>
    <input type="email" name="email" class="form-control" Value="<?php  echo @$email ?>" title="enter valid email address" required>
    <label>Phoneno</label>    <input type="number" name="phoneno" class="form-control" Value="<?php  echo @$phone ?>"  title="enter valid PhoneNo"  pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}-[0-9]{3}" required>
    <label>Qualification</label> 
     <input type="text" name="qua" class="form-control" Value="<?php  echo @$qua ?>" required>
   
     <label>Experience</label> 
     <input type="text" name="ex" class="form-control" Value="<?php  echo @$ex ?>" required>
     <label>Introduction</label> 
     <input type="text" name="intro" class="form-control" Value="<?php  echo @$intro ?>" required>
    
     
      

   <input type="submit" name="update" value="update" class="btn btn-info" style="width:300px">
   <br><br><br>
</form>
<?php
if(isset($_POST['update'])){
  $UID=$_POST['UID'];
  
    $name=$_POST['name'];
    $username=$_POST['username'];
    $phone=$_POST['phoneno'];
    $email=$_POST['email']; 
    $password=$_POST['password'];

    $intro=$_POST['intro'];
    $qua=$_POST['qua'];
    $ex=$_POST['ex'];
   
  
if($_FILES['image']['name'] == ''){
  $image =$_POST['oldimage']; 
  }else{
  
  $destination = __DIR__ . "/img/";
  $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination.$_FILES['image']['name']);
  $image = $_FILES['image']['name'];
  
  }
 $connection=mysqli_connect('localhost','root','','diet');
 $sql="update user SET name='$name' , username='$username' , phone='$phone' , email='$email' , password='$password',intro='$intro' , qualification='$qua' , experience='$ex', pic='$image'  where UID='$UID';";

 $result=mysqli_query($connection,$sql);
if($result){
header("location:manage_nutritionist.php");
  
} else{
  echo "<div class='alert alert-danger' role='alert' style='width:50%'> user info is not updated </div>";
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