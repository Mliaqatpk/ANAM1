<?php ob_start();
 session_start();
$uid=$_SESSION['UID'];
if($_SESSION['type']!='nutritionist'){
    header('location: Logout.php');
}

     ?>
     <?php
if(isset($_GET['DID'])){
  $DID=$_GET['DID'];
  $conn=mysqli_connect('localhost','root','','diet');
  $sql="delete from diet_plan where DID='$DID' ";

  $result=mysqli_query($conn,$sql);
if($result){
  Header("location:nutritionist.php");
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
      <br><br>
	<!-- Hero section -->
	<section class="hero-section set-bg" data-setbg="img/head.jpg">
		<div class="container"  align="center" style="background-color:white;opacity:0.9;width:50%;border-radius: 50px 10px ;">
			<div class="hero-text text-black">
				<h2>Publish Diet Plan</h2>
				
			</div>
		
                                    <center>
                                    <form class="intro-newslatter" method="post" style="width:300px" enctype="multipart/form-data">
                                    <select name="h_condition" class="form-control" style="width: 100%;">

<option value="" disabled selected>Search by Health_Condition.....</option>

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
<input type="text" name="diet_name" class="form-control" placeholder="Diet Name"   required>
      
     <input type="text" name="diet_food" class="form-control" placeholder="Food included in this diet"   required>
     <input type="text" name="diet_limit" class="form-control" placeholder="Food that is not included in this diet"   required>
     <input type="text" name="health_benefits" class="form-control" placeholder="health benefits of this diet"   required>
     <input type="text" name="downside" class="form-control" placeholder="downside of this diet"   required>
     <input type="number" name="calories" class="form-control" placeholder="daily calories"   required>
     <input type="text" name="des" class="form-control" placeholder="other details related to this diet"   required>
     <input type="number" name="price" class="form-control" placeholder="Price"   required>
     Upload Picture
     <input type="file" name="image" class="form-control" required>
  
						<input type="submit"class="btn btn-danger" name="enter" value="Enter" style="width:300px">
                                    <br><br><br>       
					</form>
				</div>
                            <?php
                            if(isset($_POST['enter'])){
                                $UID=$_SESSION['UID'];
                                $h=$_POST['h_condition'];
                                $diet_name=$_POST['diet_name'];
                                $diet_food=$_POST['diet_food'];
                                $diet_limit=$_POST['diet_limit'];
                                $health_benefits=$_POST['health_benefits'];
                                $downside=$_POST['downside'];
                                $calories=$_POST['calories'];
                                $des=$_POST['des'];
                                $price=$_POST['price'];
                                if($_FILES['image']['name'] == ''){
                                  @$image = NULL;
                                  }else{
                                  
                                  $destination = __DIR__ . "/img/";
                                  $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination.$_FILES['image']['name']);
                                  $image = $_FILES['image']['name'];
                                  
                                  }
                             $db = mysqli_connect('localhost','root','','diet');
                             $sql="insert into diet_plan 	(DID,HID,UID,Diet_name,diet_food,diet_limit,health_benefits,downside,daily_calories,description,price,image)	
                             values(null,'$h','$UID','$diet_name','$diet_food','$diet_limit','$health_benefits','$downside',' $calories','$des','$price','$image') ";

                             $result=mysqli_query($db,$sql);
                             
                                    

if($result){
    
                                 echo "<center><p class='alert alert-success'  style='width:300px'>Diet Plan added successfully</p></center>";
                                    
                                          
                             

        
}else{
echo "<p class='alert alert-danger'>Something went wrong try again</p>";

           
                            }}?>
			</div>
		</div>
	</section>
        
     </center>
     <br><Br>
  <table class="table">
    <tr>
      <th>Image</th>
    <th>
Health Condition
</th>
<th>
Diet Name
</th>
<th>
Diet Food
</th>
<th>
Diet Limit
</th>
<th>
Diet Benefits
</th>
<th>
Down sides
</th>
<th>
Calories
</th>
<th>
Other details
</th>
<th>
Price
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
$sql="select * from diet_plan where UID=$uid";

$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num>0){
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
    $image=$row['image'];


 
?>
<?php
echo "<tr>";
echo "<td><img src='img/$image'  width='100px' height='100px'></td>";
  
 echo "<td> $Diet_name </td>"; 
 echo "<td> $diet_food </td>"; 
 echo "<td> $diet_limit </td>"; 
 echo "<td> $health_benefits </td>"; 

  echo "<td> $downside </td>"; 
  echo "<td> $daily_calories </td>"; 
  echo "<td> $description </td>"; 
  echo "<td> $price </td>"; 
  echo "<td> $HID </td>"; 
 
 echo "<td><a href='update_diet_plan.php?DID=$DID' class='btn btn-warning' >Update</a></td>";
 echo "<td><a href='nutritionist.php?DID=$DID' class='btn btn-danger'>Delete</a></td>";
echo "</tr>";
}
}
?>
</table>
	<!-- Hero section end -->
</body>
</html>