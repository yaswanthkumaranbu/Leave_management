<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "leave_management";

// Create a connection to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$department = $_POST['department'];
$year = $_POST['year'];
$from_date = $_POST['from_date'];
$to_date = $_POST['to_date'];
$reason = $_POST['reason'];

// Calculate the number of days between From Date and To Date
$from_date_obj = new DateTime($from_date);
$to_date_obj = new DateTime($to_date);
$interval = $from_date_obj->diff($to_date_obj);
$number_of_days = $interval->days+1;


$number_of_days_with_increment = $interval->days;

// Insert data into the table
if($from_date<=$to_date){
$sql = "INSERT INTO medical_records (name, department, year, from_date, to_date, reason, number_of_days)
        VALUES ('$name', '$department', $year, '$from_date', '$to_date', '$reason', $number_of_days)";
        if ($conn->query($sql) === TRUE) {
            header("Location: display_medical.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

}
else {
    echo "Enter records properly";
}



// Close the database connection
$conn->close();
?>
