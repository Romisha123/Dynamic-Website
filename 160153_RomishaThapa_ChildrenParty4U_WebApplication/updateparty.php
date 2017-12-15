<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>DDW</title>
	<link rel="stylesheet" href="css/form-main.css" type="text/css">
</head>

<body>
	<!--Header Navigation Panel-->
	<div class="hero1">
		<div class="navigation">
			<header style="border-bottom: 1px solid rgba(255, 255, 255, 0.2); padding: 50px 0px;">
				<div class="head-content">
					<div class="logo">
						<a href="index.php">
							<img src="img/logo.png"  alt="party-logo"> </a>
						<a href="dash_admin.php"> <span style="color: #FF5274"> Admin </span></a> > <span style="color: #FF5274">Update Party </span>

						<ul class="member-actions" style="top: 41px;">
							<li>
								<a href="dash_admin.php" class="btn-pink btn-small">BACK</a>
							</li>
						</ul>
					</div>
				</div>
			</header>
		</div>

	</div>
	
	<!--getting data/value from database to form for update-->
	<?php
		/*establishing a connection*/
		$hostname = "localhost";  
		$username = "root";
		$password = "";
		$dbname = "db_romisha_childrenparty4u";
		$connection = new mysqli($hostname, $username, $password, $dbname);

		if(isset($_GET['update'])){
			$uid = $_GET['update'];
			$update_q = "select * from tbl_partyinfo where party_id = '$uid'";
			$res = $connection->query($update_q);
			$data = $res->fetch_assoc();
		}
	?>

	<!--Form Start-->
	<div class="center">
		<div class="form1 frame" id="sform">
			<h1 style="color: #FF5274">UPDATE PARTY</h1>
			<span class="sign-border-bottom"></span>
			<!--SignUp Form-->
			<form action="" method="post">
					<input type="hidden" name="uid" value="<?php echo $data['party_id']; ?>">
					
					<input type="text" class="form-control" placeholder="Party Name" name="party_name" required value="<?php echo $data['party_name']; ?>">

					<input type="text" class="form-control" placeholder="Party Description" name="party_desc" required value="<?php echo $data['party_desc']; ?>">

					<input type="text" class="form-control" placeholder="Cost Per Child" name="cost_per_child" required value="<?php echo $data['cost_per_child']; ?>">

					<input class="form-control" type="text" placeholder="Length Of Party" name="length_of_party" required value="<?php echo $data['length_of_party']; ?>">

					<input type="text" class="form-control" placeholder="Max No. OF Children" name="num_of_children" required value="<?php echo $data['num_of_children']; ?>">

					<input type="text" class="form-control" placeholder="Services" name="services" required value="<?php echo $data['services']; ?>">




				<div style="margin-top: 5px;">
					<input type="submit" class="sign-in-btn1" value="SAVE" name="update1">
					<input type="reset" name="reset" class="sign-in-btn" value="Reset">
				</div>
			</form>
		</div>
	</div>


	<!--js for upload-->
	<script type="text/javascript">
		document.getElementById( "uploadBtn" ).onchange = function () {
			document.getElementById( "uploadFile" ).value = this.value;
		};
	</script>

	
</body>
</html>

<!--update php-->
<?php
if(isset($_POST['update1'])){
	$id = $_POST['uid'];
	$party_name = $_POST[ 'party_name' ];
	$party_desc = $_POST[ 'party_desc' ];
	$cost_per_child = $_POST[ 'cost_per_child' ];
	$length_of_party = $_POST[ 'length_of_party' ];
	$num_of_children = $_POST[ 'num_of_children' ];
	$services = $_POST[ 'services' ];
	
	$update = "update tbl_partyinfo set party_name = '$party_name', party_desc = '$party_desc', cost_per_child = '$cost_per_child', length_of_party = '$length_of_party', num_of_children = '$num_of_children', services = '$services' where party_id = '$uid'";
	
	$connection->query($update);
	header('location:dash_admin.php?update=success');
}
?>