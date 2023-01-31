<?php
if(isset($_GET['accept'])){
  $UID=$_GET['accept'];
 
  
 $connection=mysqli_connect('localhost','root','','diet');
 $sql="update user SET status='accepted' where UID='$UID';";

 $result=mysqli_query($connection,$sql);
 if($result){

  header("location:manage_users.php");
    
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

header("location:manage_users.php");
  
   }
}

?>
