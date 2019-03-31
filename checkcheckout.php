<?php
require_once('connect.php');
	$serviceId = $_GET['serviceId'];
	$memberId = $_GET['memberId'];
	$totalPrice = $_GET['totalPrice'];
	// echo "memberId".$memberId;
	// echo "totalPrice".$totalPrice;

	$q="SELECT curdate() as currentDate";
	$currentDate = 0;
	// $q = "INSERT INTO `regisitem` (`memberId`,`staffId`,`serviceId`,`itemId`,`quantity`) VALUES (`test`,$_SESSION['staffId'],$servideId,$varItemsId[$x],``)";
	if ($res = $mysqli->query($q))
	{
			if (mysqli_num_rows($res) == 1)
			{
					$row = $res->fetch_array();
					$currentDate=$row['currentDate'];
			}

	}

	if($memberId != 9999){
		echo "string";
		$q="SELECT * from `member` where memberId ='$memberId' ";
		$currentBonusPoint = 0;
		$currentM_Type = 1;
		// $q = "INSERT INTO `regisitem` (`memberId`,`staffId`,`serviceId`,`itemId`,`quantity`) VALUES (`test`,$_SESSION['staffId'],$servideId,$varItemsId[$x],``)";
		if ($res = $mysqli->query($q))
		{
				if (mysqli_num_rows($res) == 1)
				{
						$row = $res->fetch_array();
						$currentBonusPoint=$row['bonusPoint'];
						$currentM_Type = $row['memberTypeId'];
				}

		}
		$currentBonusPoint= $currentBonusPoint+intval($totalPrice);
		if($currentBonusPoint > 800){
			$currentM_Type=2;
		}
		if($currentBonusPoint > 2000){
			$currentM_Type=3;
		}

		$q = "update member set  bonusPoint='$currentBonusPoint',memberTypeId='$currentM_Type' where memberId =$memberId";
		// $q = "update usergroup set usergroup_code='$groupcode', usergroup_name='$groupname', usergroup_remark='$remark', usergroup_url='$url' where usergroup_id=$groupid";
		if(!$mysqli->query($q)){
			echo "Update failed: ". $mysqli->error;
		}else{
			header("Location: checkoutitems.php");
		}
	}

	$q = "update laundryservice set  dateOut='$currentDate' where serviceId =$serviceId";
  // $q = "update usergroup set usergroup_code='$groupcode', usergroup_name='$groupname', usergroup_remark='$remark', usergroup_url='$url' where usergroup_id=$groupid";

  if(!$mysqli->query($q)){
  echo "Update failed: ". $mysqli->error;
  }else{
  header("Location: checkoutitems.php");
  }
 ?>
