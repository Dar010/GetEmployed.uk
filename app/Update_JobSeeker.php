<html lang = "en">
<head>
<link rel="stylesheet" href="style.css">
<meta charset = "utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="minified.css">
<script src = "jquerylib.js"></script>
<script src = "latestscript.js"></script>
</head>
<body>
<?php
if (isset ($_POST ["cnd_update"]))
{
session_start();
$con = mysqli_connect("localhost", "root", "");
if (!$con)
	{
		echo "connection problem";
	}
else
	{
		$db = mysqli_select_db($con,"getemployed");
		$unique = $_SESSION ["login_member"];
		$update_cnd_mobile = $_POST["update_cnd_mobile"];
		$update_cnd_houseno = $_POST["update_cnd_houseno"];
		$update_cnd_address = $_POST["update_cnd_address"];
		$update_cnd_postcode = $_POST["update_cnd_postcode"];
		$update_cnd_email = $_POST["update_cnd_email"];
		$update_cnd_pass = $_POST["update_cnd_pass"];
		$update_cnd_education = $_POST["update_cnd_education"];
		$update_cnd_special = $_POST["update_cnd_special"];
		$update_cnd_file = $_POST["update_cnd_file"];
		$query = "UPDATE jobseeker SET  JobSeeker_Postcode = '$update_cnd_postcode', JobSeeker_Email='$update_cnd_email', JobSeeker_Password='$update_cnd_pass', JobSeeker_Address = '$update_cnd_address', JobSeeker_Contact ='$update_cnd_mobile', JobSeeker_Education = '$update_cnd_education', JobSeeker_Specialization = '$update_cnd_special', CV = '$update_cnd_file', JobSeeker_HNo = '$update_cnd_houseno'  WHERE JobSeeker_Email='$unique'";

if (mysqli_query($con,$query))
{
	$_SESSION ["login_member"] = $update_cnd_email;
	header ("location: profile.php");
}		
else
{
	
	echo "Query problem".mysqli_error($con);
}
	}
}	
?>
<h2>
<a href = "profile.php">Back to Profile</a>
</h2>
<footer style = "margin-top:40px;">
<div align = "center">
Copyright 2017 &copy <a target="_blank" title="follow me on facebook" href="http://www.facebook.com/GetEmployedpk-1790173941234653"><img alt="follow us on facebook" src="facebook_icon_30x30.jpg" border=0 style = "padding-bottom : 0px; padding-top:0px;"></a><a  title="follow me on Twitter" href="http://www.twitter.com/@GetemployedP"><img alt="follow us on Twitter" src="twitter30x30.png" border=0 style = "padding-bottom : 0px; padding-top:0px;"></a><a target="_blank" title="follow me on google plus" href="https://plus.google.com/u/3/114850687298878606480"><img alt="follow us on google plus" src="googleplus30x30.png" border=0 style = "padding-bottom : 0px; padding-top:0px;"></a><a target="_blank" title="follow me on instagram" href="http://www.instagram.com/getemployed.pk"><img alt="follow us on instagram" src="instagram30x30.png" border=0 style = "padding-bottom : 0px; padding-top:0px;"></a>
</div>
</footer>
</body>
</html>