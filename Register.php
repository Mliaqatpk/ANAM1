
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Diet Plan Finder</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
       
        th{
            background-color:skyblue;
            color:black;
        }
        * {
          box-sizing: border-box;
        }
        .navbar{
     background-image: url(img/p.jpg);
     background-repeat:no-repeat;
     background-size:100%;
    }
  
        /* Create two equal columns that floats next to each other */
        .column {
          float: left;
          width: 50%;
          padding: 10px;
          height: 500px; /* Should be removed. Only for demonstration */
        }
        
        /* Clear floats after the columns */
        .row:after {
          content: "";
          display: table;
          clear: both;
        }
        body {
      background-image:url(img/32287b.png);
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
      <br><br>
      <div class="row">
  <div class="column" style="background-color:whitesmoke;border-radius:50px 50px;padding:20px">
  <br><br>
    <h3>To Register As a User</h3><br>
     
<form method="post" >

  <label>Name</label>
<input type="text" name="name" class="form-control" placeholder="Your Full  Name"  minlength="3" maxlength="100"  onkeydown="return /[a-zA-Z]/i.test(event.key)"    title="min 3 and max 100 characters allowed (only alphabets) " required>
      
     <input type="text" name="username" class="form-control" placeholder="Your User  Name"  minlength="8" maxlength="100"  onkeydown="return /[a-zA-Z0-9-]/i.test(event.key)"  title="min 8 and max 100 characters allowed (only alphabets and numbers with no special Character) " required>
      
<input type="password" name="password" class="form-control" placeholder="Your Password "minlength="8" maxlength="20" title="min 8 and max 20 characters allowed  " required>

    <input type="email" name="email" class="form-control" placeholder="Your Email" title="enter valid email address" required>
    <input type="number" name="phoneno" class="form-control"  title="enter valid PhoneNo" placeholder="0000-00-00-000" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}-[0-9]{3}" required>
   
    <input type="submit" class="btn btn-info" name="submit" value="Sign-Up" style="width:230px;border-radius:30px" >
    <input type="reset" class="btn btn-info" name="reset" value="Reset" style="width:230px;border-radius:30px" >



    </form>


    <br><br>

    <?php 


if(isset($_POST['submit'])){


$email = $_POST['email'];

$username = $_POST['username'];
$name = $_POST['name'];
$contact = $_POST['phoneno'];
$password = $_POST['password'];

$db = mysqli_connect('localhost','root','',"diet");

$register_query = "INSERT INTO user (name,username,phone,email,password,type,status) VALUES ('{$name}','{$username}','{$contact}','{$email}','{$password}','user','pending')";

$register_result = mysqli_query($db,$register_query);

   if($register_result){

   echo "<p class='alert alert-success'>User Registered Successfully</p>";
   
    }else{
     
      echo "<p class='alert alert-danger'>Try Again Please</p>";
    
    }


  }






?>

</div>
<div class="row">
  <div class="column" style="background-color:whitesmoke;border-radius:50px 50px;padding:20px">
  <br><br>
  <h3>To Register As a Nutritionist</h3><br>
     
     <form method="post" enctype= "multipart/form-data">
    Upload Picture <input type="file" name="image" class="form-control" required>
          
     <input type="text" name="name" class="form-control" placeholder="Your Full  Name"  minlength="3" maxlength="100"  onkeydown="return /[a-zA-Z]/i.test(event.key)"    title="min 3 and max 100 characters allowed (only alphabets) " required>
           
          <input type="text" name="username" class="form-control" placeholder="Your User  Name"  minlength="8" maxlength="100"  onkeydown="return /[a-zA-Z0-9-]/i.test(event.key)"  title="min 8 and max 100 characters allowed (only alphabets and numbers with no special Character) " required>
           
     <input type="password" name="password" class="form-control" placeholder="Your Password "minlength="8" maxlength="20" title="min 8 and max 20 characters allowed  " required>
     
         <input type="email" name="email" class="form-control" placeholder="Your Email" title="enter valid email address" required>
         <input type="number" name="phoneno" class="form-control"  title="enter valid PhoneNo" placeholder="0000-00-00-000" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}-[0-9]{3}" required>
          
         <input type="text" name="qualification" class="form-control" placeholder="Your Qualification" required>
         <input type="number" name="experience" class="form-control" placeholder="Experience" required>
         <input type="text" name="intro" class="form-control" placeholder="your introduction" required>

         <input type="submit" class="btn btn-info" name="submit1" value="Sign-Up" style="width:230px;border-radius:30px" >
         <input type="reset" class="btn btn-info" name="reset" value="Reset" style="width:230px;border-radius:30px" >
     
     
     
         </form>
     
         <br><br>
     
     
         <?php 
     
     
     if(isset($_POST['submit1'])){
     
     
     $email = $_POST['email'];
     
     $username = $_POST['username'];
     $name = $_POST['name'];
     $contact = $_POST['phoneno'];
     $password = $_POST['password'];
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
     $db = mysqli_connect('localhost','root','',"diet");
     
     $register_query = "INSERT INTO user (name,username,phone,email,password,type,status,pic,intro,qualification,experience) VALUES ('{$name}','{$username}','{$contact}','{$email}','{$password}','nutritionist','pending','{$image}','{$intro}','{$qualification}','{$experience}')";

     $register_result = mysqli_query($db,$register_query);
     
        if($register_result){
     
        echo "<p class='alert alert-success'>Nutritionist account created successfully.wait for approval to access your account</p>";
        
         }else{
          
           echo "<p class='alert alert-danger'>Try Again Please</p>";
         
         }
     
     
       }
     
     
     
     
     
     
     ?>
     
</div>
</div>
</body>
</html>