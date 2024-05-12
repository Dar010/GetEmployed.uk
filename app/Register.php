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
a { color:white; text-decoration:none; padding:8px;border-radius:8px; font-family:"Monotype Corsiva"; class = "w3-hover-white";}
table {border-color:darkblue;}
a:hover {color:blue; text-decoration:none;}
h2 {color:white; font-family:"Monotype Corsiva"; margin-bottom:80px;}
footer {background-color:black; color:blue; font-family:"Monotype Corsiva"; font-size:20px;}
img{padding-bottom:0px; padding-top:50px; padding-bottom:50px; margin-right:10px;}
.input[type=text] {
    width: 130px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}
input {font-family:Monotype Corsiva; font-size:20px;}

/* When the input field gets focus, change its width to 100% */
input[type=text]:focus {
    width: 100%;
}

.opt:hover {font-color:blue;}
.button {
    background-color: white;
    border-color: black;
	border-radius:10px;
    color: black;
    padding: 5px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 20px;
	font-family:Monotype Corsiva;
	}
.button:hover {
	color:blue;
	border-color:blue;
	}
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
		<a href = "index.php"><img src = "images/FNLLOGO1.png" width = "1000" height = "330"></a>
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
<?php
if (isset ($_POST ["cnd_signup"]))
{
session_start();
$cnd_name = $_POST["cnd_name"];
$cnd_email = $_POST["cnd_email"];
$cnd_pass = $_POST["cnd_pass"];
$cnd_gender = $_POST["cnd_gender"];
$cnd_houseno = $_POST["cnd_houseno"];
$cnd_address = $_POST["cnd_address"];
$cnd_postcode = $_POST["cnd_postcode"];
$cnd_education = $_POST["cnd_education"];
$cnd_mobile = $_POST["cnd_mobile"];
$cnd_special = $_POST["cnd_special"];
//$cnd_code = $_POST["cnd_code"];
$cnd_file = rand(1,10000)."-".$_FILES["cnd_file"]["name"];
$file_loc = $_FILES["cnd_file"]["tmp_name"];
$folder = "file/";
if (move_uploaded_file($file_loc,$folder.$cnd_file))
{
	?><script>alert("CV is Successfully Uploaded")</script><?php
}
$con = mysqli_connect("localhost", "root", "");
if (!$con)
{
	echo "connection problem!";
}
else
{
	$db = mysqli_select_db ($con , "getemployed");
	$query = "INSERT INTO jobseeker(JobSeeker_Name, JobSeeker_Email, JobSeeker_Password, JobSeeker_Gender, JobSeeker_HNo, JobSeeker_Address, JobSeeker_Postcode, JobSeeker_Education, JobSeeker_Contact, JobSeeker_Specialization,CV) VALUES ('$cnd_name','$cnd_email','$cnd_pass','$cnd_gender','$cnd_houseno','$cnd_address', '$cnd_postcode', '$cnd_education','$cnd_mobile','$cnd_special','$cnd_file')";
	
	if (mysqli_query($con,$query))
	{
		?><h4 style = "font-family:Monotype Corsiva; color:white; font-size:60px";><?php echo "Successfully registered. You can login now"?></h4><?php
		header ("location:login.php");
	}
	else
	{
		echo "query problem".mysqli_error($con);
	}
	
}
}
?>
<footer style = "margin-top:40px;">
<div align = "center">
Copyright 2024 &copy <a target="_blank" title="follow me on facebook" href="http://www.facebook.com/GetEmployedpk-1790173941234653"><img alt="follow us on facebook" src="images/facebook_icon_30x30.jpg" border=0 style = "padding-bottom : 0px; padding-top:0px;"></a><a  title="follow me on Twitter" href="http://www.twitter.com/@GetemployedP"><img alt="follow us on Twitter" src="images/twitter30x30.png" border=0 style = "padding-bottom : 0px; padding-top:0px;"></a><a target="_blank" title="follow me on google plus" href="https://plus.google.com/u/3/114850687298878606480"><img alt="follow us on google plus" src="images/googleplus30x30.png" border=0 style = "padding-bottom : 0px; padding-top:0px;"></a><a target="_blank" title="follow me on instagram" href="http://www.instagram.com/getemployed.pk"><img alt="follow us on instagram" src="images/instagram30x30.png" border=0 style = "padding-bottom : 0px; padding-top:0px;"></a>
</div>
</footer>
</body>
</html>