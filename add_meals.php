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
  
      
  td{
    background-color:white;
  }
  th{
    background-color:maroon;
    color:white;
  }
  *{
    margin: 0;
    padding: 0;
}

    </style>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   
  </head>



<!-- NAVBAR
================================================== -->
  <body  >
	
  <div class="navbar" style="background-image: url(img/baC.jpg)"  >
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

      <br><br>
	<!-- Hero section -->

	<center>
  <h1>Set Diet Plan Meals</h1>

  <form method="post" style="width:300px">
  <select name="diet_plan" class="form-control" style="width: 100%;">

<option value="" disabled selected>Search by Diet Plan....</option>

      <?php 
 $db=mysqli_connect('localhost','root','','diet');
$find = "SELECT * FROM diet_plan where UID=$uid ";
$result = mysqli_query($db,$find);

$num = mysqli_num_rows($result);
if($num > 0){

while($row = mysqli_fetch_assoc($result)){
$DID = $row['DID'];
$diet_name = $row['Diet_name'];
echo "<option value='$DID '>". $diet_name ."</option>";

}
}


?>
</select> 

<select name="week" class="form-control">
  <option value="0">Choose Week</option>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
</select>
<select name="day" class="form-control">
  <option value="0">Choose Day</option>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  <option value="6">6</option>
  <option value="7">7</option>
  <option value="8">8</option>
  <option value="9">9</option>
  <option value="10">10</option>
  <option value="11">11</option>
  <option value="12">12</option>
  <option value="13">13</option>
  <option value="14">14</option>
  <option value="15">15</option>
  <option value="16">16</option>
  <option value="17">17</option>
  <option value="18">18</option>
  <option value="19">19</option>
  <option value="20">20</option>
  <option value="21">21</option>
  <option value="22">22</option>
  <option value="23">23</option>
  <option value="24">24</option>
  <option value="25">25</option>
  <option value="26">26</option>
  <option value="27">27</option>
  <option value="28">28</option>
  <option value="29">29</option>
  <option value="30">30</option>


</select>

    <input type="text" name="des" class="form-control" placeholder="Add Whole Day Meal Plan here"   required>
     <input type="number" name="price" class="form-control" placeholder="Price"   required>
  
     <select name="fee_type" class="form-control">
  <option value="0">Choose Meal fee type</option>
  <option value="free">Free</option>
  <option value="paid">Paid</option>
  
</select>
    <input type="submit" name="add" value="Done" class="btn btn-danger"  style="width:300px"> </center>
  </form>
<table class="table">
<br>
<?php
if(isset($_POST['add'])){
  $UID=$_SESSION['UID'];

  $week=$_POST['week'];
  $day=$_POST['day'];
  $diet_plan=$_POST['diet_plan'];

  $fee_type=$_POST['fee_type'];
  $des=$_POST['des'];
  $price=$_POST['price'];

$db = mysqli_connect('localhost','root','','diet');
$sql="insert into meal 	(Week,Day,DID,Description,Price,fee_Type,NID	)	
values('$week','$day','$diet_plan','$des','$price','$fee_type','$UID') ";


$result=mysqli_query($db,$sql);
if($result){
header("location:add_meals.php?DID=$diet_plan");
}
else{
  echo "<p class='alert alert-danger'>Meal Plan got some Error</p>";
}}
?>

</table>
  </div>
  <br><Br>
  <table class="table">
    <tr>
    <th>

</th>

<th>
Week
</th>
<th>
Day
</th>
<th>
Meal Description
</th>
<th>
Price
</th>
<th>
Fee type
</th>

<th>
  Delete
</th>
</tr>
<?php
@$DID=$_GET['DID'];
$conn=mysqli_connect('localhost','root','','diet');
$sql="select * from meal WHERE NID='$uid' and DID='$DID';";

$result=mysqli_query($conn,$sql);

  while($row=mysqli_fetch_assoc($result)){
    
    $DID=$row['DID'];
    $week=$row['Week'];
    $day=$row['Day'];
    $des=$row['Description'];

    $price=$row['Price'];
    $fee_type=$row['fee_Type'];
   



 
?>
<?php
echo "<tr>";
 echo "<td> $DID </td>"; 
 echo "<td> $week </td>"; 
 echo "<td> $day </td>"; 
 echo "<td> $des </td>"; 

  echo "<td> $price </td>"; 
  echo "<td> $fee_type </td>"; 

 echo "<td><a href='add_meals.php?delete=$DID' class='btn btn-danger'>Delete</a></td>";
echo "</tr>";
}

?>
</table>
	<!-- Hero section end -->
</body>
</html>
<?php
if(isset($_GET['delete'])){
  $DID=$_GET['delete'];
  $conn=mysqli_connect('localhost','root','','diet');
  $sql="delete from meal where DID='$DID' ";

  $result=mysqli_query($conn,$sql);
if($result){
  Header("location:add_meals.php?DID=$diet_plan");
}
else{
  echo "oops something went wrong";
}
  }

?>