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
a { color:white; text-decoration:none; padding:8px;border-radius:8px; font-family:"Merriweather"; class = "w3-hover-white";}
table {border-color:darkblue;}
a:hover {color:blue; text-decoration:none;}
.vr {
    width:2px;
	height:30%;
    background-color:white;
    position:absolute;
    top:111%;
    bottom:0;
    left:50%;
}
#vri {
  width:10px;
    background-color:#000;
    position:absolute;
    top:0;
    bottom:0;
    left:150px;
}
h2 {color:white; font-family:"Merriweather"; margin-top:0px;font-size:35px;}
h1 {color:white; font-family:"Merriweather"; margin-bottom:80px; font-size:60px;}
h4 {color:white; font-family:"Merriweather"; margin-top:0px; font-size:20px;}
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
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/set2.css" />
<script src="https://kit.fontawesome.com/a01be89b5f.js" crossorigin="anonymous"></script>
</head>
<body>
<div align="center" style="margin:0px;padding:0px;">
		<a href = "index.php"><img src = "images/FNLLOGO1.png" width = "1000" height = "330"></a>
	</div>
	<div class="w3-panel w3-black">	
			<div align = "right">
				<div class="dropdown">
  <a href = "profile.php" class="dropbtn" style = "background-color:grey;">SETTINGS</a>
  <div class="dropdown-content" style="z-index:10;">
 <a href = "editjobseeker.php">Update Profile</a><hr>
    <a href = "logout.php">Logout</a>
  </div>
</div>
</div>
		<a href = "index.php" style = "background-color:grey;">HOME</a>
		<a href = "about.php" style = "background-color:grey;">ABOUT</a> 
		<a href = "contact.php" style = "background-color:grey;">CONTACT US</a>
</div>
<?php
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
		$query = "SELECT * FROM jobseeker WHERE JobSeeker_Email = '$unique'";
		$result = mysqli_query($con,$query);
		$col = mysqli_fetch_array($result);
	}
