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
a { color:white; text-decoration:none; padding:8px;border-radius:8px; font-family:"Merriweather"; /*class = "w3-hover-white";*/}
table {border-color:darkblue;}
a:hover {color:blue; text-decoration:none;}
h2 {color:white; font-family:"Merriweather"; margin-bottom:80px;}
footer {background-color:black; color:blue; font-family:"Merriweather"; font-size:20px;}
img{padding-bottom:0px; padding-top:50px; padding-bottom:50px; margin-right:10px;}
.input[type=text] {
    width: 130px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}
input {font-family:Merriweather; font-size:20px;}

/* When the input field gets focus, change its width to 100% */
input[type=text]:focus {
    width: 100%;
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
	font-family:Merriweather;
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
  <a href = "sign.php" style = "background-color:grey;">SIGN UP</a>
  <a href = "login.php" style = "background-color:grey;">LOGIN</a>
</div>
		<a href = "index.php" style = "background-color:grey;">HOME</a>
		<a href = "about.php" style = "background-color:grey;">ABOUT</a> 
		<a href = "contact.php" style = "background-color:grey;">CONTACT US</a>
</div>
<div align = "center">
<?php
session_start();
if (isset ($_SESSION["login_member"]))
{
	header ("location:profile.php");
}
?>
<div align = "center">
<form method = "post" action = "loginj.php">
<span class="input input--kohana" style = "color : blue;">
					<input class="input__field input__field--kohana" type="email" id="input-29" name = "cnd_email" style = "padding-left:35%; background-color:white; color:black;" required>
					<label class="input__label input__label--kohana" style = "color:black; font-family:Merriweather; font-size:15px;"for="input-29">
						<i class="fa fa-at icon icon--kohana"style = "color:blue;"></i>
						<span class="input__label-content input__label-content--kohana" >Email</span>
					</label>
				</span>
	<span class="input input--kohana" style = "color : blue;">
					<input class="input__field input__field--kohana" type="password" id="input-29" name = "cnd_pass" minlength ="8" maxlength = "32" style = "padding-left:20%; background-color:white; color:black;"required>
					<label class="input__label input__label--kohana" style = "color:black; font-family:Merriweather; font-size:15px;"for="input-29">
						<i class="fa fa-key icon icon--kohana"style = "color:blue;"></i>
						<span class="input__label-content input__label-content--kohana" >Password</span>
					</label>
				</span><br>
<input class = "button" type = "submit" value = "login" name = "cnd_login">
</form>
<a href = "sign.html">Sign Up</a>
</div>
<footer>
<div align = "center">
Copyright 2024 &copy <a target="_blank" title="follow me on facebook" href="http://www.facebook.com/GetEmployedpk-1790173941234653"><img alt="follow us on facebook" src="images/facebook_icon_30x30.jpg" border=0 style = "padding-bottom : 0px; padding-top:0px;"></a><a  title="follow me on Twitter" href="http://www.twitter.com/@GetemployedP"><img alt="follow us on Twitter" src="images/twitter30x30.png" border=0 style = "padding-bottom : 0px; padding-top:0px;"></a><a target="_blank" title="follow me on google plus" href="https://plus.google.com/u/3/114850687298878606480"><img alt="follow us on google plus" src="images/googleplus30x30.png" border=0 style = "padding-bottom : 0px; padding-top:0px;"></a><a target="_blank" title="follow me on instagram" href="http://www.instagram.com/getemployed.pk"><img alt="follow us on instagram" src="images/instagram30x30.png" border=0 style = "padding-bottom : 0px; padding-top:0px;"></a>
</div>
</footer>
</body>
</html>