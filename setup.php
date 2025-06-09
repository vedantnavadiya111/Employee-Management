<?php
// Turn on error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Setup</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            padding-top: 20px;
        }
        .success {
            color: green;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4">Employee Management Database Setup</h1>
        
        <?php
        // Database connection parameters
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "php_employee_management";
        
        // Step 1: Create connection to MySQL without selecting database
        $conn = new mysqli($servername, $username, $password);
        
        // Check connection
        if ($conn->connect_error) {
            die("<div class='alert alert-danger'>Connection failed: " . $conn->connect_error . "</div>");
        }
        
        echo "<div class='alert alert-success'>Connected to MySQL successfully!</div>";
        
        // Step 2: Create database if it doesn't exist
        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success'>Database '$dbname' created successfully or already exists</div>";
        } else {
            echo "<div class='alert alert-danger'>Error creating database: " . $conn->error . "</div>";
            exit;
        }
        
        // Close the initial connection
        $conn->close();
        
        // Step 3: Connect to the database we just created/confirmed
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("<div class='alert alert-danger'>Connection to database failed: " . $conn->connect_error . "</div>");
        }
        
        // Step 4: Create table if it doesn't exist
        $sql = "CREATE TABLE IF NOT EXISTS employee (
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            email VARCHAR(100) NOT NULL,
            phone VARCHAR(20) NOT NULL,
            address VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        
        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success'>Table 'employee' created successfully or already exists</div>";
        } else {
            echo "<div class='alert alert-danger'>Error creating table: " . $conn->error . "</div>";
            exit;
        }
        
        // Step 5: Check if table is empty
        $result = $conn->query("SELECT COUNT(*) as count FROM employee");
        $row = $result->fetch_assoc();
        
        if ($row['count'] == 0) {
            // Insert sample data
            $sql = "INSERT INTO employee (name, email, phone, address) VALUES
                ('Vedant Navadiya', 'vedant.navadiya@gmail.com', '01770000000', 'Mumbai, India'),
                ('Saurabh Patel', 'saurabh.patel@gmail.com', '01776800000', 'California, USA'),
                ('Rahul Sharma', 'rahul.sharma@yahoo.com', '01714000000', 'USA'),
                ('Ankit Mehta', 'ankit.mehta@gmail.com', '01314000000', 'Canada'),
                ('Priya Singh', 'priya.singh@gmail.com', '01770025000', 'Delhi'),
                ('Rohan Gupta', 'rohan.gupta@gmail.com', '01442020103', 'UAE')";
            
            if ($conn->query($sql) === TRUE) {
                echo "<div class='alert alert-success'>Sample data inserted successfully</div>";
            } else {
                echo "<div class='alert alert-danger'>Error inserting sample data: " . $conn->error . "</div>";
            }
        } else {
            echo "<div class='alert alert-info'>Database already contains " . $row['count'] . " records</div>";
        }
        
        $conn->close();
        ?>
        
        <div class="mt-4">
            <a href="index.php" class="btn btn-primary">Go to Employee Management</a>
        </div>
    </div>
</body>
</html>
