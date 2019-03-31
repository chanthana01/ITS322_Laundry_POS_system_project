<?php 	require_once('connect.php'); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Database project</title>
    <link rel="stylesheet" type="text/css" href="stylesbackup1.css">

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
    <div class="motto">
      <h1>We provide professional laundry service</h1>
    </div>
  </div>
  <body>
    <div class="row">
    <div class="content">

      <div class="boxWrapper">


        <div class="">
          <!-- INSERT CODE HERE -->
          <table>
                  <col width="5%">
                  <col width="10%">
                  <col width="15%">
                  <col width="10%">
                  <col width="10%">
                  <col width="10%">
                  <col width="10%">
                  <col width="10%">
                  <col width="10%">

                  <tr>
                      <th>Staff ID</th>
                      <th>Name</th>
                      <th>Gender</th>
                      <th>Citizen No.</th>
                      <th>DOB</th>
                      <th>Mobile No.</th>
                      <th>email</th>
                      <th>Status</th>
                      <th>ID</th>
                      <th>Password</th>
                  </tr>
  		 <?php
  				 	$q="SELECT * from staff";
  					$result=$mysqli->query($q);
  					if(!$result){
  						echo "Select failed. Error: ".$mysqli->error ;
  						// break;
  					}
  				 while($row=$result->fetch_array()){ ?>
                   <tr>
                      <td><?=$row['staffId']?></td>
                      <td><?=$row['firstName']?> <?=$row['lastName']?></td>
                      <td><?=$row['gender']?></td>
                      <td><?=$row['citizenNo']?></td>
                      <td><?=$row['dateOfBirth']?></td>
                      <td><?=$row['mobileNo']?></td>
                      <td><?=$row['email']?></td>
                      <td><?=$row['status']?></td>
                      <td><?=$row['userStaff']?></td>
                      <td><?=$row['passStaff']?></td>
                      <td><a href='modstaffinfo.php?userid=<?=$row['staffId']?>'> <img src="modify.png" width="24" height="24"></a></td>
                      <td><a href='delstaffinfo.php?userid=<?=$row['staffId']?>'> <img src="delete.png" width="24" height="24"></a></td>
                  </tr>
  				<?php } ?>


              </table>
        </div>





      </div>

    </div>
  </div>

  <footer>
    <div class="footerContent">
      <div class="logoWrapper">
        <img class="logo" src="BNN.png" border="0" />
      </div>
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
