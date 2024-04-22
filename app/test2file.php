// Display job search results as a table
                echo "<table border='1'>";
                // Fetch and display column names as table headers
                echo "<tr>";
                while ($fieldinfo = mysqli_fetch_field($result)) {
                    echo "<th>".$fieldinfo->name."</th>";
                }
                echo "<th>Travel Information</th>"; // New column for travel information
                echo "</tr>";
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
                            var_dump($travelInfo);?></p>