<?php 	require_once('connect.php'); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>ITS351_PROJECT</title>
    <link rel="stylesheet" type="text/css" href="stylesbackup1.css">
    <style>
    .navactive {
        color: white;
        background-color: #bcb562;
    }
    </style>
  </head>
  <div class="header">
    <div class="logoWrapper">
      <img class="logo" src="BNN.png" border="0" />
      <div class="topnav">
        <a href="usersignin.php">Log in</a>
        <a href="userregister.php">Sign up</a>
        <a href="usermanagement.php">Home</a>
      </div>
    </div>

  </div>
  <body>

    <div class="registerContent">
      <div class="registerDiv">
        <?php
				if(isset($_POST['userRegisterSubmit'])) {
          // $status = $_POST["status"];
          $firstName = $_POST['firstName'];
          $lastName = $_POST['lastName'];
          $gender = $_POST['gender'];
          $mobileNo = $_POST['mobileNo'];
          $address = $_POST['address'];
          $email = $_POST['email'];
          $password= $_POST['password'];
          $rePassword =$_POST['rePassword'];
          $memberUserId = $_POST['userId'];



          if($password==$rePassword){
            $password = md5($_POST["password"]);
            $q="INSERT INTO MEMBER (firstName,lastName,mobileNo,address,memberTypeId,bonusPoint,email,memberUserId,password,gender)
            VALUES ('$firstName','$lastName','$mobileNo','$address','1','0','$email','$memberUserId','$password','$gender')";
            $result=$mysqli->query($q);
            if(!$result){
              echo "INSERT failed. Error: ".$mysqli->error ;
              // break;
            }
            header("Refresh: 2; url=usermanagement.php");
            echo '<h1 style="text-align: center; font-family: monospace;">REGISTER DONE!.<h1>';
          }
          else{
              header("Refresh: 2; url=usermanagement.php");
            echo "<h1>Password does not match!</h1>";
          }

				}
			?>

      </div>
    </div>
      <div class="regisImageWrapper">
        <img src="regis.jpg" alt="">
      </div>

  <footer>
    <div class="footerContent">
      <div class="leftFooter">
        <h1 id="followUs">Follow us . . </h1>
        <div class="iconWrapper">
          <a href="https://www.facebook.com/">
            <img class="socialIcon" src="facebook.png" border="0" />
          </a>
          <a href="https://www.instagram.com/">
            <img class="socialIcon" src="ig.png" border="0" />
          </a>
          <a href="https://twitter.com/">
            <img class="socialIcon" src="twitter.png" border="0" />
          </a>
        </div>
      </div>
      <div class="rightFooter">
        <div class="memberCredit">
          <h1>Created by</h1>
        </div>
        <div class="nameList">
          <ul id="name">
            <li>Chanthana Bunchongpru</li>
            <li>Chalita Martangka</li>
            <li>Arnold Kumpeera</li>
          </ul>

        </div>
      </div>
    </div>
  </footer>

  </body>

</html>
