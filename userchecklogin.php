<?php
require_once('connect.php');
session_start();
// ถ้ากด submit
if (isset($_POST['userSignInSubmit']))
{
    $l_user = trim($_POST['userId']);
    $l_pass = md5(trim($_POST['password']));

    if ($l_user != "" && $l_pass != "")
    {
      // echo "string";
      // SELECT * FROM `member` WHERE `memberUserId` = 'user2' AND `password` =
        // NOT use
        // $q = "SELECT * FROM user " .
        // " WHERE USER_NAME='".$l_user."' AND USER_PASSWD = '".$l_pass."' ";
        //

        // $q="SELECT * FROM member WHERE memberUserId='". $l_user. "'" . "AND password='" . $l_pass. "'";
        // $q="SELECT * FROM `member` WHERE `memberUserId` = 'user2' AND `password` = '7e58d63b60197ceb55a1'";
        $q="SELECT * FROM member WHERE memberUserId='".$l_user."'"."AND password='".$l_pass."'";

        require_once('connect.php');
        if ($res = $mysqli->query($q))
        {
            if (mysqli_num_rows($res) == 1)
            {
                $row = $res->fetch_array();
                echo "string";
                var_dump($row);
                $_SESSION['memberUserId'] = $row['memberUserId'];
                $_SESSION['userFirstName'] = $row['firstName'];
                $_SESSION['userLastName'] = $row['lastName'];
                $_SESSION['bonusPoint'] = $row['bonusPoint'];
                $_SESSION['memberId'] = $row['memberId'];
                // $_SESSION['memberTypeId'] = $row['memberTypeId'];
                $mTypeId = $row['memberTypeId'];

                $q2="SELECT m_TypeName FROM m_Type WHERE m_TypeId='". $mTypeId. "'" ;
                if ($res2 = $mysqli->query($q2))
                {
                    if (mysqli_num_rows($res2) == 1)
                    {
                        $row2 = $res2->fetch_array();
                        // echo $row2['m_TypeName'];
                        $_SESSION['memberType'] = $row2['m_TypeName'];

                    }
                }



                // if staff go
                header("Location: usermanagement.php");
                // if member go
                // ....
            }
            if (mysqli_num_rows($res) == 0)
            {
              header("Refresh: 2; url=usermanagement.php");
              echo '<h1 style="text-align: center; font-family: monospace;">INVALID USERNAME OR PASSWORD!!<h1>';
            }
        }
    }
    else{
      header("Refresh: 2; url=usermanagement.php");
      echo '<h1 style="text-align: center; font-family: monospace;">USERNAME OR PASSWORD CANNOT BE BLANK!!<h1>';
    }
}
?>
