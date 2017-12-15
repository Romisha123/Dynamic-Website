<?php 
session_start();
$m=$_SESSION['username'];

if(isset($_GET['booked'])){
	?>
	<script>
		alert("Booked Successfully!!!");
	</script>
	<?php
}
?>

<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>DDW</title>
	<link rel="stylesheet" href="css/dash.css" type="text/css">
</head>

<style type="text/css">
	.table-image{
  		width: 100%;
  		height: 320px;
}
</style>

<body>
	<!--Header Navigation Panel-->
	<div class="hero1">
		<div class="navigation">
			<header style="border-bottom: 1px solid rgba(255, 255, 255, 0.2); padding: 50px 0px;">
				<div class="head-content">
					<div class="logo">
						<a href="index.php">
							<img src="img/logo.png" alt="party-logo"> GENERAL DASHBOARD
						</a>
						
						<ul class="member-actions" style="top: 41px;">
								<li><a href="logout.php" class="btn-pink btn-small">LOG OUT</a>
								</li>
						</ul>
					
					</div>
				</div>
			</header>
		</div>
		<div class="center">
			<h1 style="font-size: 200%; color: #fff; float: left; margin-left: 100px;">Welcome <?php echo $m; ?></h1>
			<div style="float: left; margin-top: 10px; padding: 10px; margin-left: 150px;">
			
				<a href="onlineCalender.php" style="margin-left: 120px"  class="btn-fill btn-small1 btn-margin-right">Check Dates</a>
				
			</div>	
		</div>
		</div>
		
		<!--tables-->
	<div class="table">
		<div class="wrapper">
		<?php
			/*establishing a connection*/
			$hostname = "localhost";
			$username = "root";
			$password = "";
			$dbname = "db_romisha_childrenparty4u";
			$connection = new mysqli($hostname, $username, $password, $dbname);
			/*collecting all the data from tbl for GUI view*/
			$table_content = "SELECT * FROM tbl_partyinfo";
			$result = $connection->query($table_content);
			
	function convertCurrency($amount, $from, $to){
					$url  = "http://www.google.com/finance/converter?a=$amount&from=$from&to=$to";
					$data = file_get_contents($url);
					preg_match("/<span class=bld>(.*)<\/span>/",$data, $converted);
					$converted = preg_replace("/[^0-9.]/", "", $converted[1]);
					return round($converted, 3);
				}  


			while($data = $result->fetch_assoc()){
				$uid = $data['party_id'];
				?>
			<div class="block-12">
				<div class="rounded">
					<div class="block-6" style="float: left">

					<img src='images/<?php echo $data['photo']; ?>' class="table-image" alt="image">

					</div>

					<div class="block-6">
							<a name="update" href="booking.php?book=<?php echo $data['party_id'] ?>" class="btn-fill1 btn-small1 btn-margin-right" style="margin-top: 80px; margin-left: 190px;">BOOK PARTY</a> <br>
					</div>
					
					
						<table>
							<tr>
								<th>Party Types</th>
								<th>Description</th>
								<th>Cost per Child</th>
								<th>Length Of Party</th>
								<th>Max No. Of Children</th>
								<th>Products/Services</th>
							</tr>
							
							<tr>
								<td>
									<?php echo $data['party_name']; ?>
								</td>
								<td>
									<?php echo $data['party_desc']; ?>
								</td>
								<td><?php

							if(isset($_SESSION['country'])) 
							{ 
						
							$country_code = $_SESSION['country'];
							$price = $data['cost_per_child'];
							if ($country_code==1){
								$currency = "EUR";
							$newcurrency= convertCurrency($price, "GBP", $currency); // EUR
							echo "€".$newcurrency;
						}
						else if($country_code==3)
						{
							$currency= "USD";
						 $newcurrency=  convertCurrency($price, "GBP", $currency); // USD
						 echo "$".$newcurrency;

						}else{

							$newcurrency= $price;
							echo "£".$newcurrency;
						}
					}
						//$_SESSION[ 'curr' ]=$newcurrency;

						?>

					</td>
								<td>
									<?php echo $data['length_of_party']; ?>
								</td>
								<td>
									<?php echo $data['num_of_children']; ?>
								</td>
								<td>
									<?php echo $data['services']; ?>
								</td>

							</tr>

						</table>

				</div>
			</div>						
				<?php
			}
		?>
	
		</div>
	</div>
		
		
	</div>
				

					
</body>

</html>