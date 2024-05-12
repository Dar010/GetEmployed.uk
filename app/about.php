<html lang = "en">
<head>
<link rel="stylesheet" href="css/style.css">
<meta charset = "utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/minified.css">
<script src = "jquerylib.js"></script>
<script src = "latestscript.js"></script>
<style>
body { background:url(images/std7.jpg); background-repeat:no-repeat; background-attachment:fixed; background-size:cover;}
a {color:white; text-decoration:none; padding:8px;border-radius:8px; font-family:"Merriweather"; /*class = "w3-hover-white";*/}
table {border-color:darkblue;}
a:hover {color:blue; text-decoration:none;}
h2 {color:white; font-family:"Merriweather"; margin-bottom:80px;}
footer {background-color:black; color:blue; font-family:"Merriweather"; font-size:20px;}
img{padding-bottom:0px; padding-top:85px; padding-left:25px;padding-bottom:50px;}

.dropbtn {
    background-color: white;
    color: white;
    border: none;
    cursor: pointer;
	border-color:blue;
}

.dropdown {
    position: relative;
    display: inline-block;
	border-color:blue;
}

.dropdown-content {
    display: none;
    position: absolute;
    right: 0;
    background-color: black;
	color: white;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
	padding: 12px 16px;
	border-bottom-color:blue;
}

.dropdown-content a {
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover 
{
	background-color:grey;
}

.dropdown:hover .dropdown-content {
    display: block;
	
}

.dropdown:hover .dropbtn {
    background-color: blue;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/set2.css" />
</head>
<body>
<div align="center" style="margin:0px;padding:0px;">
		<a href = "index.html"><img src = "images/FNLLOGO1.png" width = "1000" height = "330"></a>
	</div>
	
	<div class="w3-panel w3-black">	
    <div align = "right">
  <?php
  session_start();
  $con = mysqli_connect("localhost", "root", "", "getemployed");
  if (!$con)
      {
          echo "connection problem";
      }
  else
      {
          $db = mysqli_select_db($con,"getemployed");
          $unique = $_SESSION ["login_member"];
          $query = "SELECT * FROM jobseeker WHERE JobSeeker_Email = '$unique'";
          $result = mysqli_query($con,$query);
          $col = mysqli_fetch_array($result);
      }
  if (!isset ($_SESSION["login_member"]))
  {
    ?>
  <a href = "sign.php" style = "background-color:grey;">SIGN UP</a>
  <a href = "login.php"  style = "background-color:grey;">LOGIN</a>
    <?php }
    else{
        ?>
    <div class="dropdown">
    <a href = "profile.php" class="dropbtn" style = "background-color:grey;">SETTINGS</a>
    <div class="dropdown-content" style="z-index:10;">
    <a href = "editjobseeker.php">Update Profile</a><hr>
        <a href = "logout.php">Logout</a>
    </div>
    </div>
    <?php } ?>
</div>
		<a href = "index.php" style = "background-color:grey;">HOME</a>
		<a href = "about.php" style = "background-color:grey;">ABOUT</a> 
		<a href = "contact.php" style = "background-color:grey;">CONTACT US</a>
</div>
<div align = "center">	
<img src = "images/Untitled-3.png" height = "350px" width = "800px">
</div>
<h2>Find a job for yourself. Apply for jobs online with GetEmployed.uk as it works with employers to list the best jobs, not only in one city but all over UK, as well to provide the widest range of open job positions. They also utilize an in depth referral network that is not available on most other job search websites. This gives you instant access to red hot job opportunities as soon as they become available so that you have every opportunity to secure your next job - before anyone else even knows the job existed! Don't miss out, Sign up Now for a Free Account at GetEmployed.uk. And you’ll be given instant access to thousands of job opportunities available in UK - as well as many other additional job search resources to assist you in locking in the right position, the position you have been searching for, your dream career is just a few clicks away</h2>
<footer>
<div align = "center">
Copyright 2024 &copy <a target="_blank" title="follow me on facebook" href="http://www.facebook.com/GetEmployedpk-1790173941234653"><img alt="follow us on facebook" src="images/facebook_icon_30x30.jpg" border=0 style = "padding-bottom : 0px; padding-top:0px;"></a><a  title="follow me on Twitter" href="http://www.twitter.com/@GetemployedP"><img alt="follow us on Twitter" src="images/twitter30x30.png" border=0 style = "padding-bottom : 0px; padding-top:0px;"></a><a target="_blank" title="follow me on google plus" href="https://plus.google.com/u/3/114850687298878606480"><img alt="follow us on google plus" src="images/googleplus30x30.png" border=0 style = "padding-bottom : 0px; padding-top:0px;"></a><a target="_blank" title="follow me on instagram" href="http://www.instagram.com/getemployed.pk"><img alt="follow us on instagram" src="images/instagram30x30.png" border=0 style = "padding-bottom : 0px; padding-top:0px;"></a>
</div>
</footer>
</body>
</html>