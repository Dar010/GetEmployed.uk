<html lang = "en">
<head><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="set2.css" />
<link rel="stylesheet" href="style.css">
<meta charset = "utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="minified.css">
<script src = "jquerylib.js"></script>
<script src = "latestscript.js"></script>
<style>
body { background:url(std7.jpg); background-repeat:no-repeat; background-attachment:fixed; background-size:cover;}
a {color:white; text-decoration:none; padding:8px;border-radius:8px; font-family:"Monotype Corsiva";}
table {border-color:darkblue;}
a:hover {color:blue; text-decoration:none;}
h2 {color:white; font-family:"Monotype Corsiva"; margin-bottom:80px;}
footer {background-color:black; color:blue; font-family:"Monotype Corsiva"; font-size:20px;}
img{padding-bottom:0px; padding-top:85px; padding-left:25px;padding-bottom:50px;}
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
</head>
<body>
	<div align="center" style="margin:0px;padding:0px;">
		<a href = "home.html"><img src = "FNLLOGO1.png" width = "1000" height = "330"></a>
	</div>

	<div class="w3-panel w3-black">	
			<div align = "right">
		<div class="dropdown">
  <a href = "sign.html" class="dropbtn" style = "background-color:grey;">SIGN UP</a>
  <div class="dropdown-content" style="z-index:10;">
    <a href="candidate.php">Job Seeker Submission Form</a>
	<hr>
    <a href="Company.php">Company Submission Form</a>
  </div>
</div>
				<div class="dropdown">
  <a href = "login.html" class="dropbtn" style = "background-color:grey;">LOGIN</a>
  <div class="dropdown-content" style="z-index:10;">
    <a href="jb.php">Job Seeker LOGIN Form</a><hr>
    <a href="cmp.php">Company LOGIN Form</a>
  </div>
</div>
	</div>
		<a href = "home.html" style = "background-color:grey;">HOME</a>
		<a href = "about.html" style = "background-color:grey;">ABOUT</a> 
		<a href = "contact.html" style = "background-color:grey;">CONTACT US</a>
	</div>
<?php
if (isset ($_POST ["cnd_signup"]))
{
session_start();
$cnd_name = $_POST["cnd_name"];
$cnd_email = $_POST["cnd_email"];
$cnd_pass = $_POST["cnd_pass"];
$cnd_gender = $_POST["cnd_gender"];
$cnd_address = $_POST["cnd_address"];
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
	$query = "INSERT INTO jobseeker(JobSeeker_Name, JobSeeker_Email, JobSeeker_Password, JobSeeker_Gender, JobSeeker_Address, JobSeeker_Education, JobSeeker_Contact, JobSeeker_Specialization,CV) VALUES ('$cnd_name','$cnd_email','$cnd_pass','$cnd_gender','$cnd_address', '$cnd_education','$cnd_mobile','$cnd_special','$cnd_file')";
	
	if (mysqli_query($con,$query))
	{
		?><h4 style = "font-family:Monotype Corsiva; color:white; font-size:60px";><?php echo "Successfully registered. You can login now"?></h4><?php
		//header ("location:login.php");
	}
	else
	{
		echo "query problem".mysqli_error($con);
	}
	
}
}
?>
</body>
</html>