<?php
// Check if id parameter exists
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Connect to database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "php_employee_management";

    // Create connection
    $connection = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Prepare and bind to prevent SQL injection
    $sql = "DELETE FROM employee WHERE id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        // Successful deletion
        header("location: index.php");
        exit;
    } else {
        // Error in deletion
        echo "Error deleting record: " . $connection->error;
    }
    
    $stmt->close();
    $connection->close();
} else {
    // No id provided
    header("location: index.php");
    exit;
}
?>