
<?php
session_start();
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
    .navbar{
     background-image: url(img/p.jpg);
     background-repeat:no-repeat;
     background-size:100%;
    }
    body {
      background-image:url(img/32287b.png);
      } 
       
        * {
  box-sizing: border-box;
}

.row {
  display: flex;
}

/* Create two equal columns that sits next to each other */
.column1 {
  flex: 40%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}
.column2 {
  flex: 60%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}
 .carousel-control.right, .carousel-control.left {
   background-image: none;
   color: #f4511e;
  }
  .carousel-indicators li {
    border-color: #f4511e;
  }
  .carousel-indicators li.active {
    background-color: #f4511e;
  }
  .item h4 {
    font-size: 19px;
    line-height: 1.375em;
    font-weight: 400;
    font-style: italic;
    margin: 70px 0;
  }
  .item span {
    font-style: normal;
  }
    </style>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   
  </head>



<!-- NAVBAR
================================================== -->
  <body  >
	
  <div class="navbar"   >
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
        </div>
 <span style="background-image:url(32287b.png)">

  <div id="myCarousel" class="carousel slide" data-ride="carousel"  style="border-radius:0px 90px 0px 90px" >
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="img/carousel-5.png" style="width:100%;">
      </div>

      <div class="item">
        <img src="img/carousel-2.jpg"  style="width:100%;">
      </div>
    
      <div class="item">
        <img src="img/carousel-7.jpg" style="width:100%;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
      </span>
   <br><Br>
      <div class="row">
  <div class="column1" >
  <img src="img/keto.jpg"  style="width:100%;height:100%;border-radius:10px 50px">
  </div>
  <div class="column2" >
 <i><b><h1 style="color:white">About Us ....</h1></b></i><br>
  
    <p style="color:whitesmoke;font-size:20px">We will provide a number of diet plans provided by different verified nutritionists for different health conditions. A healthy diet is essential for good health and nutrition. It protects you against many chronic noncommunicable diseases, such as heart disease, diabetes and cancer. Diet Plan is essential for different health related issues such as reducing weight, gaining weight, diabetes, blood pressure and cholesterol etc. Many people are looking for a best diet plan according to their health conditions but fail to find a perfect one. </p>
  </div>
</div>

<br><Br>
<div>
  <Center> <h1 style="color:white">Our Diet Plans According to Your Health Conditions</h1><br><Br>
 </center>  <a href="#"><img src="img/apple.png"  style="width:210px;height:200px;border-radius:90px 90px 90px 90px"> </a>
  <a href="#"><img src="img/weightgain.png"  style="width:210px;height:200px;border-radius:90px 90px 90px 90px"></a>
  <a href="#"> <img src="img/d.png"  style="width:210px;height:200px;border-radius:90px 90px 90px 90px"></a>
  <a href="#"><img src="img/bp.png"  style="width:220px;height:200px;border-radius:90px 90px 90px 90px"></a>
  <a href="#"><img src="img/c.png"  style="width:210px;height:200px;border-radius:90px 90px 90px 90px"></a>
  <a href="#"><img src="img/th.png"  style="width:210px;height:200px;border-radius:90px 90px 90px 90px"></a>

 <a href="#"><img src="img/th.png"  style="width:210px;height:200px;border-radius:90px 90px 90px 90px"></a>

</div>
<br><br>
<div >
  <table class="table table-hovered" ><tr> <b><td > <a href="#" class="btn btn-warning" style="color:black" >Weight Loss</span></a> </td>
  <td> <a href="#" class="btn btn-warning" style="color:black">Weight Gain</a> </td><td> <a href="#" class="btn btn-warning" style="color:black">Diabetics</a> </td><td> <a href="#" class="btn btn-warning" style="color:black">Heart Problems</a> </td><td> <a href="#" class="btn btn-warning" style="color:black">Cholestrol</a> </td><td> <a href="#" class="btn btn-warning" style="color:black">Thyroid Glands </a> </td><b></tr>
</table></div><br><Br>
<img src="img/banner1.jpg" style="border-radius:10px 50px" width="100%">
<br><br>
<div>

<center><h2 style="color:white">What our customers say</h2></center>
  <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <h4 style="color:white">"This company is the best. I am so happy with the result!"<br><span>Michael Roe, Vice President, Comment Box</span></h4>
      </div>
      <div class="item">
        <h4 style="color:white">"One word... WOW!!"<br><span>John Doe, Salesman, Rep Inc</span></h4>
      </div>
      <div class="item">
        <h4 style="color:white">"Could I... BE any more happy with this company?"<br><span>Chandler Bing, Actor, FriendsAlot</span></h4>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>


</div>
<div class="container-fluid bg-grey" height="30%">
  <h2 class="text-center" style="color:white">CONTACT</h2>
  <div class="row">
    <div class="col-sm-5">
      <p style="color:white">Contact us and we'll get back to you within 24 hours.</p>
      <p style="color:white"><span class="glyphicon glyphicon-map-marker"></span> Chicago, US</p>
      <p style="color:white"><span class="glyphicon glyphicon-phone"></span> +00 1515151515</p>
      <p style="color:white"><span class="glyphicon glyphicon-envelope"></span> myemail@something.com</p>
    </div>
    <div class="col-sm-7">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
      <div class="row">
        <div class="col-sm-12 form-group">
          <button class="btn btn-success pull-right" type="submit">Send</button>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="footer">
  <!-- Add font awesome icons -->

 <center> <p style="color:white;">Prototype For CS619 :Online Diet Plan Finder</p></center>
 <style>
    .fa {

  font-size: 20px;
  width: 30px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
}

.fa:hover {
    opacity: 0.7;
}

.fa-facebook {
  background: #3B5998;
  color: white;
  border-radius:100px 100px 100px 100px;
}

.fa-twitter {
  background: #55ACEE;
  color: white;
  border-radius:100px 100px 100px 100px;
}

.fa-google {
  background: #dd4b39;
  color: white;
  border-radius:100px 100px 100px 100px;
}

.fa-linkedin {
  background: #007bb5;
  color: white;
  border-radius:100px 100px 100px 100px;
}

.fa-youtube {
  background: #bb0000;
  color: white;
  border-radius:100px 100px 100px 100px;
}
  </style>
 <a href="#" class="fa fa-facebook"></a>
<a href="#" class="fa fa-twitter"></a>
<a href="#" class="fa fa-google"></a>
<a href="#" class="fa fa-linkedin"></a>
<a href="#" class="fa fa-youtube"></a>
 <ul class="nav nav-pills navbar-right">
 <?php if(isset($_SESSION['UID'])) { ?>
                                                      <li><a style="color:black" class="btn btn-default" href="index.php" >Home</a></li>
                                                    
                                                    <li><a href="logout.php" class="btn btn-default" >Logout</a></li>
                                              
                                             <?php }   else { ?> 
                                              <li><a style="color:black" class="btn btn-default" href="index.php" >Home</a></li>
                                                    <li><a href="signin.php" class="btn btn-default" >Signin</a></li>
                                                    <li><a href="register.php" class="btn btn-default" >SignUp</a></li>
                                                    <li><a href="search.php" class="btn btn-default" >Search</a></li>
                                              
                                             <?php }?> 
                
                     

</ul>
</div>
	</body>
</html>
