<?php
/*establishing a connection*/
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "db_romisha_childrenparty4";
$connection = new mysqli( $hostname, $username, $password, $dbname );

/*inserting into tbl_partyinfo*/
if(isset($_POST['book'])){
	$id=$_POST['uidd'];	

	$uid=$_POST['uid'];	
	if(isset($_POST['partyType'])){
		$partyType = $_POST['partyType'];
	}

	if(isset($_POST['number'])){
		$number = $_POST['number'];
	}

	if(isset($_POST['cname1'])){
		$cname1 = $_POST['cname1'];
	}

	if(isset($_POST['date1'])){
		$date1 = $_POST['date1'];
	}

	if(isset($_POST['gen1'])){
		$gen1 = $_POST['gen1'];
	}

	if(isset($_POST['cname2'])){
		$cname2 = $_POST['cname2'];
	}

	if(isset($_POST['date2'])){
		$date2 = $_POST['date2'];
	}

	if(isset($_POST['gen2'])){
		$gen2 = $_POST['gen2'];
	}

	if(isset($_POST['number1'])){
		$number1 = $_POST['number1'];
	}

	if(isset($_POST['partydate'])){
		$date3 = $_POST['partydate'];
	}


	$romi="INSERT INTO tbl_booking(booking_id, party, child_name, dob, gender, child_name2, dob2, gender2, no_of_children, party_date, user ) VALUES ( NULL, '$id','$cname1','$date1','$gen1','$cname2','$date2','$gen2','$number1','$date3','$uid')";

	$connection->query($romi);

	$receiver = "rajinda@yahoo.com";
	$subject = "Booking Details";
	$text_content = "num of attendees =". $no_of_children . "<br>";
			"Date of party=". $date3 . "<br>";
			"Party Details :" . $partyType . "<br>";
	$header = "From: webmaster@example.com" . "\r\n" . "CC:r@example.com ";
	mail($receiver, $subject, $text_content, $header);

	header('location:dash_general.php?booked=success');
}

?>