if (!isset ($_SESSION["login_member"]))
{
	header ("location:loginj.php");
}
?>
<h4>
<form method = "post" action = "Update_JobSeeker.php">
<div align = "center">
	<span class="input input--kohana">
		<input class="input__field input__field--kohana" type="text" value = '<?php echo $col ["JobSeeker_Name"]; ?>' id="input-29" name = "update_cnd_name" style = "padding-left:18%; background-color:white; color:black;"required/>
		<label class="input__label input__label--kohana"style = "color:black; font-family:Monotype Corsiva; font-size:15px;" for="input-29">
			<i class="fa fa-user icon icon--kohana" style = "color:blue;"></i>
			<span class="input__label-content input__label-content--kohana" >Name</span>
		</label>
	</span>

	<span class="input input--kohana" style = "color : blue;">
		<input class="input__field input__field--kohana" type="email" value = '<?php echo $col ["JobSeeker_Email"]; ?>' id="input-29" name = "update_cnd_email" style = " background-color:white; color:black;" required>
		<label class="input__label input__label--kohana" style = "color:black; font-family:Monotype Corsiva; font-size:15px;"for="input-29">
			<i class="fa fa-at icon icon--kohana"style = "color:blue;"></i>
			<span class="input__label-content input__label-content--kohana" >Email</span>
		</label>
	</span>
	<span class="input input--kohana" style = "color : blue;">
			<input class="input__field input__field--kohana" type="password" value = '<?php echo $col ["JobSeeker_Password"]; ?>' id="input-29" name = "update_cnd_pass" minlength ="8" maxlength = "32" style = "padding-left:20%; background-color:white; color:black;"required>
			<label class="input__label input__label--kohana" style = "color:black; font-family:Monotype Corsiva; font-size:15px;"for="input-29">
				<i class="fa fa-key icon icon--kohana"style = "color:blue;"></i>
				<span class="input__label-content input__label-content--kohana" >Password</span>
			</label>
	</span><br>
	<span class="input input--kohana" style = "color : blue;">
					<input class="input__field input__field--kohana" name = "update_cnd_houseno" value = '<?php echo $col ["JobSeeker_HNo"]; ?>' type="textarea" id="input-29" style = "padding-left:33%; background-color:white; color:black;" required>
					<label class="input__label input__label--kohana" style = "color:black; font-family:Monotype Corsiva; font-size:15px;"for="input-29">
						<i class="fa fa-home icon icon--kohana"style = "color:blue;"></i>
						<span class="input__label-content input__label-content--kohana" >House/Flat No.</span>
					</label>
				</span>
				<br>
	<span class="input input--kohana" style = "color : blue;">
					<input class="input__field input__field--kohana" name = "update_cnd_address" type="textarea" id="input-29" value = '<?php
					echo $col ["JobSeeker_Address"];?>' style = "padding-left:20%; background-color:white; color:black;" required>
					<label class="input__label input__label--kohana" style = "color:black; font-family:Monotype Corsiva; font-size:15px;"for="input-29">
						<i class="fa fa-home icon icon--kohana"style = "color:blue;"></i>
						<span class="input__label-content input__label-content--kohana" >Address</span>
					</label>
				</span>
	<span class="input input--kohana" style = "color : blue;">
		<input class="input__field input__field--kohana" name = "update_cnd_postcode" value = '<?php echo $col ["JobSeeker_Postcode"]; ?>' type="textarea" id="input-29" style = "padding-left:27%; background-color:white; color:black;" required>
		<label class="input__label input__label--kohana" style = "color:black; font-family:Monotype Corsiva; font-size:15px;"for="input-29">
			<i class="fa fa-home icon icon--kohana"style = "color:blue;"></i>
			<span class="input__label-content input__label-content--kohana" >Postcode</span>
		</label>
	</span>	
				
	<span class="input input--kohana" style = "color : blue;">
					<input class="input__field input__field--kohana" name = "update_cnd_education" type="textarea" id="input-29" value = '<?php echo $col ["JobSeeker_Education"]; ?>' style = "padding-left:25%; background-color:white; color:black;" required>
					<label class="input__label input__label--kohana" style = "color:black; font-family:Monotype Corsiva; font-size:15px;"for="input-29">
						<i class="fa fa-graduation-cap icon icon--kohana"style = "color:blue;"></i>
						<span class="input__label-content input__label-content--kohana" >Education</span>
					</label>
				</span>		
	<span class="input input--kohana" style = "color : blue;">
					<input class="input__field input__field--kohana" name = "update_cnd_special" type="textarea" id="input-29" value = '<?php echo $col ["JobSeeker_Specialization"]; ?>' style = "padding-left:33%; background-color:white; color:black;" required>
					<label class="input__label input__label--kohana" style = "color:black; font-family:Monotype Corsiva; font-size:15px;"for="input-29">
						<i class="fa fa-graduation-cap icon icon--kohana"style = "color:blue;"></i>
						<span class="input__label-content input__label-content--kohana" >Specialization</span>
					</label>
				</span>	
	<span class="input input--kohana">
					<input class="input__field input__field--kohana" type = "text" value = '<?php echo $col ["JobSeeker_Contact"]; ?>' minlength = "13" maxlength = "13" name = "update_cnd_mobile" id="input-29" style = "padding-left:38%; background-color:white; color:black;" required/>
					<label class="input__label input__label--kohana" style = "color:black; font-family:Monotype Corsiva; font-size:15px;"for="input-29" >
						<i class="fa fa-fw fa-phone icon icon--kohana"style = "color:blue;"></i>
						<span class="input__label-content input__label-content--kohana">Contact Number&emsp;</span>
					</label>
				</span>
	<span class="input input--kohana">
					<input class="input__field input__field--kohana" type = "file" value = '<?php echo $col ["CV"]; ?>' name = "update_cnd_file" id="input-29" style = "padding-left:38%; background-color:white; color:black;" required/>
					<label class="input__label input__label--kohana" style = "color:black; font-family:Monotype Corsiva; font-size:15px;"for="input-29" >
						<i class="fa fa-upload icon icon--kohana"style = "color:blue;"></i>
						<span class="input__label-content input__label-content--kohana">File Uploading&emsp;</span>
					</label>
				</span>
<br><input class = "button" type = "submit" value = "Update" name = "cnd_update">
</div>
</form>
</h4>
<h2>
<a href = "profile.php">Back to Profile</a>
</h2>
<footer>
<div align = "center">
Copyright 2024 &copy <a target="_blank" title="follow me on facebook" href="http://www.facebook.com/GetEmployedpk-1790173941234653"><img alt="follow us on facebook" src="images/facebook_icon_30x30.jpg" border=0 style = "padding-bottom : 0px; padding-top:0px;"></a><a  title="follow me on Twitter" href="http://www.twitter.com/@GetemployedP"><img alt="follow us on Twitter" src="images/twitter30x30.png" border=0 style = "padding-bottom : 0px; padding-top:0px;"></a><a target="_blank" title="follow me on google plus" href="https://plus.google.com/u/3/114850687298878606480"><img alt="follow us on google plus" src="images/googleplus30x30.png" border=0 style = "padding-bottom : 0px; padding-top:0px;"></a><a target="_blank" title="follow me on instagram" href="http://www.instagram.com/getemployed.pk"><img alt="follow us on instagram" src="images/instagram30x30.png" border=0 style = "padding-bottom : 0px; padding-top:0px;"></a>
</div>
</footer>
</body>
</html>