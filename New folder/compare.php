<!DOCTYPE html>
<html lang="en-US">

<head>
	<title>Alpha Deals|Compare</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- jquery -->
	<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
	<!-- Bootstrap -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<!-- Open sans -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="compare styles.css">
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

<body>
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
      				<a class="navbar-brand" href="#">Alpha Deals</a>
    			</div>
    			<div class="collapse navbar-collapse" id="myNavbar">
      				<ul class="nav navbar-nav navbar-right">
      					<li><a href="alphadeals home.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
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
		        <a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">ELECTRONICS <span class="caret"></span></a>
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
		<!-- display -->
		<div id="disp" class="container-fluid">
			<?php     if ($_SERVER['REQUEST_METHOD'] == 'POST')
				     {
				       $fir="";$sec="";$thir="";

				        $fir=$_POST['comp'][0];$sec=$_POST['comp'][1];$thir=$_POST['comp'][2];
				       $res=explode("_",$fir);
				       $res1=explode("_",$sec);
				       $res2=explode("_",$thir);
				             

				             
				 }
				 function product_comp($res1){
					       if($res1[0]=="flip"){
							   	        $row=$res1[3];$cou=0;
							   	       if(($handlef = fopen("flipkart/$res1[1]/$res1[2]","r") )!== FALSE)
										{
				                            while (($dataf = fgetcsv($handlef, 10000, ",")) !== FALSE)
				                            {  
				                            	if($cou>0 && $cou==$row){
							           			$x= "<div class='gallery col-sm-4'><a href='{$dataf[6]}' class='thumbnail'>";
					      								$url="{$dataf[3]}";
					      								$img_url=substr($url, 0, strpos($url, ';'));
					      								$x.="<img src="."{$img_url}" ." id='img-prod'>";
					                                    $x.="<p><b>{$dataf[1]}</b></p><hr />";
					                                    $x.="<p><b>{$dataf[8]}</b></p>";
					                                    if ($dataf[5] == 0.0) {
					                                    	$x.="<p style='color:green;'><b>Coming Soon!</b></p>";
					                                    }
					                                    else{
					                                    	$x.="<p><b>Price:</b>{$dataf[5]}</p>";					                                    				                                
						                                    if(strtolower($dataf[10])=="false"){
						                                    	$x.="<p style='color:red;'><b>Out Of Stock</b></p>";
						                                    }
						                                    else{
						                                    	$x.="<p style='color:green;'><b>Available</b></p>";
						                                    }
						                                }
					                                    $x.="<p style='color:purple;'><b>Discription:</b>$dataf[2]</p>";
					                                    $x.="<img src='Images/ALPHA/buyfk.png' style='width:200px;height:150px;'></a></div>";
					                                    echo $x;
					                            }$cou++;	
							           	    }
							
							           }
			      			}if ($res1[0]=="snap") {

			      				 $row=$res1[3];$co=0;
							   	       if(($handles = fopen("snapdeal/$res1[1]/$res1[2]","r") )!== FALSE)
										{ 

				                            while (($datas = fgetcsv($handles, 10000, ",")) !== FALSE)
				                            {  

				                            	if($co>0 && $co==$row){
		                                           $y= "<div class='gallery col-sm-4'><a href='{$datas[4]}' class='thumbnail'>";
		                        					$url="{$datas[5]}";
		                        					$y.="<img src="."{$url}" ." id='img-prod'>";
			                                      $y.="<p><b>{$datas[1]}</b></p><hr />";
			                                      $y.="<p><b>{$datas[3]}</b></p>";
			                                      $y.="<p><b style='color:purple;'>Price:</b>{$datas[11]}</p>";
			                                      if(strtolower($datas[12])=="out of stock"){
			                                        $y.="<p style='color:red;'><b>Out Of Stock</b></p>";
			                                      }
			                                      else{
			                                        $y.="<p style='color:green;'><b>Available</b></p>";
			                                      }
			                                      $y.="<p style='color:purple;'><b>Discription:</b>$datas[2]</p>";
			                                      $y.="<img src='Images/ALPHA/buysd.png' style='width:200px;height:150px;'></a></div>";
			                                      echo $y;
				                            	}$co++;
				                            }
				                    }

			      			    }
			      			}
     ?>
			<div class="row">
			<form action="testsrch.php" method="GET">
				<input type="submit" class="btn btn-md btn-warning" id="srch" value="Search">
			</form>
			   <?php
			       product_comp($res);
			       product_comp($res1);
			       product_comp($res2);
			   	 ?>
				
				
			</div>
		</div>
	</div>
	<!-- copyrighting -->
	<div id="foot" class="container-fluid">
		<p>&#169 2016 Copyright. Designed and maintained by Alpha Deals Inc.</p>
	</div>
</body>

</html>