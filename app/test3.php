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
tr{
    color:white;
}
td{
    color:cyan;
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
session_start();
if (isset($_POST["job_search"])) {
    //$cnd_houseno = $_POST["cnd_houseno"];
    //$cnd_postcode = $_POST["cnd_postcode"];
    $job_keyword = $_POST["keyword"];
    $job_location = $_POST["location"];
    $con = mysqli_connect("localhost", "root", "");
    if (!$con) {
        echo "connection problem!";
    } else {
        $db = mysqli_select_db($con, "getemployed");
        
        // Construct the query using LIKE operator to match partial keyword
        $query = "SELECT * FROM jobs WHERE job_title LIKE '%$job_keyword%' AND job_location LIKE '%$job_location%'";
        
        if ($result = mysqli_query($con, $query)) {
            $row_count = mysqli_num_rows($result);
            if ($row_count > 0) {
                echo "<table border='1'>";
                // Fetch and display column names as table headers
                echo "<tr>";
                while ($fieldinfo = mysqli_fetch_field($result)) {
                    echo "<th>".$fieldinfo->name."</th>";
                }
                echo "</tr>";
                
                // Fetch and display rows
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    // Access individual fields of the row using keys and display as table data
                    foreach ($row as $value) {
                        echo "<td>".$value."</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "No jobs found for the given keyword and location.";
            }
        } else {
            echo "Error executing query: " . mysqli_error($con);
        }
    }
}
?>
</body>
</html>