<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<style>
    
    .table {
            width: auto;
            height: auto;
            margin: 30px auto;
            background-color: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            padding: 20px;
            border-radius: 5px;
            text-align: center;
        }

        .table h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .table table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table table th,
        .table table td {
            border: 1px solid #ddd;
            padding: 10px;
        }

        .table table th {
            background-color: #333;
            color: white;
        }

        .table table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .table table tr:hover {
            background-color: #ddd;
        }

        .total-days {
    background-color: #4CAF50;
    color: white;
    padding: 10px;
    border-radius: 5px;
    text-align: center;
    margin-top: 20px;
}

.total {
    font-size: 18px;
    font-weight: bold;
}

.left {
    font-size: 16px;
}
.no-records {
    color: #FF0000;
    font-weight: bold;
    margin-top: 20px;
    text-align: center;
}

  
</style>
<script>
    // Get the current page's filename (e.g., "order.html")
    const currentPage = location.pathname.split('/').pop();

    // Map the filename to the corresponding link ID
    const pageToLinkId = {
        
        'front.php':'home-link',
        'casual.php':'leave-link',
        'medical.php':'leave-link',
        'display_casual.php':'order-link',
        'display_medical.php':'order-link',
    
    };

    // Get the corresponding link ID for the current page
    const currentLinkId = pageToLinkId[currentPage];

    // Add the "active" class to the current link
    if (currentLinkId) {
        document.getElementById(currentLinkId).classList.add('active');
    }
</script>
<header>
        <nav>
            <ul>
                <li><a href="front.php" id="home-link">Home</a></li>
                <li class="dropdown" id="leave-link">Apply Leave
                    <div class="dropdown-content">
                        <div class="sub-dropdown">
                            <a href="casual.php">Casual</a>
                        </div>
                        <div class="sub-dropdown">
                            <a href="medical.php">Medical</a>
                        </div>
                    </div>
    </li>
                <li  class="dropdown" id="order-link">My Leave
                <div class="dropdown-content">
                        <div class="sub-dropdown">
                            <a href="display_casual.php">Casual</a>
                        </div>
                        <div class="sub-dropdown">
                            <a href="display_medical.php">Medical</a>
                        </div>
                    </div>
                </li>
               
            </ul>
        </nav>
        
        <ul>
            <a style="color:white;   font-weight: bold;font-size: 16px;" href="index.php">Logout</a>
         </ul>
    </header>
</body>
</html>
<div class="table">
<?php
// Database configuration
$servername = "localhost";  // Change this to your database server name if it's different
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$database = "leave_management";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// SQL query to calculate the total number of days
$sqli = "SELECT SUM(number_of_days) AS total_days FROM casual_records";

// Execute the query
$resulti = $conn->query($sqli);

if ($resulti->num_rows > 0) {
    // Fetch the result row
    $rowi = $resulti->fetch_assoc();
    $totalDays = $rowi["total_days"];
    
    // Output the total number of days
    echo "<div class='total-days'>";
    echo "Total Number of Leave days: <span class='total'>$totalDays</span>";
    echo "<br>Total Number of Days left: <span class='left'>" . (10 - $totalDays) . "</span>";
    echo "</div>";
} else {
    echo "<div class='no-records'>No records found.</div>";
}








// SQL query to select all records from the casual_records table
$sql = "SELECT * FROM casual_records";

// Execute the query
$result = $conn->query($sql);

// Check if there are any records
if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Department</th>
                <th>Year</th>
                <th>From Date</th>
                <th>To Date</th>
                <th>Reason</th>
                <th>Number of Days</th>
            </tr>";
    
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["name"] . "</td>
                <td>" . $row["department"] . "</td>
                <td>" . $row["year"] . "</td>
                <td>" . $row["from_date"] . "</td>
                <td>" . $row["to_date"] . "</td>
                <td>" . $row["reason"] . "</td>
                <td>" . $row["number_of_days"] . "</td>
            </tr>";
    }
    
    echo "</table>";
} else {
    echo "No records found.";
}

// Close the database connection
$conn->close();
?>
</div>
<style>
   .table {

    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center; /* Optional styling */
    padding: 20px; /* Optional styling */
}
</style>