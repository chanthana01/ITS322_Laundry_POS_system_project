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
        <a href="staffsignin.php">Log in</a>
        <a href="staffregister.php">Sign up</a>
        <a href="management.php">Home</a>
      </div>
    </div>

  </div>
  <body>

    <div class="registerContent">
      <div class="registerDiv">
        <?php
				if(isset($_POST['staffRegisterSubmit'])) {
          $status = $_POST["status"];
					$firstName = $_POST["firstName"];
					$lastName = $_POST["lastName"];
					$citizenNumber = $_POST["citizenNumber"];
          $dateOfBirth = $_POST["dateOfBirth"];
          $mobileNumber = $_POST["mobileNumber"];
          $address = $_POST["address"];
					$email = $_POST["email"];
					$userid = $_POST["userId"];
					$password = $_POST["password"];
					$rePassword = $_POST["rePassword"];
          $gender = $_POST["gender"];


          if($password==$rePassword){
            $password = md5($_POST["password"]);
            $q="INSERT INTO `STAFF` (`firstName`,`lastName`,`citizenNo`,`dateOfBirth`,`mobileNo`,`address`,`email`,`userStaff`,`passStaff`,`status`,`gender`) VALUES ('$firstName','$lastName','$citizenNumber','$dateOfBirth','$mobileNumber','$address','$email','$userid','$password','$status','$gender')";
          // $q= " INSERT INTO `staff` (`staffId`, `firstName`, `lastName`, `citizenNo`, `dateOfBirth`, `mobileNo`, `address`, `email`, `userStaff`, `passStaff`, `status`, `gender`)"." VALUES (NULL, 'ddd', 'ddd', 'ddd', '2018-11-14', 'ddd', 'ddd', 'ddd', 'ddd', 'ddd', 'STAFF', 'M')";
            $result=$mysqli->query($q);
            if(!$result){
              echo "INSERT failed. Error: ".$mysqli->error ;
              // break;
            }
            else {
              header("Refresh: 2; url=management.php");

              echo '<h1 style="text-align: center; font-family: monospace;">REGISTER DONE!.<h1>';
            }
          }
          else{
            header("Refresh: 2; url=management.php");
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
