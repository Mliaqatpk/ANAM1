<?php
session_start();
?>

 <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Diet plan finder</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
        
       
        .navbar{
     background-image: url(img/p.jpg);
     background-repeat:no-repeat;
     background-size:100%;
    }
  
        .form-control{
          border-radius:20px;
        }
    </style>

  
   
  </head>



<!-- NAVBAR
================================================== -->
  <body  >
	
<div class="navbar"   >
     <header><b><a href="index.php"> <h1 style="text-shadow: 2px 2px blue;color:white" ><img src="img/logo1.png" width="70px" height="70px"> Online Diet Plan Finder</h1></a></header> 
</b>
    

                     <ul class="nav nav-pills navbar-right">
                     <li><a style="border-radius:10px" class="btn btn-default"  href="index.php" >Home</a></li>
                                                    <li><a style="border-radius:10px" href="signin.php" class="btn btn-default"   >Signin</a></li>
                                                    <li><a style="border-radius:10px" href="register.php" class="btn btn-default"  >SignUp</a></li>
                                                    <li><a style="border-radius:10px" href="search.php" class="btn btn-default">Search</a></li>
                           
                            </ul>
        </div>
        <div class="container">
			
		
                                    <center>
                                    <h2>Please Login</h2>
                                    <form class="intro-newslatter" method="post" style="width:300px">
                                       <br> <input type="text" placeholder="Enter  registered UserName" name="username"class="form-control" required>
                                       <br> <input type="password"  placeholder="Password" name="password"class="form-control" required>
                                   
						<br><input type="submit" class="btn btn-info" style="width:230px;border-radius:30px" name="signin" value="Login">
                                                <a href="register.php">Register</a>
					</form>
				</div>
                          
			</div>
		</div>
	</section>
  <?php
                            if(isset($_POST['signin'])){
                                $username=$_POST['username'];
                             $password=$_POST['password'];
                             $db = mysqli_connect('localhost','root','',"ANAM");
                             $sql="SELECT * FROM user WHERE username='$username' and password='$password' and status='accepted' ";
                          
                             $result=mysqli_query($db,$sql);
                         if($result){
    
$row = mysqli_fetch_assoc($result);
$_SESSION['login']=true;

$_SESSION['UID']=$row['UID'];


@$_SESSION['email']=$mail;


$_SESSION['type']=$row['type'];
$type=$row['type'];

                          
switch($type)
{ case'admin':
                         
                                           header('location: admin.php');
   
break;
case'user':
                         
                                           header('location: user.php');
   
break;

case'nutritionist':
                         
  header('location: nutritionist.php');

break;

                                }
                  
}
              
else 
{
  echo "<p class='alert alert-danger'>Wrong Email OR Password OR admin not accept your request.</p>";
  
             
                              }

                              } ?>

     </center>
	</body>
</html>
