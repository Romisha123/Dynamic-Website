<?php
	/*establishing a connection*/
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$dbname = "db_romisha_childrenparty4u";
	$connection = new mysqli($hostname, $username, $password, $dbname);

	if(isset($_GET['delete'])){
		$uid = $_GET['delete'];
		$data = "select * from tbl_partyinfo where party_id = '$uid'";
		$res = $connection->query($data);
		
		while($row = $res->fetch_array()){
			unlink("images/" . $row['photo']);
		}
		
		$delete_q = "delete from tbl_partyinfo where party_id = '$uid'";
		$connection->query($delete_q);
		header('location:dash_admin.php?delete=succ');
	}
?>