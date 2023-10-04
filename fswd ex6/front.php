<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Records</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

    

        .table {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            padding: 20px;
            border-radius: 5px;
            transition: transform 0.3s ease;
        }

        .table table {
            width: 100%;
            border-collapse: collapse;
        }

        .table table th,
        .table table td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        .table table th {
            background-color: #333;
            color: white;
        }

        .table table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .table h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        @media (max-width: 768px) {
            .table {
                max-width: 90%;
            }
        }

        @media (max-width: 480px) {
            .table {
                max-width: 100%;
            }
        }

        .table:hover {
            transform: scale(1.05);
        }
        .table {
    width:auto; /* Set the width of your div */
    height: auto; /* Set the height of your div */
    position: absolute;
    top: 20%;
    left:25%;
    /* transform: translate(-50%, -50%); */
    text-align: center; /* Optional styling */
    padding: 20px; /* Optional styling */
}
.active {
text-decoration: underline; /* Highlight color */
color: #fff; /* Text color on highlight */
}

/* Style for other navigation items (optional) */
nav ul li {
display: inline;
margin-right: 20px;
}
    </style>
</head>
<body>
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
            <li class="dropdown" id="order-link">My Leave
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
        <a style="color:white; font-weight: bold; font-size: 16px;" href="index.php">Logout</a>
    </ul>
</header>
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

// SQL query to select all records from the casual_records table
$sql_casual = "SELECT * FROM casual_records LIMIT 2";

// Execute the query for casual_records
$result_casual = $conn->query($sql_casual);

// SQL query to select all records from the medical_records table
$sql_medical = "SELECT * FROM medical_records LIMIT 2";

// Execute the query for medical_records
$result_medical = $conn->query($sql_medical);

echo "<h1>Past 2 Casual Leave Records</h1>";
if ($result_casual->num_rows > 0) {
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

    // Output data of each row for casual_records
    while ($row = $result_casual->fetch_assoc()) {
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
    echo "No casual records found.";
}

echo "<br><br><h1>Past 2 Medical Leave Records</h1>";
if ($result_medical->num_rows > 0) {
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

    // Output data of each row for medical_records
    while ($row = $result_medical->fetch_assoc()) {
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
    echo "No medical records found.";
}

// Close the database connection
$conn->close();
?>
</div>
</body>
</html>
