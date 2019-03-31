<?php
require_once('connect.php');
	$serviceId = $_GET['serviceId'];


  // echo $firstName."<br>".$lastName."<br>".$citizenNo."<br>".$dateOfBirth."<br>".$mobileNumber."<br>".$address."<br>".$email."<br>".$staffId;


  $q = "update laundryservice set  serviceStatus='F' where serviceId =$serviceId";
  // $q = "update usergroup set usergroup_code='$groupcode', usergroup_name='$groupname', usergroup_remark='$remark', usergroup_url='$url' where usergroup_id=$groupid";

  if(!$mysqli->query($q)){
  echo "Update failed: ". $mysqli->error;
  }else{
  header("Location: updatestatus.php");
  }
 ?>
