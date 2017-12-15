<?php
//checking the database
$conn = new mysqli('localhost','root','');
if($dbname=$conn->select_db('db_romisha_childrenparty4u')){
}else{
	header('location:setup.php');
}


if(isset($_COOKIE['login_count'])){
	if ($_COOKIE['login_count'] > 2) {
		header('location:countdown.php');
	}
}
if(isset($_GET['user'])) {
	?>
	<script>
		alert("User Already Exists");
	</script>
	<?php
}

if(isset($_GET['invalid'])){
	?>
	<script>
		alert("Invalid Username or Password");
	</script>
	<?php
}

if(isset($_GET['romi'])){
	?>
	<script>alert("Successfully registered");</script>
	<?php 
}
?>

<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>DDW</title>
	

	<!--Back to top-->

	<script src="js/jquery-1.11.3.min.js"></script>

	<!--<link rel="stylesheet" href="bootstrap.min.css">-->
	<script type="text/javascript">
		$( function () {
			$( "#datepicker" ).datepicker();
		} );
	</script>
	<link rel="stylesheet" href="main.css" type="text/css">
</head>

<body>
	<!--Header Navigation Panel-->
	<div class="hero">
		<div class="navigation">
			<header style="border-bottom: 1px solid rgba(255, 255, 255, 0.2); padding: 50px 0px;">
				<div class="head-content">
					<div class="logo">
						<a href="index.php">
							<img src="img/logo.png" alt="party-logo">
						</a>
					
					</div>
					<div class="header-nav">
						<nav>
							<ul class="primary-nav">
								<li><a href="index.php">HOME</a>
								</li>
								<li><a class="page-scroll" href="#gallery-section">Gallery</a>
								</li>
								<li><a class="page-scroll" href="#party-section">Party</a>
								</li>
								<li><a class="page-scroll" href="#download">About Us</a>
								</li>
							</ul>
							<ul class="member-actions" style="top: 41px;">
								<li><a class="btn-pink btn-small" onClick="openlForm()">Log In</a>
								</li>
								<!-- Sign Up -->
								<div class="form-login frame" id="lform">
									<h2>SIGN UP</h2>
									<span class="sign-border-bottom"></span>
							<!--SignUp Form-->
								<form action="signupaction.php" method="post">
									<!-- Username Input -->
									<div class="sign-up-textfield">
										<input autofocus type="text" class="form-control" placeholder="Enter Your Username" name="l-username" required>
									</div>
									<!-- Password Input -->
									<div class="sign-up-textfield">
										<input class="form-control" type="password" placeholder="Enter Your Password" name="l-password" required>
									</div>
									
									<div class="buttons center" style="margin-top: 5px;">
										<input type="submit" class="sign-in-btn1" value="SIGN IN" name="signin">
										<input type="reset" name="close" class="sign-in-btn" value="CLOSE" onclick="closeslForm()">
									</div>
								</form>
								</div>
							</ul>
						</nav>
					</div>
				</div>
			</header>
		</div>

		<!--Main Container-->
		<div class="container">
			<div class="row">
				<div class="middle-content">
					<div class="hero-content text-center">
						<h1>"Children Party For You"</h1>
						<p class="intro">A Party Without Cake Is Just A Meeting, A Party Without Cake Is Just A Meeting</p>
						<a class="btn-fill btn-large btn-margin-right" onclick="displayForm()">Sign Up</a>

						<!-- SIGN UP FORM -->
						<div class="form1 frame" id="sform">
							<h1>SIGN UP</h1>
							<span class="sign-border-bottom"></span>
							<!--SignUp Form-->
							<form action="signupaction.php" method="post">
								<!-- First Name Input -->
								<div class="sign-up-textfield">
									<input type="text" class="form-control" placeholder="Enter Your First Name" name="f_name" required autofocus>
								</div>
								<!-- Last Name Input -->
								<div class="sign-up-textfield">
									<input type="text" class="form-control" placeholder="Enter Your Last Name" name="l_name" required>
								</div>
								<!-- Username Input -->
								<div class="sign-up-textfield">
									<input type="text" class="form-control" placeholder="Enter Your Username" name="username" required>
								</div>
								<!-- Password Input -->
								<div class="sign-up-textfield">
									<input id = "password" class="form-control" type="password" placeholder="Enter Your Password" name="password" required>
								</div>
								<!-- Confirm Password Input -->
								<div class="sign-up-textfield">
									<input type="password" id = "cpassword" class="form-control" placeholder="Confirm Your Password" name="c_password" required>
								</div>
								<!-- DOB Input -->
								<div class="sign-up-textfield">
									<input id="datepicker" type="text" class="form-control" placeholder="Date Of Birth" name="dob" required>
								</div>
								<!-- Email Address Input -->
								<div class="sign-up-textfield">
									<input class="form-control" type="email" placeholder="Enter Your Email Address" name="email" required>
								</div>
								<!-- address Number -->
								<div class="sign-up-textfield">
								<select name="country" class="form-control" required>
									<option value="" disabled selected>Select Your Country...</option>
									<option value="3">Nepal</option>
									<option value="3">India</option>
									<option value="3">China</option>
									<option value="2">United Kingdom</option>
									<option value="3">America</option>
									<option value="1">France</option>
									<option value="1">Germany</option>
									<option value="1">Ireland</option>
								
									</select>
								</div>
								<!--gender-->
								<div class="sign-up-textfield1">
									<label>Gender</label>
									<input type="radio" name="gender" value="Male">Male
									<input type="radio" name="gender" value="Female">Female
								</div>
								<!-- Raised button with ripple effect -->

								<div style="margin-top: 5px;">
									<input type="submit" class="sign-in-btn1" value="SIGN UP" name="signup">
									<input type="reset" name="close" class="sign-in-btn" value="CLOSE" onclick="closesForm()">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--Gallery Section-->
	<div id="gallery-section">
		<h2 class="text-center" style="font-size: 30px;">GALLERY</h2>

		<span class="border-bottom"></span>

		<div class="clear"></div>

		<div class="gallery" style=" margin-top: 20px;">
			<div class="block-4" style="margin: 0;padding: 0;">
				<div class="hovereffect">
					<span class="hover1"> <img src="img/gal-img-01.jpg" alt="Gallery1" width="100%;">
						<div class="overlay">

        				</div>
						</span>
				</div>
			</div>
			<div class="block-4" style="margin: 0;padding: 0;">
				<div class="hovereffect">
					<span class="hover1"> <img src="img/gal-img-02.jpg" alt="Gallery1" width="100%;">
						<div class="overlay">

        				</div>
						</span>
				</div>
			</div>
			<div class="block-4" style="margin: 0;padding: 0;">
				<div class="hovereffect">
					<span class="hover1"> <img src="img/gal-img-03.jpg" alt="Gallery1" width="100%;">
						<div class="overlay">
        				</div>
						</span>
				</div>
			</div>
		</div>
	</div>

	<!--Gallery Section-->
	<div id="party-section">
		<h2 class="text-center" style="font-size: 30px; margin-top: 150px;">PARTY TYPES</h2>

		<span class="border-bottom1"></span>

		<div class="clear"></div>

		<div class="gallery" style=" margin-top: 20px;">
			<div class="block-4" style="margin: 0;padding: 0;">
				<div class="hovereffect">
					<span class="hover2"> <img src="img/gal-img-01.jpg" class="responsive" alt="Superior Room">
						<div class="overlay1">
           					<h2>Pirate Party</h2>

        				</div>
					</span>
				</div>
			</div>
			<div class="block-4" style="margin: 0;padding: 0;">
				<div class="hovereffect">
					<span class="hover2"> <img src="img/gal-img-02.jpg" class="responsive" alt="Superior Room">
						<div class="overlay1">
           					<h2>Build A Bear Party</h2>

        				</div>
					</span>
				</div>
			</div>
			<div class="block-4" style="margin: 0;padding: 0;">
				<div class="hovereffect">
					<span class="hover2"> <img src="img/gal-img-03.jpg" class="responsive" alt="Superior Room">
						<div class="overlay1">
           					<h2>Star Wars Party</h2>

        				</div>
					</span>
				</div>
			</div>
		</div>
	</div>






	<!-- Display Sign UP Form Script -->
	<script type="text/javascript">
		function displayForm() {
			var doc = document.getElementById( "sform" );
			doc.style.display = 'block';
		}
	</script>

	<!-- Close signUp Form Script -->
	<script type="text/javascript">
		function closesForm() {
			var romi = document.getElementById( "sform" );
			romi.style.display = 'none';
		}
	</script>
	
	
	<script type="text/javascript">
		function openlForm() {
			var doc = document.getElementById( "lform" );
			doc.style.display = 'block';
		}
	</script>

	<!-- Close signUp Form Script -->
	<script type="text/javascript">
		function closeslForm() {
			var romi = document.getElementById( "lform" );
			romi.style.display = 'none';
		}
	</script>

	<!-- Password validation -->
	<script type="text/javascript">
		var pass = document.getElementById("password");
		var cpass = document.getElementById("cpassword");
		function passwordValidation(){
			if (pass.value != cpass.value){
				cpass.setCustomValidity("Check your password");
			} else{
				cpass.setCustomValidity('');
			}
		}
		pass.onchange = passwordValidation;
		cpass.onkeyup = passwordValidation;
	</script>
	<!--script-->
	<script src="js/jquery.easing.min.js"></script>
	<script src="js/scrolling-nav.js"></script>
</body>

</html>