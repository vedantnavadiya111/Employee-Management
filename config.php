<?php
/**
 * Database Configuration
 * 
 * This file contains database connection settings.
 * When deploying to different environments, only this file needs to be modified.
 */

// Database connection parameters
$config = [
    'servername' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'php_employee_management'
];

/**
 * Creates a database connection using the configuration parameters
 * 
 * @return mysqli|null The database connection or null on failure
 */
function getConnection() {
    global $config;
    
    try {
        $connection = new mysqli(
            $config['servername'],
            $config['username'],
            $config['password'],
            $config['database']
        );
        
        if ($connection->connect_error) {
            throw new Exception("Connection failed: " . $connection->connect_error);
        }
        
        return $connection;
    } catch (Exception $e) {
        // Log error (in a production environment)
        error_log($e->getMessage());
        return null;
    }
}

// Function to safely get POST variables
function getPostValue($key) {
    return isset($_POST[$key]) ? htmlspecialchars(trim($_POST[$key])) : '';
}

// Function to safely get GET variables
function getGetValue($key) {
    return isset($_GET[$key]) ? htmlspecialchars(trim($_GET[$key])) : '';
}
?>
