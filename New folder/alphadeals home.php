<!DOCTYPE html>
<html lang="en-US">

<head>
	<title>Alpha Deals|Home</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- jquery -->
	<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
	<!-- Bootstrap -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<!-- Open sans -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link href="http://getbootstrap.com/examples/carousel/carousel.css" rel="stylesheet">
  <style type="text/css">
    #srch{
      position: fixed;
      right: 0px;
      bottom: 50%;
    }
    .btn-warning{
    background-color: #FFFF00;
    border-color: #FFFF00;
    color: #000000;
    font-weight: bold;
    }
  </style>
</head>

<body style="padding-bottom:0px;">
  <form action="testsrch.php" method="GET">
    <input type="submit" class="btn btn-md btn-warning" value="Search" id="srch">
  </form>
	<div class="container">
		<!-- navbar -->
		<nav class="navbar navbar-default">
			<div class="container-fluid">
    			<div class="navbar-header">
      				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        				<span class="icon-bar"></span>
        				<span class="icon-bar"></span>
        				<span class="icon-bar"></span>                        
      				</button>
      				<a class="navbar-brand" href="#"><img src="Images/Alpha Deals.png" alt="Alpha Deals" width="90" height="60"></a>
    			</div>
    			<div class="collapse navbar-collapse" id="myNavbar">
      				<ul class="nav navbar-nav navbar-right">
      					<li><a href="#"><span class="glyphicon glyphicon-home"></span> Home</a></li>
        				<li><a href="contact_us.html"><span class="glyphicon glyphicon-phone-alt"></span> Contact Us</a></li>
        				<li><a href="sign-up.html"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        				<li><a href="login.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      				</ul>
    			</div>
  			</div>
		</nav>
      
		<!-- categories -->
		<div class="row categ-nav">
      
			<div class="categs col-sm-3 dropdown">
        <a class="dropdown-toggle" width="100%" data-toggle="dropdown" role="button" href="#">ELECTRONICS <span class="caret"></span></a>
        <ul class="dropdown-menu">
        <?php
                  $dir    = 'flipkart/Electronics';
                  $files1 = scandir($dir);
                  $count=count($files1);
                  for ($x=2;$x<$count;$x++) {
                      $name=substr($files1[$x], 0, strpos($files1[$x], '.csv'));
                       $cate=urlencode($name);
                      echo "<li><a href='pr_dis.php?categories={$cate}&fol=Electronics'>$name</a></li>";
                  }
            
        ?>
        </ul>
      </div>
			<div class="categs col-sm-3 ">
        <a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">FASHION <span class="caret"></span></a>
        <ul class="dropdown-menu">
        <?php
                  $dir    = 'flipkart/Fashion';
                  $files1 = scandir($dir);
                  $count=count($files1);
                  for ($x=2;$x<$count;$x++) {
                      $name=substr($files1[$x], 0, strpos($files1[$x], '.csv'));
                     $cate=urlencode($name);
                      echo "<li><a href='pr_dis.php?categories={$cate}&fol=Fashion'>$name</a></li>";
                  }
            
        ?>
        </ul>
      </div>
			<div class="categs col-sm-3 ">
        <a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">HEALTH <span class="caret"></span></a>
        <ul class="dropdown-menu">
                  <?php
                  $dir    = 'flipkart/Health';
                  $files1 = scandir($dir);
                  $count=count($files1);
                  for ($x=2;$x<$count;$x++) {
                      $name=substr($files1[$x], 0, strpos($files1[$x], '.csv'));
                     $cate=urlencode($name);
                      echo "<li><a href='pr_dis.php?categories={$cate}&fol=Health'>$name</a></li>";
                  }
            
        ?>
        </ul>
      </div>
			<div class="categs col-sm-3 ">
        <a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">HOUSEHOLD <span class="caret"></span></a>
        <ul class="dropdown-menu">
               <?php
                  $dir    = 'flipkart/Household';
                  $files1 = scandir($dir);
                  $count=count($files1);
                  for ($x=2;$x<$count;$x++) {
                      $name=substr($files1[$x], 0, strpos($files1[$x], '.csv'));
                     $cate=urlencode($name);
                      echo "<li><a href='pr_dis.php?categories={$cate}&fol=Household'>$name</a></li>";
                  }
            
        ?>

        </ul>
      </div>
		</div>

		<!-- Carousel
    	================================================== -->
    	<div id="myCarousel" class="carousel slide" data-ride="carousel">
      	<!-- Indicators -->
      	<ol class="carousel-indicators">
        	<li data-target="#myCarousel" data-slide-to="0" class=""></li>
        	<li data-target="#myCarousel" data-slide-to="1" class="active"></li>
        	<li data-target="#myCarousel" data-slide-to="2" class=""></li>
      	</ol>
      	<div class="carousel-inner" role="listbox">
        	<div class="item">
          	  <a href="http://www.flipkart.com/search?q=blazers"><img class="first-slide" src="Images/carousel/slider1.png" alt="First slide"></a>
              <!--<div class="container">
            	<div class="carousel-caption">
              		<h1>Example Offer.</h1>
              		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmo tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut.</p>
              		<p><a class="btn btn-lg btn-primary" href="./Carousel Template for Bootstrap_files/Carousel Template for Bootstrap.html" role="button">Learn more</a></p>
            	</div>
          	  </div>-->
        	</div>
        	<div class="item active">
          		<a href="http://www.amazon.in/shoes"><img class="second-slide" src="Images/carousel/slider2.jpg" alt="Second slide"></a>
          		<!--<div class="container">
            		<div class="carousel-caption">
              			<h1>Another example Offer.</h1>
             			<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              			<p><a class="btn btn-lg btn-primary" href="./Carousel Template for Bootstrap_files/Carousel Template for Bootstrap.html" role="button">Learn more</a></p>
            		</div>
          		</div>-->
        	</div>
        	<div class="item">
          		<img class="third-slide" src="Images/carousel/slider4.png" alt="Third slide">
          		<!--<div class="container">
            		<div class="carousel-caption">
              			<h1>Offer three.</h1>
              			<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              			<p><a class="btn btn-lg btn-primary" href="./Carousel Template for Bootstrap_files/Carousel Template for Bootstrap.html" role="button">Learn more</a></p>
            		</div>
          		</div>-->
        	</div>
      	</div>
      	<a class="left carousel-control" href="http://getbootstrap.com/examples/carousel/#myCarousel" role="button" data-slide="prev">
        	<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        	<span class="sr-only">Previous</span>
      	</a>
      	<a class="right carousel-control" href="http://getbootstrap.com/examples/carousel/#myCarousel" role="button" data-slide="next">
        	<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        	<span class="sr-only">Next</span>
      	</a>
    	</div>
    	<!-- /.carousel -->
    	<!-- tiles -->
		<div class="row tiling-top">
			<a href="#"><div class="image-block col-sm-4" style="background:url('Images/image 1.jpg')"></div></a>
			<a href="https://play.google.com/store"><div class="image-block col-sm-4" style="background:url('Images/app.png') no-repeat;background-size:cover;"></div></a>
			<a href="#"><div class="image-block col-sm-4" style="background:url('Images/saree.jpg') no-repeat;background-size:cover;"></div></a>
		</div>
		<div class="row tiling">
			<a href="#"><div class="image-block col-sm-4" style="background:url('Images/legs.jpg') no-repeat;background-size:cover;"></div></a>
			<a href="#"><div class="image-block col-sm-4" style="background:url('Images/image 2.jpg') no-repeat;background-size:cover;"></div></a>
			<a href="http://www.flipkart.com/offers/electronics-sale"><div class="image-block col-sm-4" style="background:url('Images/photo-full.jpg') no-repeat;background-size:cover;"></div></a>
		</div>
		<!-- foot -->
		<div class="row ending1">
			<div class="ends col-sm-4"><a href="#">Follow Us</a></div>
			<div class="ends col-sm-4"><a href="#">Support</a></div>
			<div class="ends col-sm-4"><a href="#">Legal</a></div>
		</div>
		<div class="row ending2">
			<div class="ends col-sm-6"><a href="#">Corporate</a></div>
			<div class="ends col-sm-6"><a href="#">Sites</a></div>
		</div>
	</div>
	<!-- copyrighting -->
	<div id="foot" class="container-fluid">
		<p>&#169 2016 Copyright. Designed and maintained by Alpha Deals Inc.</p>
	</div>

</body>

</html>