<?php
/*establishing a connection*/
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "db_romisha_childrenparty4u";
$connection = new mysqli( $hostname, $username, $password, $dbname );

/*inserting into tbl_partyinfo*/
if ( isset( $_POST[ 'save' ] ) ) {
	$party_name = $_POST[ 'party_name' ];
	$party_desc = $_POST[ 'party_desc' ];
	$cost_per_child = $_POST[ 'cost_per_child' ];
	$length_of_party = $_POST[ 'length_of_party' ];
	$num_of_children = $_POST[ 'num_of_children' ];
	$services = $_POST[ 'services' ];
	$photo = $_FILES[ 'photo' ][ 'name' ];



	$insert_party = "insert into tbl_partyinfo(party_id, party_name, party_desc, cost_per_child, length_of_party, num_of_children, services, photo) values (NULL, '$party_name', '$party_desc', '$cost_per_child', '$length_of_party', '$num_of_children', '$services', '$photo')";

	$connection->query( $insert_party );
	$current_insert_id = $connection->insert_id;

	/*image upload*/
	$file_ext = pathinfo( $_FILES[ 'photo' ][ 'name' ], PATHINFO_EXTENSION ); // extension of the file
	if ( $file_ext == 'png' || $file_ext == 'gif' || $file_ext == 'jpg' || $file_ext == 'jpeg' ) {
		$pic_new_name = "pic_" . $current_insert_id . "_party." . $file_ext;
		move_uploaded_file( $_FILES[ 'photo' ][ 'tmp_name' ], "images/" . $pic_new_name );
	}

	/*updating photo file name with new file name*/
	$update_photo = "UPDATE tbl_partyinfo set photo = '$pic_new_name' where party_id = '$current_insert_id'";
	$connection->query( $update_photo );

	header( 'location:dash_admin.php?party=saved' );
}
?>