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
        <?php
if(isset($_GET['UID'])){
  $UID=$_GET['UID'];
  $conn=mysqli_connect('localhost','root','','diet');
  $sql="delete from user where UID='$UID' ";

  $result=mysqli_query($conn,$sql);
if($result){
  Header("location:manage_nutritionist.php");
}
else{
  echo "oops something went wrong";
}
  }

?>
        <?php
if(isset($_GET['accept'])){
  $UID=$_GET['accept'];
 
  
 $connection=mysqli_connect('localhost','root','','diet');
 $sql="update user SET status='accepted' where UID='$UID';";

 $result=mysqli_query($connection,$sql);
 if($result){

  header("location:manage_nutritionist.php");
    
     }
}
?>
<?php
if(isset($_GET['reject'])){
  $UID=$_GET['reject'];
 
  
 $connection=mysqli_connect('localhost','root','','diet');
 $sql="update user SET status='rejected' where UID='$UID';";

 $result=mysqli_query($connection,$sql);
 if($result){

header("location:manage_nutritionist.php");
  
   }
}

?>

 <span style="background-image: url(img/baC.jpg)">
      <br><br>
	<!-- Hero section -->
	<section class="hero-section set-bg" data-setbg="img/head.jpg">
		<div class="container"  align="center" style="background-color:white;opacity:0.9;width:50%;border-radius: 50px 10px;">
			<div class="hero-text text-black">
      <div class="contact-form">
  
<center>
    <h3>Add Nutritionist</h3><br>
     
<form method="post" enctype= "multipart/form-data" >

<input type="text" name="name" class="form-control" placeholder=" Full  Name"  minlength="3" maxlength="100"  onkeydown="return /[a-zA-Z]/i.test(event.key)"    title="min 3 and max 100 characters allowed (only alphabets) " required>
Upload Photo<input type="file" name="image" class="form-control"    required>
<input type="text" name="intro" class="form-control" placeholder=" Introduction"  required>
<input type="text" name="qualification" class="form-control" placeholder="Qualification"  required>
<input type="number" name="experience" class="form-control" placeholder="Experience"   required>
   
     <input type="text" name="username" class="form-control" placeholder="Your User  Name"  minlength="8" maxlength="100"  onkeydown="return /[a-zA-Z0-9-]/i.test(event.key)"  title="min 8 and max 100 characters allowed (only alphabets and numbers with no special Character) " required>
      
<input type="password" name="password" class="form-control" placeholder="Your Password "minlength="8" maxlength="20" title="min 8 and max 20 characters allowed  " required>

    <input type="email" name="email" class="form-control" placeholder="Your Email" title="enter valid email address" required>
    <input type="number" name="phoneno" class="form-control"  title="enter valid PhoneNo" placeholder="0000-00-00-000" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}-[0-9]{3}" required>

    <input type="submit" class="btn btn-danger" name="submit" value="Add" >
    <input type="reset" class="btn btn-danger" name="reset" value="Reset">



    </form>

</center>


    <?php 


if(isset($_POST['submit'])){


$email = $_POST['email'];

$username = $_POST['username'];
$name = $_POST['name'];
if($_FILES['image']['name'] == ''){
  $image = NULL;
  }else{
  
  $destination = __DIR__ . "/img/";
  $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination.$_FILES['image']['name']);
  $image = $_FILES['image']['name'];
  
  }
$intro = $_POST['intro'];
$qualification = $_POST['qualification'];
$experience = $_POST['experience'];
$name = $_POST['name'];
$contact = $_POST['phoneno'];
$password = $_POST['password'];
$db = mysqli_connect('localhost','root','',"diet");

$register_query = "INSERT INTO user (name,username,phone,email,password,type,status,pic,intro,qualification,experience) VALUES ('{$name}','{$username}','{$contact}','{$email}','{$password}','nutritionist','accepted','{$image}','{$intro}','{$qualification}','{$experience}')";

$register_result = mysqli_query($db,$register_query);



   if($register_result){

   echo "<p class='alert alert-success'>nutritionist Registered Successfully</p>";
   
    }else{
     
      echo "<p class='alert alert-danger'>Try Again Please</p>";
    
    }


  }






?>
			</div>
		</div>
	</section>
        
     </center>
     <br><Br>
 

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
    <th>Accept</th>
    <th>Reject</th>
   
    <th>Update</th>
    <th>Delete</th>
   
    
</tr>
<?php
   
  
$db=mysqli_connect('localhost','root','','diet');
          
          $sql="select * from user where type='nutritionist'";

          $result=mysqli_query($db,$sql);
         
                 
  

    while($row=mysqli_fetch_assoc($result)){
    $UID=$row['UID'];
    $name=$row['name'];
    $username=$row['username'];
    $phone=$row['phone'];
    $email=$row['email']; 
    $password=$row['password'];
    $status=$row['status'];  
    $pic=$row['pic'];
    $intro=$row['intro'];
    $qualification=$row['qualification'];
    $experience=$row['experience'];
    

  
?>

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
    
  <?php echo "<td><a href='manage_nutritionist.php?accept=$UID' class='btn btn-success' >Accept</a></td>"; ?> 
   <?php  echo "<td><a href='manage_nutritionist.php?reject=$UID' class='btn btn-danger' >Reject</a></td>"; ?> 
  <?php echo "<td><a href='update_nutritionist_admin.php?UID=$UID' class='btn btn-info' >Update info</a></td>"; ?> 
  
 <?php echo "<td><a href='manage_nutritionist.php?UID=$UID' class='btn btn-danger'>Delete</a></td>"; ?> 

</tr>
<?php  }?>
</table>

	<!-- Hero section end -->
</body>
</html>