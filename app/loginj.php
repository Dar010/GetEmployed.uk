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
session_start();
if (isset ($_POST ["cnd_login"]))
{
	$user = $_POST ["cnd_email"];
	$pass = $_POST ["cnd_pass"];
	$con = mysqli_connect("localhost", "root", "");
	if (!$con)
	{
		echo "connection problem!";
	}
	else
	{	
		$db = mysqli_select_db ($con , "getemployed");
		$query = "SELECT * FROM jobseeker WHERE JobSeeker_Email = '$user' AND JobSeeker_Password = '$pass'";
			if ($result = mysqli_query($con, $query))
			{
			$sql = "SELECT JobSeeker_ID FROM jobseeker WHERE JobSeeker_Email = '$user'";
			$run = mysqli_query($con,$sql);
			$col = mysqli_fetch_assoc($run);
			$_SESSION["jobseeker_id"] = $col["JobSeeker_ID"];
			$row= mysqli_num_rows($result);
			}
		if ($row == 1)
		{
			$_SESSION ["login_member"] = $user;
			
			header ("location: profile.php");
		}
		else
		{
			echo "Invalid username or password or get registered first";
		}
	}
}
?>
</body>
</html>