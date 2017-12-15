<!DOCTYPE html>
<html>

<head>
	<title></title>
</head>
<link rel="stylesheet" href="css/bookform.css" type="text/css">

<body>
	<div class="hero1">
		<div class="navigation">
			<header style="border-bottom: 1px solid rgba(255, 255, 255, 0.2); padding: 50px 0px;">
				<div class="head-content">
					<div class="logo">
						<a href="index.php">
							<img src="img/logo.png"  alt="party-logo"> </a>
							<a href="dash_admin.php"> <span style="color: #FF5274"> General </span></a> > <span style="color: #FF5274">Book Party </span>

							<ul class="member-actions" style="top: 41px;">
								<li>
									<a href="dash_general.php" class="btn-pink btn-small">BACK</a>
								</li>
							</ul>
						</div>
					</div>
				</header>
			</div>
		</div>


		<?php 
		/*establishing a connection*/
		$hostname = "localhost";
		$username = "root";
		$password = "";
		$dbname = "db_romisha_childrenparty4u";
		$connection = new mysqli($hostname, $username, $password, $dbname);

		if(isset($_GET['book'])){
			$bid=$_GET['book'];

			if (!isset($_SESSION['username'])){
				session_start();
				$uid=$_SESSION['userid'];		
				$country_code=$_SESSION['country'];		
			}
		}

		$query="SELECT * FROM tbl_partyinfo WHERE party_id='$bid'";
		if(!$result=$connection->query($query)){
			echo $connection->error;
		}
		$data=$result->fetch_assoc();
		$uidd = $data['party_id'];
		$party_name = $data['party_name'];
		$party_desc =$data['party_desc'];
		$cost_per_child =$data['cost_per_child'];
		$length_of_party =$data['length_of_party'];
		$num_of_children =$data['num_of_children'];
		$services =$data['services'];
		

		function convertCurrency($amount, $from, $to){
			$url  = "http://www.google.com/finance/converter?a=$amount&from=$from&to=$to";
			$data = file_get_contents($url);
			preg_match("/<span class=bld>(.*)<\/span>/",$data, $converted);
			$converted = preg_replace("/[^0-9.]/", "", $converted[1]);
			return round($converted, 3);
		}  



		$price = $data['cost_per_child'];
		if ($country_code==1){
			$currency = "EUR";
							 $newcurrency= convertCurrency($price, "GBP", $currency); // EUR
							 ?>
							 <script type="text/javascript">
							 	function calculatePrice(){
							 		var costPerChild=<?php echo $newcurrency ?>;
							 		var numOfChild=document.getElementById('noa').value;
							 		var totalCost= costPerChild * numOfChild ;

							 		document.getElementById('toc').value= ("€"+totalCost);

							 	}

							 </script>
							 <?php
							}
							else if($country_code==3)
							{
								$currency= "USD";
						 $newcurrency=  convertCurrency($price, "GBP", $currency); // USD
						 ?>
						 <script type="text/javascript">
						 	function calculatePrice(){
						 		var costPerChild=<?php echo $newcurrency ?>;
						 		var numOfChild=document.getElementById('noa').value;
						 		var totalCost=costPerChild * numOfChild ;

						 		document.getElementById('toc').value= ("$"+totalCost);

						 	}

						 </script>
						 <?php

						}else{

							$newcurrency= $price;
							?>
							<script type="text/javascript">
								function calculatePrice(){
									var costPerChild=<?php echo $newcurrency ?>;
									var numOfChild=document.getElementById('noa').value;
									var totalCost=costPerChild * numOfChild ;

									document.getElementById('toc').value= ("£"+totalCost);

								}

							</script>
							<?php

						}
						?>

						<div class="center">
							<div class="form1 frame" id="sform">
								<h1 style="color: #FF5274">BOOK PARTY</h1>
								<span class="sign-border-bottom"></span>
								<form style="max-height: 500px; overflow-y: scroll" action="bookingaction.php" method="POST">
									<!--			<input type="hidden" name="uid" value="<?php echo $uid; ?>">-->
									<input type="hidden" name="uidd" value="<?php echo $uidd; ?>">
									<input type="hidden" name="uid" value="<?php echo $uid; ?>">
									<br> <label class="center"> PARTY NAME </label>
									<input class="form-control" type="text" name="ptype" disabled value= "<?php echo $party_name;?>">
									<br> <label class="center"> PRICE </label>
									<input class="form-control" type="text-transform" name="number" disabled value="<?php echo $cost_per_child?>">

									<input class="form-control" type="text" name="cname1" required placeholder="Child Name">
									<br> <label class="center"> D.O.B </label>
									<input class="form-control" type="date" name="date1" required placeholder="DOB" style="text-transform: uppercase">

									<div class="form-control1">
										<div class="radio">Gender
											<input type="radio" name="gen1" value="Male">Male
											<input type="radio" name="gen1" value="Female">Female</div></div>

											<input class="form-control" type="text" name="cname2" placeholder="Child Name *">
											<br> <label class="center"> D.O.B </label>
											<input class="form-control" type="date" name="date2" placeholder="DOB" style="text-transform: uppercase">


											<div class="form-control1">
												<div class="radio">Gender
													<input type="radio" name="gen2" value="Male">Male
													<input type="radio" name="gen2" value="Female">Female</div></div>


													<input class="form-control" type="number" id="noa" onkeyup="calculatePrice()" onchange="calculatePrice()" name="number1" placeholder="No. Of Children" min="1" max="<?php echo $num_of_children; ?>" required>

													<br> <label class="center"> PARTY DATE </label>
													<input class="form-control" type="date" name="partydate" required placeholder="Party Date" style="text-transform: uppercase;">

													<input type="text" class="form-control" disabled id="toc" name="toc" placeholder="Total Cost">



													<div class="clear"></div>
													<input class="sign-in-btn1" type="submit" name="book" value="BOOK">
													<input class="sign-in-btn" type="button" value="CLOSE">

												</form>
											</div>
										</div>


									</body>

									</html> 

									
