              <?php

                    function access($y){
                          if (($handle = fopen($y,"r")) !== FALSE)
                          {
                            while (($data = fgetcsv($handle, 10000, ",")) !== FALSE)
                            {
                                   if($cou>0)
                                  {   
                                        $j=0;
                                        $prod[$i][$j++]=$data[1];

                                        $url="{$data[3]}";
                                        $img_url=substr($url, 0, strpos($url, ';'));
                                        if($img_url==""||$img_url==" ")
                                        {
                                              $prod[$i][$j++]="image_not_available.jpeg";
                                        }
                                        else{
                                              $prod[$i][$j++]=$img_url;
                                        }

                                        $prod[$i][$j++]=$data[8];
                                        if(strtolower($data[10])=="false")
                                        {
                                                  $prod[$i][$j++]="Out Of Stock";
                                                  $prod[$i][$j]="red";
                                        }
                                        else
                                        {
                                                $prod[$i][$j++]="Available";
                                                $prod[$i][$j]="green";
                                        }
                                        
                                        $i++;
                                  }
                                   if($cou==0){$cou=1;}        
                            }
                               
                        }
                         return $prod;
                    }


                if($_GET["categories"]!="" &&$_GET["fol"]!="")
                {

                        $categories=$_GET["categories"];$fol=$_GET["fol"];
                        $prod;
                        $cat=urldecode($categories);
                        $cat=$cat.".csv"; 
                          $page=1;
                          $cou=0;$i=0;
                          $flip="flipkart/$fol/$cat";
                          $prod=access($flip);
                         
                  }
                  function display($x,$j){
                    $count=count($x);$co=1;
                       for($i=0;$i<$count;$i++)
                        {

                            
                             if($co==1 || ($co%4==1)){
                                echo "<div class='row'>";
                              }
                                $z= "<div class='gallery col-sm-3'><a href='#' class='thumbnail'>";
                                $z.="<div id='prod'><img src="."{$x[$i][1]}" ." id='img-prod'></div>";
                                $z.="<p><b>{$x[$i][0]}</b></p><hr />";
                                $z.="<p><b>{$x[$i][2]}</b></p>";
                                $z.="<p style='color:{$x[$i][4]};'><b>{$x[$i][3]}</b></p>";
                                $z.="<img src='Images/ALPHA/buyfk.png' style='width:100px;height:100px;'></a></div>";
                                echo $z;
                             if(($co%4==0)){
                               echo "</div>";
                              } 
                              $co++;
                  }
                }
                //print_r($prod);
              ?>
<!DOCTYPE html>
<html lang="en-US">

<head>
	<title>Alpha Deals|Search</title>
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
	.prod{
			width:150px;
			height:150px;
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
      					<li><a href="#"><span class="glyphicon glyphicon-home"></span> Home</a></li>
        				<li><a href="#"><span class="glyphicon glyphicon-phone-alt"></span> Contact Us</a></li>
        				<li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        				<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
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
                      echo "<li><a href='product.php?categories={$cate}&fol=Electronics'>$name</a></li>";
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
                      echo "<li><a href='product.php?categories={$cate}&fol=Fash'>$name</a></li>";
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
                      echo "<li><a href='product.php?categories={$cate}&fol=Health'>$name</a></li>";
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
                      echo "<li><a href='product.php?categories={$cate}&fol=Household'>$name</a></li>";
                  }
            
        		?>
        		</ul>
      		</div>
		</div>

		<!-- display -->
		<div id="disp" class="container-fluid">

      <?php 
      $j=1;
        display($prod,$j++);

      ?>

			<!--<div class="row">
				<div class="col-sm-3"><img src="Images/cont1.jpg" /></div>
				<div class="col-sm-3"><img src="Images/cont1.jpg" /></div>
				<div class="col-sm-3"><img src="Images/cont1.jpg" /></div>
				<div class="col-sm-3"><img src="Images/cont1.jpg" /></div>
			</div>
			<div class="row">
				<div class="col-sm-3"><img src="Images/cont1.jpg" /></div>
				<div class="col-sm-3"><img src="Images/cont1.jpg" /></div>
				<div class="col-sm-3"><img src="Images/cont1.jpg" /></div>
				<div class="col-sm-3"><img src="Images/cont1.jpg" /></div>
			</div>-->
		</div>
	</div>
	<!-- copyrighting -->
	<div id="foot" class="container-fluid">
		<p>&#169 2016 Copyright. Designed and maintained by Alpha Deals Inc.</p>
	</div>

</body>

</html>