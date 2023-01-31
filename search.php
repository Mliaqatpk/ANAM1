<?php ob_start();
session_start();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Diet plan Finder</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
        .navbar{
     background-image: url(img/p.jpg);
     background-repeat:no-repeat;
     background-size:100%;
    }
  
        th{
            background-color:skyblue;
            color:black;
        }
        * {
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 50%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
    </style>

  
   
  </head>



<!-- NAVBAR
================================================== -->
  <body  >
	

   <div class="navbar" >
     <header><b><a href="index.php"> <h1 style="text-shadow: 2px 2px blue;color:white"  ><img src="img/logo1.png" width="70px" height="70px"> Online Diet Plan Finder</h1></a></header> 
</b>


<ul class="nav nav-pills navbar-right">
                        <?php if(isset($_SESSION['UID'])) { ?>
                                                 
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
                                  
                            <?php }   else { ?> 
                                              <li><a style="border-radius:10px" class="btn btn-default"  href="index.php" >Home</a></li>
                                                    <li><a style="border-radius:10px" href="signin.php" class="btn btn-default"   >Signin</a></li>
                                                    <li><a style="border-radius:10px" href="register.php" class="btn btn-default"  >SignUp</a></li>
                                                    <li><a style="border-radius:10px" href="search.php" class="btn btn-default">Search</a></li>
                                                  
                                             <?php }?> 
                           
                            </ul>
        </div><center>

        <form method="get"  style="width:300px">
        <p>Search Filters</p>
        <select name="condition" class="form-control" style="width: 100%;">

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
echo "<option value='$HID'>". ucfirst($ty)."</option>";

}
}


?>
</select> 
<select name="experience" class="form-control" style="width: 100%;">

<option value="" disabled selected>Search by Nutritionist Experience....</option>

      <?php 
 $db=mysqli_connect('localhost','root','','diet');
$find = "SELECT * FROM user where type='nutritionist'";
$result = mysqli_query($db,$find);

$num = mysqli_num_rows($result);
if($num > 0){



while($row = mysqli_fetch_assoc($result)){

$UID = $row['UID'];
$experience = $row['experience'];
echo "<option value='$UID '>". ucfirst($experience)."</option>";

}
}


?>
</select> 
        <input type="number" name="price"  class="form-control" Placeholder="Price Range">
       <select name="rating" class="form-control">
        <option value=''>Choose Rating</option>
        <option value='1'>1</option>
        <option value='2'>2</option>
        <option value='3'>3</option>
        <option value='4'>4</option>
        <option value='5'>5</option>
</select>
<input type="submit" name="button"  class="btn btn-info" VALUE="Search"><br><br>
</form> </center>
	<!-- Hero section -->
	<section class="hero-section set-bg" data-setbg="img/head.jpg">

		<div class="container">
			<div class="hero-text text-black">
        

   <?php
       
       if(isset($_GET['button'] )){
      
        @$hid=$_GET['condition'];
        $price=$_GET['price'];
        $rating=$_GET['rating'];
        @$experience=$_GET['experience'];
   $db=mysqli_connect('localhost','root','','diet');
              
   $sql="select * from diet_plan where HID=$hid or price='$price' or average_rating='$rating' or UID='$experience';";

   $result=mysqli_query($db,$sql);
   @$num=mysqli_num_rows($result);
   if($num>0){
     while($row=mysqli_fetch_assoc($result)){
       
       $DID=$row['DID'];
       $HID=$row['HID'];
       $Diet_name=$row['Diet_name'];
       $image=$row['image'];
       $health_benefits=$row['health_benefits'];
      
       $price=$row['price'];
    
    ?>
     <?php 
 $user="select * from health_condition  where HID='$HID';";

$res=mysqli_query($db,$user);
$r=mysqli_fetch_assoc($res);
@$condition=$r['h_condition'];

?>
 
      




 
<div class="row" style="border-radius: 10px 50px;">
  <div class="column" style="background-color:whitesmoke;border-radius: 50px 0px 50px 0px">
  <img src="img/<?php echo $image ?>" style="border-radius: 50px 10px;" width="500px" height="280px">
  
</div>
  <div class="column" style="background-color:whitesmoke;border-radius: 0px 50px 0px 0px"><br><br>
  <h4><b>Health Condition</b> <?php echo $condition ?> </h4>
  <p><b>Diet Name</b> <?php echo $Diet_name ?> </p>
  <p><b>Diet Benefits</b> <?php echo $health_benefits ?> </p>
    <p><b>Price</b> <?php echo $price ?> </p>
    <?php
 if(@$_SESSION['login']=='true'){
 echo "<td><a href='view_diet_plan.php?DID=$DID' class='btn btn-warning' >View Details</a></td>";

       
}
 else{
  echo " <td><button type='button' class='btn btn-info' data-toggle='modal' data-target='#myModal'>View Details</button></td>
  ";
 }?>
  </div>
</div>
    <?php 
    } } else {
      echo "<p STYLE='text-align:center' class='alert alert-danger'>Sorry No Record Found</p>";
    } } ?>
    </table>
	<!-- Hero section end -->
  
  

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>login </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

  <!-- Trigger the modal with a button -->

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        
          <h4 class="modal-title">Cannot View Detail Untill Login</h4>
        </div>
        <div class="modal-body">
          <p> Please Login First to View Diet Details. <a href="signin.php">Go to Login Page</a>.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

</body>
</html>
