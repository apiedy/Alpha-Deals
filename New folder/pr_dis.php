<!DOCTYPE html>
<html lang="en-US">

<head>
	<title>Alpha Deals|Categories</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- jquery -->
	<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
	<!-- Bootstrap -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<!-- Open sans -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="prod styles.css">
	<style>
  #atc{
    position: fixed;
    right: 0px;
    bottom: 50%;
  }
  #srch{
    position: fixed;
    right: 0px;
    bottom: 60%;
  }
  .btn-warning{
    background-color: #FFFF00;
    border-color: #FFFF00;
    color: #000000;
    font-weight: bold;
  }
	.prod{
			width:150px;
			height:150px;
     }
	</style>
  <script type="text/javascript">
            jQuery(function(){
              var max = 3;
              var checkboxes = $('input[type="checkbox"]');

              checkboxes.change(function(){
                  var current = checkboxes.filter(':checked').length;
                  checkboxes.filter(':not(:checked)').prop('disabled', current >= max);
              });
          });
</script>

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
      				<a class="navbar-brand" href="#"><img src="Images/Alpha Deals.png" alt="Alpha Deals" width="90" height="60"></a>
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
      <form action="testsrch.php" method="GET">
        <input type="submit" class="btn btn-md btn-warning" value="Search" id="srch">
      </form>
      <form method='POST' action='compare.php' name='product_compare'>
        <input type="submit" class="btn btn-md btn-warning" value="Compare" id="atc" name="comp_butt">
      				<?php
                     if($_GET["categories"]!="" &&$_GET["fol"]!=""){

      					$categories=$_GET["categories"];$fol=$_GET["fol"];
      					$cat=urldecode($categories);
      					$cat=$cat.".csv"; 
                $s=1;$f=1;
      				    $cou=0;
      				   if (  (($handlef = fopen("flipkart/$fol/$cat","r")) !== FALSE) && (($handles = fopen("snapdeal/$fol/$cat","r")) !== FALSE)){
      							while ((($dataf = fgetcsv($handlef, 10000, ",")) !== FALSE) && (($datas = fgetcsv($handles, 10000, ",")) !== FALSE) ){
      								
      								if($cou>0)
      								{
      									
      									if($cou==1 || ($cou%2==1)){
      										echo "<div class='row'>";
      									}
	      								$x= "<div class='gallery col-sm-3'><a href='{$dataf[6]}' class='thumbnail'>";
	      								$url="{$dataf[3]}";
	      								$img_url=substr($url, 0, strpos($url, ';'));
	      								$x.="<img src="."{$img_url}" ." id='img-prod'>";
	                                    $x.="<p><b>{$dataf[1]}</b></p><hr />";
	                                    $x.="<p><b>{$dataf[8]}</b></p>";
                                      $x.="<p><b>Price:</b>{$dataf[5]}</p>";
	                                    if(strtolower($dataf[10])=="false"){
	                                    	$x.="<p style='color:red;'><b>Out Of Stock</b></p>";
	                                    }
	                                    else{
	                                    	$x.="<p style='color:green;'><b>Available</b></p>";
	                                    }
                                      $val="flip_".$fol."_".$cat."_".$f;
                                      $x.="<p style='color:blue;margin-right:6px;'>Add To Compare:<input style='margin-left:4px;margin-top:6px;' type='checkbox' name='comp[]' value='{$val}'></p>";
	                                    $x.="<img src='Images/ALPHA/buyfk.png' style='width:200px;height:150px;'></a></div>";
	                                    echo $x;$f++;

                      $y= "<div class='gallery col-sm-3'><a href='{$datas[4]}' class='thumbnail'>";
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
                                      $val="snap_".$fol."_".$cat."_".$s;
                                      $y.="<p style='color:blue;margin-right:6px;'>Add To Compare:<input style='margin-left:4px;margin-top:6px;' type='checkbox' name='comp[]' value='{$val}'></p>";
                                      $y.="<img src='Images/ALPHA/buysd.png' style='width:200px;height:150px;'></a></div>";
                                      echo $y;$s++;
      									if(($cou%2==0)){
      										echo "</div>";
      									}                                	
                                    }
                                   $cou++;
                                }
                        }
                        echo "</form>";
                    }
      				?>

		</div>
	</div>
	<!-- copyrighting -->
	<div id="foot" class="container-fluid">
		<p>&#169 2016 Copyright. Designed and maintained by Alpha Deals Inc.</p>
	</div>

</body>

</html>