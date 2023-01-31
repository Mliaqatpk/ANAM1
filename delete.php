<?php
if(isset($_GET['SID'])){
  $SID=$_GET['SID'];
  $conn=mysqli_connect('localhost','root','','lahore');
  $sql="delete from services where SID='$SID'; ";
  $result=mysqli_query($conn,$sql);
if($result){
  Header("location:admin.php");
}
else{
  echo "oops something went wrong";
}
  }

?>
<?php
if(isset($_GET['SID_info'])){
  $SID_info=$_GET['SID_info'];
  $conn=mysqli_connect('localhost','root','','lahore');
  $sql="delete from services_info where SID_info='$SID_info'; ";
  echo $sql;
  $result=mysqli_query($conn,$sql);
if($result){
  Header("location:admin.php");
}
else{
  echo "oops something went wrong";
}
  }

?>