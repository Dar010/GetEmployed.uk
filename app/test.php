<?php

readStaticIndeedRSS();
print "<br>";
//getTravelInfoTFL();
    
 function getIndeedRSSOnline() {   
    
    $rss_url  = 'https://uk.indeed.com/rss?q=catering&l=putney';

    // Get the rss feed result 
    // Setting the user agent to an ordinary browser to bypass security issues
    $ch = curl_init();
    $options = array(
        CURLOPT_URL            => $rss_url,
        CURLOPT_USERAGENT      => 'Mozilla/5.0 (Linux; Android 10; SM-G996U Build/QP1A.190711.020; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Mobile Safari/537.36',
        CURLOPT_HEADER         => false,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER     => array(
            'Content-Type: text/xml'
        )
    );
    
    curl_setopt_array($ch, $options);
    $result = curl_exec($ch);
    curl_close($ch);
    // Examine the result if needed
   var_dump($result);

   // Load the result as simplexml
   $xml = simplexml_load_string($result);

    // Loop through the result
    foreach($xml->channel->item as $item) {
         print_r($item->title);
         $geoField = $item->children('http://www.georss.org/georss'); 
         print "location co-ordinates: " . $geoField->point;

    }
 }

 function getTravelInfoTFL()  {
    // Code snippet adapted from TFL test site for making journey planner requests:
    // https://api-portal.tfl.gov.uk/api-details#api=Journey&operation=Journey_JourneyResultsByPathFromPathToQueryViaQueryNationalSearchQueryDateQu
    // You will have to work out the correct parameters - ie. date/time, from (users submitted postcode) and to (co-ordinates from the RSS feed)
    //  The following will create a request equivalent to the following:
    // "https://api.tfl.gov.uk/Journey/JourneyResults/SW15%205PH/to/51.8,-0.2?nationalSearch=true&date=20240412&time=0900&timeIs=Arriving&journeyPreference=leasttime&accessibilityPreference=NoRequirements&walkingSpeed=Slow&cyclePreference=None&bikeProficiency=Easy";
    
    // Set this to the postcode of the users house - no spaces seems to work
    // I suggest you move the from and to to the parameters of this function so you can call it in the loop over the RSS feed
    $from = "SW155PH";
    // Set this to the co-ordinates you got from the RSS feed (you will need to add in the comma)
    $to = "51.8,-0.2";

    // Create a base URL request using the from and to
    $base_url = "https://api.tfl.gov.uk/Journey/JourneyResults/". $from . "/to/". $to;
    //var_dump($base_url);
    
    // Set up the various options for the travel query
    // Details at: https://api-portal.tfl.gov.uk/api-details#api=Journey&operation=Journey_JourneyResultsByPathFromPathToQueryViaQueryNationalSearchQueryDateQu
    $travel_options = [
        "nationalSearch" => "true",
        // Consider setting this to the date of the next weekday from time of request
        "date" => "20240412",
        // Consider setting this to be always 9am
        "time" => "0900", 
        "timeIs" => "Arriving",
        "journeyPreference" => "leasttime",
    ];
    
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($curl, CURLOPT_URL, $base_url . "?" . http_build_query($travel_options));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    # Request headers
    $headers = array(
        'Cache-Control: no-cache',);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    $resp = curl_exec($curl);
    curl_close($curl);

    // Turn the JSON returned into a PHP object
    $json_resp = json_decode($resp);  
    $count = 1;
    foreach ($json_resp->journeys as $journey) {
        print("Journey ". $count . ": " . $journey->duration . "<br>");
        $count++;
    }

 }


 function readStaticIndeedRSS() {

    $xml = simplexml_load_file('java-rss.xml');
    // Test the result if necessary
    // print_r($xml);
    // Loop through the result
    $geoField = 'point';
     foreach($xml->channel->item as $item) {
        print($item->title);
        //Need the children method to access elements with a namespace
        // Loop through the result
        $geoField = $item->children('http://www.georss.org/georss'); 
        print "location co-ordinates: " . $geoField->point;
        print "<br>";
     }

 }
       


?>