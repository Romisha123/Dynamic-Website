<!DOCTYPE html>
<html>
<head>
	<title>View Party</title>
	<link rel="stylesheet" href="css/dash.css" type="text/css">
</head>
<body>
<div class="navigation">
			<header style="border-bottom: 1px solid rgba(255, 255, 255, 0.2); padding: 50px 0px;">
				<div class="head-content">
					<div class="logo">
						
						<a href="dash_admin.php"> <span style="color: #FF5274"> Admin </span></a> > <span style="color: #FF5274">Book Party Details </span>
						
						<ul class="member-actions" style="top: 41px;">
								<li><a href="dash_admin.php" class="btn-pink btn-small">BACK</a>
								</li>
						</ul>
					
					</div>
				</div>
			</header>
		</div>
		<div class="center">
			<h1 style="font-size: 200%; color: #fff; float: left; margin-left: 100px;">Welcome Rajinda!!!</h1>
			<div style="float: left; margin-top: 10px; padding: 10px; margin-left: 150px;">
				
			</div>	
		</div>
		</div>
		<div class="container100">
<table border="1">
	<tr>
	<th>Party Name</th>
	<th>No of Child</th>
	<th>Party Date</th>
	<th>User<s/th>
	</tr>

	<?php
			/*establishing a connection*/
			$hostname = "localhost";
			$username = "root";
			$password = "";
			$dbname = "db_romisha_childrenparty4u";
			$connection = new mysqli($hostname, $username, $password, $dbname);

			$romi= "SELECT b.*, u.f_name ,u.l_name, p.party_name FROM tbl_userinfo AS u, tbl_booking AS b, tbl_partyinfo as p WHERE b.party=p.party_id AND b.user=u.userid";
			$result=$connection->query($romi);
			while($data=$result->fetch_assoc()){
				$f_name=$data['f_name'];
				$l_name=$data['l_name'];

				?>

				<tr>
				<td><?php echo $data['party_name']; ?></td>
				<td><?php echo $data['no_of_children']; ?></td>
				<td><?php echo $data['party_date']; ?></td>
				<td><?php echo $f_name.'&nbsp;'.$l_name?></td>
</tr>
<?php
}
?>
</table>
</div>
</body>
</html>