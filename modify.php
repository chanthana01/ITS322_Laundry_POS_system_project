<?php
require_once('connect.php');
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $gender = $_POST['gender'];
  $citizenNo = $_POST['citizenNumber'];
  $dateOfBirth  = $_POST['dateOfBirth'];
  $mobileNumber = $_POST['mobileNumber'];
  $address = $_POST['address'];
  $email = $_POST['email'];
  $staffId = $_POST['staffId'];

  // echo $firstName."<br>".$lastName."<br>".$citizenNo."<br>".$dateOfBirth."<br>".$mobileNumber."<br>".$address."<br>".$email."<br>".$staffId;
echo $staffId;

  $q = "update staff set firstName='$firstName', lastName='$lastName', citizenNo='$citizenNo', dateOfBirth='$dateOfBirth', mobileNo='$mobileNumber', address='$address', email='$email', gender='$gender' where staffId =$staffId";
  // $q = "update usergroup set usergroup_code='$groupcode', usergroup_name='$groupname', usergroup_remark='$remark', usergroup_url='$url' where usergroup_id=$groupid";

  if(!$mysqli->query($q)){
  echo "Update failed: ". $mysqli->error;
  }else{
  header("Location: staffmanagement.php");
  }
 ?>
