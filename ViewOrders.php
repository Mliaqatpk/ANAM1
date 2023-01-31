<?php include_once "connect.php"; 
include_once"header.php";

ob_start();
session_start(); 
$user_id = $_SESSION['uid'];
$user_role = $_SESSION['type'];

?> 


<?php if($user_role == 'admin'){ ?>


<?php include_once "nav_admin.php"; ?> 





<div class="section contact" id="contact" style="margin-top: 2em !important">
<div class="container">

<h4 class="rad-txt text-center">
<span class="abtxt1">All</span>
<span class="abtext">Orders</span>
</h4>


<div class="contact-form">
<div class="col-md-12">
<?php 



if(isset($_GET['receive'])){

$oid = $_GET['receive'];
 $date= date("Y-m-d");

$up_query = "update orders set DStatus='Received' ,DDate='$date' WHERE OID = '{$oid}' ";

$res =mysqli_query($db,$up_query);

if($res){

header("Location: ViewOrders.php");
}


}




?>




<?php 



if(isset($_GET['delete'])){

$delete_id = $_GET['delete'];

$del_query1 = "DELETE FROM orders WHERE OID = '{$delete_id}' ";
$del_query = "DELETE FROM order_details WHERE OID = '{$delete_id}' ";
$del_res = mysqli_query($db,$del_query);
$del_res = mysqli_query($db,$del_query1);
if($del_res){

header("Location: viewOrders.php");
}


}




?>
<?php  if(isset($_GET['oid'])){?>
  
    <form method="post">
       
        <input type="number" name="oid" class="form-control"  readonly value="<?=@$_GET['oid']?>">
        <select name="team" class="form-control" style="width: 100%">

<option value="" disabled selected>Choose DeliveryTeam.....</option>


<?php 

$find = "SELECT * FROM deliveryteam ORDER BY DTID DESC";

$result = mysqli_query($db,$find);

$num = mysqli_num_rows($result);
if($num == 0){

echo "<option value='' disabled selected>No DeliveryTeam Found</option>";

}else{

while($row = mysqli_fetch_assoc($result)){

$dtid = $row['DTID'];
$name = $row['Name'];

echo "<option value='$dtid'>".ucfirst($name)."</option>";

}
}


?>

</select>  
        
        <input type="submit" name="select" value="Select" class="btn btn-info">
    </form>

<?php } ?>
    
    
    
    
    <?php 



if(isset($_POST['select'])){

$team = $_POST['team'];

$oid = $_POST['oid'];
$query = "update orders set DTID='$team' WHERE OID = '{$oid}' ";
$res = mysqli_query($db,$query);

if($res){

header("Location: ViewOrders.php");
}


}




?>










<table class="w3-table-all table table-bordered">

<tr class="w3-red">
<th>ID</th>


<th>UserName</th>
<th>OrderDateTime</th>
<th>DeliveryDateTime</th>
<th>DeliveryTeam</th>
<th>DeliveryStatus</th>
<th>ViewChefs</th>
<th>TotalAmount</th>

<th>Delete</th>

</tr>



<?php 

$problem = "SELECT * FROM orders  ORDER BY OID DESC ";
$result = mysqli_query($db,$problem);

$num = mysqli_num_rows($result);

if($num == 0){

echo "<tr><td>Nothing</td></tr>";

}else{
$counter = 0;
while($row = mysqli_fetch_assoc($result)){

$oid = $row['OID'];
$uid = $row['UID'];
$check_username = "SELECT UserName FROM accounts WHERE UID = '{$uid}' ";
$result_u = mysqli_query($db,$check_username);
$row_u = mysqli_fetch_assoc($result_u);
$username = $row_u['UserName'];




$odate = $row['ODate'];
$ddate = $row['DDate'];
$dtid = @$row['DTID'];
$status = $row['DStatus'];
$amount = $row['Amount'];

$counter++;


?>



<tr>

<td><?php echo $counter ?></td>

<td><?php echo $username ?></td>
<td><?php echo $odate ?></td>
<td><?php echo $ddate ?></td>
<td><?php if($dtid==""){echo"<a class='btn btn-danger btn-sm' href='ViewOrders.php?oid=$oid'>Select</a>";}else{echo $dtid;} ?></td>

<td><?php if($status=="pending" ){echo"<a class='btn btn-danger btn-sm' href='vieworders.php?receive=$oid' >Click if Order is Received</a>";}else{echo $status;} ?></td>

<td><?php echo"<a class='btn btn-danger btn-sm' href='SelectChefs.php?oid=$oid'>Select</a>"?></td>
<td><?php echo $amount ?></td>


<td><a class="btn btn-danger btn-sm" href="ViewOrders.php?delete=<?php echo $oid ?>">Delete</a></td>



</tr>




<?php


}


}


?>






</table>




















</div>

<div class="clearfix"></div>
</div>

</div>
</div>

<?php include_once "footer.php"; ?>  


<?php }else{ header("Location: logout.php"); } ?>