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
// Function to fetch coordinates from the provided postcode using Google Maps Geocoding API
function getCoordinatesFromPostcode($user_postcode) {
    // Google Maps Geocoding API endpoint
    $url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . urlencode($user_postcode) . "&key=AIzaSyB2eDlUDfalojpeeO03paPD1lmqpW_oRhw"; // Replace YOUR_API_KEY with your actual Google Maps API key

    // Fetch data from the API
    $response = file_get_contents($url);
    $data = json_decode($response, true);

    // Check if the API request was successful and if there are any results
    if ($data['status'] == 'OK' && !empty($data['results'])) {
        // Extract latitude and longitude from the first result
        $location = $data['results'][0]['geometry']['location'];
        return array('latitude' => $location['lat'], 'longitude' => $location['lng']);
    } else {
        return null; // Return null if coordinates couldn't be fetched
    }
}

// Function to call TFL API and retrieve travel information
function getTravelInformationFromTFL($originLat, $originLng, $destinationLat, $destinationLng) {
    // TFL API endpoint for journey planning
    $url = "https://api.tfl.gov.uk/Journey/JourneyResults/{$originLat},{$originLng}/to/{$destinationLat},{$destinationLng}";

    // Set up request headers including the TFL API key
    $headers = array(
        "Content-Type: application/json",
        "App-Key: 3d431c6dbf0049628106f170a8ec3618" // Replace with your actual TFL API key
    );

    // Set up cURL options
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // Execute the cURL request
    $response = curl_exec($ch);
    // Close cURL session
    curl_close($ch);

    // Decode JSON response
    $data = json_decode($response, true);

    // Check if there's an error in the response
    if (isset($data['message'])) {
        return "Error: ".$data['message'];
    }

    // Extract relevant information from the response
    $journeys = $data['journeys'];
    if (empty($journeys)) {
        return "No travel information available.";
    }

    // Return the first journey's summary
    $journey = $journeys[0];
    $summary = "Duration: {$journey['duration']}, ";
    $summary .= "Departure: {$journey['startDateTime']}, ";
    $summary .= "Arrival: {$journey['arrivalDateTime']}";
    return $summary;
}

// Main logic to fetch travel information and display job search results
session_start();
if (isset($_POST["job_search"])) {
    //$cnd_houseno = $_POST["cnd_houseno"];
    //$cnd_postcode = $_POST["cnd_postcode"];
    $job_keyword = $_POST["keyword"];
    $job_location = $_POST["location"];
    $user_postcode = $_POST["pcode"];
    ?><p style = "color:white;"><?php
    var_dump($job_keyword, $job_location, $user_postcode);?></p><?php
    // Fetch coordinates from the provided postcode
    $userCoordinates = getCoordinatesFromPostcode($user_postcode);
    ?><p style = "color:white;"><?php
    var_dump($userCoordinates);?></p><?php
    if ($userCoordinates) {
        $originLat = $userCoordinates['latitude'];
        $originLng = $userCoordinates['longitude'];

        // Connect to the database
        $con = mysqli_connect("localhost", "root", "", "getemployed");
        if (!$con) {
            echo "Connection problem!";
        } else {
            // Query to fetch job search results from the database based on keyword and location
            $query = "SELECT * FROM jobs WHERE job_title LIKE '%$job_keyword%' AND job_location = '$job_location'";
            $result = mysqli_query($con, $query);
            if ($result) {
                // Display job search results as a table
                echo "<table border='1'>";
                // Fetch and display column names as table headers
                echo "<tr>";
                while ($fieldinfo = mysqli_fetch_field($result)) {
                    echo "<th>".$fieldinfo->name."</th>";
                }
                echo "<th>Travel Information</th>"; // New column for travel information
                echo "</tr>";
                ?><p style = "color:white;"><?php
                var_dump($result);?></p><?php
                // Fetch and display rows
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    // Access individual fields of the row using keys and display as table data
                    foreach ($row as $key => $value) {
                        if ($key != 'job_co-ordinates') {
                            echo "<td>".$value."</td>";
                        } else {
                            // Extract job coordinates from the single column
                            $coordinates = explode(',', $value);
                            $destinationLat = $coordinates[0];
                            $destinationLng = $coordinates[1];
                            // Call TFL API to get travel information
                            $travelInfo = getTravelInformationFromTFL($originLat, $originLng, $destinationLat, $destinationLng);
                            // Display travel information
                            echo "<td>".$travelInfo."</td>";
                            ?><p style = "color:white;"><?php
                            var_dump($travelInfo);?></p><?php
                        }
                    }
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "Error executing query: " . mysqli_error($con);
            }
        }
    } else {
        echo "Coordinates not found for the provided postcode.";
    }
}
?>

</body>
</html>