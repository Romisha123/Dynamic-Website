<?php
	/*establishing a connection*/
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$dbname = "db_romisha_childrenparty4u";
	$connection = new mysqli($hostname, $username, $password, $dbname);

	/*inserting into tbl_userinfo*/
	if(isset($_POST['signup'])) {
		$f_name = $_POST['f_name'];
		$l_name = $_POST['l_name'];
		$username = $_POST['username'];
		$salted_password = md5($_REQUEST['password']);
		/*$c_password = $_POST['c_password'];*/
		$dob = $_POST['dob'];
		$email = $_POST['email'];
		$country = $_POST['country'];
		$gender = $_POST['gender'];
		
		$exist = "select * from tbl_userinfo where username = '$username'";
		$resultexists = $connection->query($exist);
		
		if($data = $resultexists->fetch_array()) {
			header('location:index.php?user=exists');
		} else {		
			$register = "insert into tbl_userinfo (f_name, l_name, username, password, dob, email, country, gender, user_type) values ('$f_name', '$l_name', '$username', '$salted_password', '$dob', '$email', '$country', '$gender', 'General')";
			$connection->query($register);
		
		header('location:index.php?romi=insert');
	}
	}

	/*sign in action*/
	if(isset($_POST['signin'])){
		$lusername = $_POST['l-username'];
		$lpassword = md5($_REQUEST['l-password']);
		
		$login = "SELECT * FROM tbl_userinfo where username = '$lusername' and password = '$lpassword'";
		$details = $connection->query($login);
		
		if($details->num_rows > 0){
			while($data = $details->fetch_assoc()){
				$user_type = $data['user_type'];
				$username = $data['username'];
				$uid=$data['userid'];
				$country=$data['country'];
			}
				
			/*session start taking above details*/
			session_start();
			$_SESSION['user_type'] = $user_type;
			$_SESSION['username'] = $username;
			$_SESSION['userid'] = $uid;
			$_SESSION['country'] = $country;
			
			if($user_type == "General") {
				$username = $_SESSION['username'];
				$country = $_SESSION['country'];

				header('location:dash_general.php');
			} else {
				session_start();
				$username = $_SESSION['username'];
				header('location:dash_admin.php');
			}
		} 
		else {
			if (isset ($_COOKIE['login_count'])){
				$_COOKIE['login_count'] = $_COOKIE[ 'login_count' ] + 1;
				setcookie("login_count", $_COOKIE ['login_count'], time() + 30);
			}else {
				setcookie("login_count",1, time() + 30);
			}

			header('location:index.php?invalid=usname');
		}
	}
?> 