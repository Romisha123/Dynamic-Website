

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Check Dates</title>
	<link rel="stylesheet" href="css/dash.css" type="text/css">

	

</head>
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
							<li><a href="dash_general.php"  class="btn-pink btn-small">BACK</a>
							</li>
						</ul>

					</div>
				</div>
			</header>
		</div>
	</div>
</div>

<div class="container">
	<form style="margin-top: 10px;">
		<div class="rounded">
			<fieldset style="border: none;">
				<legend style="font-size: 18px; color: #FF5274;">View Booked Dates</legend>

				<div>
					<p style="color: #fff;">You can check here the dates that are already booked.</p>
				</div>
				<div class="center">
					<div class="rounded" style="margin-top: 10px">
						<label>YEAR</label>
						<select class="select1 form-control" name='year' id='Year' title='Year' required>
							<option value='' selected='1' disabled='disabled'>Year</option>

							<option value='2017'>2017</option>
							<option value='2018'>2018</option>
							<option value='2019'>2019</option>
							<option value='2020'>2020</option>
						</select>
						<label>MONTH</label>
						<select class="select1 form-control" name='month' id='Month' title='Month' required>
						<option value='' selected='1' disabled='disabled'>Month</option>
							<option value='01'>January</option>
							<option value='02'>February</option>
							<option value='03'>March</option>
							<option value='04'>April</option>
							<option value='05'>May</option>
							<option value='06'>June</option>
							<option value='07'>July</option>
							<option value='08'>August</option>
							<option value='09'>September</option>
							<option value='10'>October</option>
							<option value='11'>November</option>
							<option value='12'>December</option>
						</select>
						<input type="submit" name="chk" value="CHECK" class="btn-fill1 btn-small1 btn-margin-right">
					</div>
				</div>
				<?php
				$hostname = "localhost";
				$username = "root";
				$password = "";
				$dbname = "db_romisha_childrenparty4u";
				$connection = new mysqli($hostname, $username, $password, $dbname);
				if(isset($_GET['chk'])){

				$currentYear = $_GET['year']; // current year
				$currentMonth = $_GET['month'];

			}
			else
			{
				$currentYear = date('Y'); // current year
				$currentMonth = date('m'); // current month
			}
			$dateFormat = $currentYear.'-'.$currentMonth;

			$query = "SELECT p.*, b.* FROM tbl_booking AS b, tbl_partyinfo AS p WHERE b.party_date LIKE '$dateFormat%' AND p.party_id=b.party";
			$result = $connection->query($query);
			?>
			<div class="top">
				<div>
					<table>

						<tr>
							<th>Type of Party</th>
							<th>Date of Book</th>
						</tr>
						<?php
						while($data = $result->fetch_assoc()){
							?>
							<tr>
								<td><?php echo $data['party_name']; ?></td>
								<td><?php echo $data['party_date']; ?></td>
							</tr>
							<?php
						}

						?>
					</table>
				</div>
			</div>

		</fieldset>
	</div>


</form>

</div>
</body>
</html>