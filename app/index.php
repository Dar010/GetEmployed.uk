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
<div class="w3-content w3-section" style="max-width:1217px ; padding-right:25px;" height = "50px";>
  <img class="mySlides w3-animate-fading" src="images/MedicalJ.png" style="width:100%">
  <img class="mySlides w3-animate-fading" src="images/IT.png" style="width:100%">
  <img class="mySlides w3-animate-fading" src="images/teaching.png" style="width:100%">
  <img class="mySlides w3-animate-fading" src="images/f1.jpg" style="width:100%">
</div>
<table>
<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 8000);    
}
</script>
</table>
<form action="index.php" method="post">
<div align = "center">
<p style = "color:white; padding-left:50%;">(Only for Travel Information)</p>
    <span class="input input--kohana">
        <input class="input__field input__field--kohana" type="text" id="input-29" name = "keyword" style = "padding-left:23%; padding-bottom:14px; padding-top:24px; background-color:white; color:black;"required/>
        <label class="input__label input__label--kohana"style = "color:black; font-family:Monotype Corsiva; font-size:15px;" for="input-29">
            <i class="fas fa-briefcase icon icon--kohana" style = "color:blue;"></i>
            <span class="input__label-content input__label-content--kohana" >Job Title</span>
        </label>
    </span>
    <span class="input input--kohana" style = "color : blue;">
		<input class="input__field input__field--kohana" name = "location" type="textarea" id="input-29" style = "padding-left:31%; padding-bottom:13px; padding-top:24px; background-color:white; color:black;" required>
		<label class="input__label input__label--kohana" style = "color:black; font-family:Monotype Corsiva; font-size:15px;"for="input-29">
			<i class="fa fa-home icon icon--kohana"style = "color:blue;"></i>
			<span class="input__label-content input__label-content--kohana" >Job Location</span>
		</label>
	</span>
    <span class="input input--kohana" style = "color : blue;">
		<input class="input__field input__field--kohana" name = "pcode" type="textarea" id="input-29" style = "padding-left:33%; padding-bottom:13px; padding-top:24px; background-color:white; color:black;">
		<label class="input__label input__label--kohana" style = "color:black; font-family:Monotype Corsiva; font-size:15px;"for="input-29">
			<i class="fa fa-map-pin icon icon--kohana"style = "color:blue;"></i>
			<span class="input__label-content input__label-content--kohana" > Your Postcode</span>
		</label>
    </span>
    <br>
    <input class = "button" type = "submit" value = "Search" name = "job_search">
    <p style = "color:white;">Travel Information available for London Only</p>
</form>
<div align = "center" style = "margin-bottom:50px";>
<h2>
How can you be more productive at work?‎
</h2>
<hr width = "50%">
<tr style = "border-left:1px";>
<td></td>
</tr>
<table cellspacing="5" border="0" cellpadding="0">
<tr valign="top" align="left">
<td> <iframe width="564" height="317" src="https://www.youtube.com/embed/Q_GkOuua9Fg" frameborder="0" allowfullscreen style = "margin-left:-4%";></iframe></td>
<td width="1px" bgcolor="white"><BR></td>
<td width="150" valign="top" align="right">
<iframe width="564" height="317" src="https://www.youtube.com/embed/EKOn-Lu2kKY" frameborder="0" allowfullscreen style = "margin-left:4%"></iframe>
</td>
</tr>
</table>
<hr width = "50%">
<h4>
Productivity is not only about achieving more in less time, but it is also about working smart.<br>
Want to become a more productive person at work?<br>
Here are some factors that you might be neglecting on your quest to be more productive.‎
</h4>
<hr width = "50%">
</div>
<footer>
<div align = "center">
Copyright 2024 &copy <a target="_blank" title="follow me on facebook" href="http://www.facebook.com/GetEmployedpk-1790173941234653"><img alt="follow us on facebook" src="images/facebook_icon_30x30.jpg" border=0 style = "padding-bottom : 0px; padding-top:0px;"></a><a  title="follow me on Twitter" href="http://www.twitter.com/@GetemployedP"><img alt="follow us on Twitter" src="images/twitter30x30.png" border=0 style = "padding-bottom : 0px; padding-top:0px;"></a><a target="_blank" title="follow me on google plus" href="https://plus.google.com/u/3/114850687298878606480"><img alt="follow us on google plus" src="images/googleplus30x30.png" border=0 style = "padding-bottom : 0px; padding-top:0px;"></a><a target="_blank" title="follow me on instagram" href="http://www.instagram.com/getemployed.pk"><img alt="follow us on instagram" src="images/instagram30x30.png" border=0 style = "padding-bottom : 0px; padding-top:0px;"></a>
</div>
</footer>
</body>
</html>