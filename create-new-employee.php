<?php
    // Include database configuration
    require_once 'config.php';
    
    // Initialize variables
    $name = "";
    $email = "";
    $phone = "";
    $address = "";
    $errorMessage = "";
    $successMessage = "";

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get form data
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];

        // Validate data
        if (empty($name) || empty($email) || empty($phone) || empty($address)) {
            $errorMessage = "All fields are required";
        } else {
            try {
                // Get database connection
                $connection = getConnection();
                
                if (!$connection) {
                    throw new Exception("Database connection failed");
                }
                
                // Prepare and bind to prevent SQL injection
                $sql = "INSERT INTO employee (name, email, phone, address) VALUES (?, ?, ?, ?)";
                $stmt = $connection->prepare($sql);
                
                if (!$stmt) {
                    throw new Exception("Prepare failed: " . $connection->error);
                }
                
                $stmt->bind_param("ssss", $name, $email, $phone, $address);
                
                // Execute
                if ($stmt->execute()) {
                    $successMessage = "Employee Added Successfully!";
                    
                    // Clear form
                    $name = "";
                    $email = "";
                    $phone = "";
                    $address = "";
                    
                    // Redirect to index page
                    header("location: ./index.php");
                    exit;
                } else {
                    throw new Exception("Execute failed: " . $stmt->error);
                }
                
                $stmt->close();
                $connection->close();
            } catch (Exception $e) {
                $errorMessage = $e->getMessage();
                // Additional debugging information
                if (strpos($errorMessage, "actively refused it") !== false) {
                    $errorMessage .= " - Please make sure MySQL server is running.";
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Employee</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* Same styles as index.php */
        *{
            padding: 0px;
            margin:0px;
        }
        .navbar{
            margin: 0px;
        }
        .error {
            color: red;
            font-style: italic;
        }
        .mycolor{
            background: #748EC6;
        }
        .section-bg {
            background-color: #f2f5fa;
            padding: 0px;
            margin: 0px;
        }
        .card-shadow{
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark mycolor">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Employee Management</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Add Employee</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <h2>Create New Employee</h2>

        <?php
        if (!empty($errorMessage)) {
            echo "
            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }

        if (!empty($successMessage)) {
            echo "
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>$successMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>

        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Phone</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="index.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>