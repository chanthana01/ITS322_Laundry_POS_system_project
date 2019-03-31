<?php
require_once('connect.php');

	$id = $_GET['userid'];
	if (isset($id)) {
		$q="DELETE FROM member where memberId=$id";
		$q = strtolower($q);
		if(!$mysqli->query($q)){
			echo "DELETE failed. Error: ".$mysqli->error ;
	   }
	   $mysqli->close();
	   //redirect
     header("Refresh: 2; url=membermanagement.php");
	   echo '<h1 style="text-align: center; font-family: monospace;">DELETE SUCCESS!!</h1>';
	 }


  ?>
