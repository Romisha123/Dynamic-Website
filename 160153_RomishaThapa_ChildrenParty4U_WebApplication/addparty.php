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
						<a href="dash_admin.php"> <span style="color: #FF5274"> Admin </span></a> > <span style="color: #FF5274">Add Party </span>

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

	<!--Form Start-->
	<div class="center">
		<div class="form1 frame" id="sform">
			<h1 style="color: #FF5274">ADD PARTY</h1>
			<span class="sign-border-bottom"></span>
			<!--SignUp Form-->
			<form action="addpartyaction.php" method="post" enctype="multipart/form-data">

				<div class="sign-up-textfield">
					<input type="text" class="form-control" placeholder="Party Name" name="party_name" required autofocus>
				</div>

				<div class="sign-up-textfield">
					<input type="text" class="form-control" placeholder="Party Description" name="party_desc" required>
				</div>

				<div class="sign-up-textfield">
					<input type="number" class="form-control" placeholder="Cost Per Child" name="cost_per_child" required>
				</div>

				<div class="sign-up-textfield">
					<input class="form-control" type="text" placeholder="Length Of Party" name="length_of_party" required>
				</div>

				<div class="sign-up-textfield">
					<input type="number" class="form-control" placeholder="Max No. OF Children" name="num_of_children" required>
				</div>

				<div class="sign-up-textfield">
					<input type="text" class="form-control" placeholder="Services" name="services" required>
				</div>
				<!--file-->
				<input id="uploadFile" class="disableInputField" placeholder="Choose File 1" disabled>
				<div class="fileUpload btn1">
					<span>Upload</span>
					<input id="uploadBtn" type="file" class="upload" name="photo" required onChange="copy()">
				</div>


				<div style="margin-top: 5px;">
					<input type="submit" class="sign-in-btn1" value="SAVE" name="save">
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