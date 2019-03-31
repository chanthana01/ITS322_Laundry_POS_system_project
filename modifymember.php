<?php
require_once('connect.php');
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $gender = $_POST['gender'];
  $mobileNumber = $_POST['mobileNumber'];
  $address = $_POST['address'];
  $memberTypeId = $_POST['memberTypeId'];
  $bonusPoint = $_POST['bonusPoint'];
  $email = $_POST['email'];
  $memberId = $_POST['memberId'];

  // echo $firstName."<br>".$lastName."<br>".$citizenNo."<br>".$dateOfBirth."<br>".$mobileNumber."<br>".$address."<br>".$email."<br>".$staffId;
echo $staffId;

  $q = "update member set firstName='$firstName', lastName='$lastName', mobileNo='$mobileNumber', address='$address',memberTypeId='$memberTypeId',bonusPoint='$bonusPoint', email='$email', gender='$gender' where memberId =$memberId";
  // $q = "update usergroup set usergroup_code='$groupcode', usergroup_name='$groupname', usergroup_remark='$remark', usergroup_url='$url' where usergroup_id=$groupid";

  if(!$mysqli->query($q)){
  echo "Update failed: ". $mysqli->error;
  }else{
  header("Location: membermanagement.php");
  }
 ?>
