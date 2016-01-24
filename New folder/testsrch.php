<!DOCTYPE html>
<html>

	<head>
		<title>Alpha Deals|Search</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- jquery -->
		<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
		<!-- Bootstrap -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
		<!-- Font Awesome -->
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
		<!-- Open sans -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="testsrch.css">
		<style>
  #atc{
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
	      				<a class="navbar-brand" href="alphadeals home.php"><img src="Images/Alpha Deals.png" alt="Alpha Deals" width="90" height="60"></a>
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
			<div class="box">
				<div class="container-4">
					<form name="form1" method="POST" action="testsrch.php">
						<select name="scat" class="search">
							<option>-- Select Category--</option>
							<?php
								$str=file_get_contents("http://affiliate-feeds.snapdeal.com/feed/82870.json");
								$str=json_decode($str,true);
								$props=array_keys($str['apiGroups']['Affiliate']['listingsAvailable']);
								for ($i=0; $i <59 ; $i++) { 
									echo "<option>".str_ireplace("_"," ",$props[$i])."</option>";
								}
							?>
						</select>
						<input type="text" class="search" name="sbox" placeholder="Search" required>
						<button name="srch" type="submit" class="icon"><i class="fa fa-search"></i></button>
					</form>
				</div>
			</div>
			<!--display-->
			<div class="container-fluid" id="disp">
			<form method="POST" action="search_compare.php" name="srchcmp">	
			<input type="submit" class="btn btn-md btn-warning" id="atc" value="Compare">
			<?php 
				function display()
				{
					if ($_POST['scat']!='-- Select Category--') {
						echo "<p style='color:blue;font-size:20px;'><b>You searched for:  </b><span style='color:#000000;'>".$_POST['sbox']."</span></p>";
						flipdisp();
						snapdisp();
						//shimpdisp();	
					}
					else{
						echo "<p style='color:#000000;'><b>Please select a category...</b></p>";
					}
				}
				if(isset($_POST['srch'])){
	   				display();
				}
				function flipdisp()
				{
					$val="";
					include "clusterdev.flipkart-api.php";
					$flipkart = new \clusterdev\Flipkart("thealphad", "73ae7f0c01204fe6b3cec82988e05bd3", "json");
					$cat=$_POST['scat'];
					$v=$_POST['sbox'];
					$uv=urlencode($v);
					$search_url = 'https://affiliate-api.flipkart.net/affiliate/search/json?query='.$uv.'&resultCount=8';
					$searchres=$flipkart->call_url($search_url);
					$searchres=json_decode($searchres);
					for ($i=0; $i < 8; $i++) { 
						if($i==0||$i%4==0){
							echo '<div class="row">';
						}
						$title=($searchres->productInfoList[$i]->productBaseInfo->productAttributes->title);
						$sellingPrice=($searchres->productInfoList[$i]->productBaseInfo->productAttributes->sellingPrice->amount);
						$imgUrl=($searchres->productInfoList[$i]->productBaseInfo->productAttributes->imageUrls->{'200x200'});
						$prodUrl=($searchres->productInfoList[$i]->productBaseInfo->productAttributes->productUrl);
						$avlblty=($searchres->productInfoList[$i]->productBaseInfo->productAttributes->inStock);
						$description=($searchres->productInfoList[$i]->productBaseInfo->productAttributes->productDescription);
						$val.="flip_".$title."_".$sellingPrice."_".$imgUrl."_".$prodUrl."_".$avlblty."_".$description;
						$x= '<div class="gallery col-sm-3"><a href="'.$prodUrl.'" class="thumbnail">';
						$x.="<img src='".$imgUrl."'>";
						$x.="<p><b>$title</b></p><hr/>";
						$x.="<p><b>$sellingPrice</b></p>";
						if ($avlblty=="true") {
							$x.="<p style='color:green;'><b>Available</b></p>";
						}
						else{
							$x.="<p style='color:red;'><b>Out of Stock</b></p>";
						}
						$x.="<p style='color:blue;margin-right:6px;'>Add To Compare:<input style='margin-left:4px;margin-top:6px;' type='checkbox' name='comp[]' value='{$val}'></p>";
	                    
						$x.="<img src='Images/ALPHA/buyfk.png' style='width:100px;height:100px;'></a></div>";
		    			
		    			echo $x;
		    			if ($i%4==3) {
		    				echo "</div>";
		    			}
					}
				}
				function snapdisp()
				{
					$val="";
					$scat=$_POST['scat'];
					$cat=str_ireplace(" ","_",$scat);
					$keyword=$_POST['sbox'];
					$str=file_get_contents("http://affiliate-feeds.snapdeal.com/feed/82870.json");
					$str=json_decode($str,true);
					$props=array_keys($str['apiGroups']['Affiliate']['listingsAvailable']);
					for ($i=0; $i <60 ; $i++) { 
						if ($cat== $props[$i]) {
								$str=file_get_contents("http://affiliate-feeds.snapdeal.com/feed/82870.json");
								$str=json_decode($str);
								$url=($str->apiGroups->Affiliate->listingsAvailable->$props[$i]->listingVersions->v1->get);
								//echo "URL:"."$url"; //To check the url is pulled correctly or no
								$ch = curl_init();
								curl_setopt($ch, CURLOPT_URL, $url);
								curl_setopt(
					    			$ch, CURLOPT_HTTPHEADER,
					    			array(
					        			'Snapdeal-Affiliate-Id:82870',
					        			'Snapdeal-Token-Id:1ddc458df9e022b24bf207fc673b9d',
					        			'Accept:application/json'
					    			)
								);
								curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
								$response = curl_exec($ch);
								curl_close($ch);
								$data = json_decode($response, true);
								$products = $data['products'];
								$count=0;
								for($i=0;$i<500;$i++){
									$title = ($products[$i]['title']);
									$pos=stripos($title, $keyword);
									if ($pos !== false) {
										
										$sellingPrice=($products[$i]['offerPrice']);
										$imgUrl=($products[$i]['imageLink']);
										$prodUrl=($products[$i]['link']);
										$avlblty=($products[$i]['availability']);
										$description=($products[$i]['description']);
										$val.="snap_".$title."_".$sellingPrice."_".$imgUrl."_".$prodUrl."_".$avlblty."_".$description;
										if($count==0||$count%4==0){
											echo '<div class="row">';
										}
										
										$x= '<div class="gallery col-sm-3"><a href="'.$prodUrl.'" class="thumbnail">';
										$x.="<img src='".$imgUrl."'>";
										$x.="<p><b>$title</b></p><hr/>";
										$x.="<p><b>$sellingPrice</b></p>";
										if ($avlblty=="in stock") {
											$x.="<p style='color:green;'><b>Available</b></p>";
										}
										else{
											$x.="<p style='color:red;'><b>Out of Stock</b></p>";
										}
										$x.="<p style='color:blue;margin-right:6px;'>Add To Compare:<input style='margin-left:4px;margin-top:6px;' type='checkbox' name='comp[]' value='{$val}'></p>";
	                                   
										$x.="<img src='Images/ALPHA/buysd.png' style='width:100px;height:100px;'></a></div>";
						    			echo $x;

						    			if ($count%4==3) {
						    				echo "</div>";
						    			}
									}
									else{
										continue;
									}
									$count++;
								}
								echo "</div>";
								if ($count==0) {
									echo "<b>We could not find any products matching your search in the given category from snapdeal.</b>";
								}
							}	
					}
					echo "</form>";
				}
				function shimpdisp()
				{
					$cats = array("Gaming"=>"1","Mobiles and Tablets"=>"10","Computer"=>"39","Eyewear"=>"95","Home Entertainment"=>"96","Sports and Fitness"=>"130","Pens and Stationery"=>"314","Clothing"=>"371","Home Decor"=>"646","Beauty and Personal Care"=>"714","Bags, Wallets and Belts"=>"907","Watches"=>"948","Home and Kitchen"=>"1003","Cameras and Accessories"=>"1028","Baby Care"=>"1048","Toys and School Supplies"=>"1078","Jewellery"=>"1204","Footwear"=>"1285","Auto Parts"=>"1528","Hardware and Accessories"=>"3262","Pet Supplies"=>"3918","Musical Instruments"=>"4083","Books"=>"5266","Men"=>"10625","Baby and Kids"=>"10628");
					print_r($cats);
					echo $cats['Gaming'];
					$cat=$_POST['scat'];
					$query=$_POST['sbox'];
					$shimpkey= "f0d8a45fd25be602382c8d23d0908678";
					$url="http://www.shimply.com/api/search/list?query=".$query."&category_id=".$cid."&key=".$shimpkey;
					for ($i=0; $i <24 ; $i++) { 
						
					}
				}
			?>
			</div>
		</div>
		<!-- copyrighting
		<div id="foot" class="container-fluid">
			<p>&#169 2016 Copyright. Designed and maintained by Alpha Deals Inc.</p>
		</div>-->
	</body>

</html>