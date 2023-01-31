<?php ob_start();
 session_start();
$uid=$_SESSION['UID'];
if($_SESSION['type']!='admin'){
    header('location: Logout.php');
}

     ?>
     <?php
if(isset($_GET['HID'])){
  $HID=$_GET['HID'];
  $conn=mysqli_connect('localhost','root','','diet');
  $sql="delete from health_condition where HID='$HID' ";

  $result=mysqli_query($conn,$sql);
if($result){
  Header("location:admin.php");
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
 
      <br><br>
	<!-- Hero section -->
	<section class="hero-section set-bg" data-setbg="img/head.jpg">
		<div class="container"  align="center" style="background-color:white;opacity:0.9;width:50%;border-radius: 50px 10px;">
			<div class="hero-text text-black">
				<h2>Add Health Condition</h2>
				
			</div>
		
                                    <center>
                                    <form class="intro-newslatter" method="post" style="width:300px">
                                        <input type="text" placeholder="Enter health condition" name="type" class="form-control" required>
                                
						<input type="submit"class="btn btn-danger" name="enter" value="Enter" style="width:300px">
                                    <br><br><br>       
					</form>
				</div>
                            <?php
                            if(isset($_POST['enter'])){
                                $type=$_POST['type'];
                        
                             $db = mysqli_connect('localhost','root','','diet');
                             $sql="insert into health_condition values(null,'$type') ";
                      
                             $result=mysqli_query($db,$sql);
                             
                                    

if($result){
    
                                 echo "<center><p class='alert alert-success'  style='width:300px'>health condition added successfully</p></center>";
                                    
                                          
                             

        
}else{
echo "<p class='alert alert-danger'>Something goes wrong .Please Add Service again.</p>";

           
                            }}?>
			</div>
		</div>
	</section>
        
     </center>
     <br><Br>
  <table class="table">
    <tr>
   
<th>
Name
</th>

<th>
Edit
</th>
<th>
  Delete
</th>
</tr>
<?php
$conn=mysqli_connect('localhost','root','','diet');
$sql="select * from health_condition";

$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num>0){
  while($row=mysqli_fetch_assoc($result)){
    $HID=$row['HID'];
    $name=$row['h_condition'];
   
    



 
?>
<?php
echo "<tr>";
 echo "<td> $name </td>"; 
 
 echo "<td><a href='update_health_condition.php?HID=$HID' class='btn btn-warning' >Update</a></td>";
 echo "<td><a href='admin.php?HID=$HID' class='btn btn-danger'>Delete</a></td>";
echo "</tr>";
}
}
?>
</table>
	<!-- Hero section end -->
</body>
</html>