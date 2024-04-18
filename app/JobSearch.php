<html lang = "en">
<head>
<link rel="stylesheet" href="css/style.css">
<meta charset = "utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/minified.css">
<link rel="stylesheet" href="css/commutes.css">
<script src = "jquerylib.js"></script>
<script src = "latestscript.js"></script>
<script src = "traveldistance.js"></script>
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
  <a href = "sign.php" style = "background-color:grey;">SIGN UP</a>
  <a href = "login.php" style = "background-color:grey;">LOGIN</a>
</div>
		<a href = "index.php" style = "background-color:grey;">HOME</a>
		<a href = "about.html" style = "background-color:grey;">ABOUT</a> 
		<a href = "contact.html" style = "background-color:grey;">CONTACT US</a>
</div>
<?php
if (isset ($_POST ["job_search"]))
{
    session_start();
    $reed_keyword = $_POST["keyword"];
    $reed_locationName = $_POST["location"];
    var_dump ($reed_keyword);
    var_dump ($reed_locationName);
    $url = "https://www.reed.co.uk/api/1.0/search";
    
    $username = "35dc79e1-cdf8-4643-b2b8-1466c6dd3a9b"; // username
    $password = ""; // password

    $request_parameters = [
        'keywords' => $reed_keyword,
        'location' => $reed_locationName
    ];
    ?>
    <html>
    <p style = "color:white;">
    </html>
    <?php 
    var_dump($request_parameters); 
    ?>
    <br>
    <?php  
    $ch = curl_init($url);
    $params = http_build_query($request_parameters);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
    $url_full = $url . "?" . $params;
    curl_setopt($ch, CURLOPT_URL, $url_full);
    $response = curl_exec($ch);
    curl_close($ch);

    $result = json_decode($response, true);
    var_dump($result);

    if (isset($result['results'])) {
        foreach ($result['results'] as $job) {
            // Display information for each job
            echo "Job Title: " . $job['jobTitle'] . "<br>";
            echo "Location: " . $job['locationName'] . "<br>";
            // Add more information as needed
            echo "<br>";
        }
    } else {
        echo "No results found.";
    }
?>
<html>
</p>
</html>
<?php    
// Do something with $result
}
?>
