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
        <a href="signin.php">Log in</a>
        <a href="register.php">Sign up</a>
        <a href="management.php">Home</a>
      </div>
    </div>

  </div>
  <body>
    <div class="registerContent">
      <div class="registerDiv">
        <h1>Sign In</h1>
        <hr>
        <br>
        <form action="">
          <input type="checkbox" name="Staff" value="staff">
          <label for="type">Admin</label>
          <input type="checkbox" name="Staff" value="staff">
          <label for="type">Staff</label>
          <input type="checkbox" name="Member" value="member">
          <label for="type">Member</label>
          <br><br>

          <label for="mail">Email</label>
          <input type="text" id="mail" name="email" placeholder="Your Email">

          <label for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="Your password">



          <input type="submit" value="SignIn">
        </form>
      </div>
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
