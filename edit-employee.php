<?php 

     //connect to database
     $servername = "localhost";
     $username = "root";
     $password = "";
     $database = "php_employee_management";
 
     //Create Connection
     $connection = new mysqli($servername, $username, $password, $database);
 
     //Check connection stablished or not!
     if ($connection->connect_error) {
         die("Connection failed: " . $connection->connect_error);
     }



    $id = "";
    $name = "";
    $email = "";
    $phone = "";
    $address = "";

    $errorMessage = "";
    $successMessage = "";


    if ($_SERVER['REQUEST_METHOD'] == 'GET') {

        # Request Received using GET method 
        # then editing-> show the data of the employee...
        
        //Check Id is exist or not!
       
        if (!isset($_GET["id"])) {
             #if not exist then
            header("location: ./index.php");
            exit;

        }

        //if exist employee id

        $id = $_GET["id"];

        $sql = "SELECT * FROM employee WHERE id=$id";
        $result = $connection->query($sql);
        $row = $result->fetch_assoc();

        if (!$row) {
            #if row does not consist any value
            header("location: ./index.php");
            exit;
        }

        
        //if row consist value, then read all the data from database and store it in form variable.
        $name =$row["name"];
        $email =$row["email"];
        $phone =$row["phone"];
        $address =$row["address"]; 



    }else {
        # request Reveived form POST
        # POST method update the data of Employee...
        $id = $_POST["id"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];
        
        do {
            # code...
            if (empty($id) || empty($name) || empty($email) || empty($phone) || empty($address)) {
                # code...
                $errorMessage = "All fields are required!";
                break;
            
            }
            
            $sql = "UPDATE employee SET name = '$name', email = '$email', phone = '$phone', address = '$address' WHERE id='$id'";
            
            $result = $connection->query($sql);

            if (!$result) {
                die("Invalid query : " . $connection->error);
                break;
            }

            $successMessage = "Employee Updated Successfully!";
            header("location: ./index.php");
            exit;



        } while (false);



    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
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
    <?php
    // Initialize variables
    $id = "";
    $name = "";
    $email = "";
    $phone = "";
    $address = "";
    $errorMessage = "";
    $successMessage = "";

    // Check if id parameter exists
    if (!isset($_GET["id"])) {
        header("location: index.php");
        exit;
    }

    $id = $_GET["id"];

    // Connect to database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "php_employee_management";

    // Create connection
    $connection = new mysqli($servername, $username, $password, $database);

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
            // Prepare and bind
            $sql = "UPDATE employee SET name = ?, email = ?, phone = ?, address = ? WHERE id = ?";
            $stmt = $connection->prepare($sql);
            $stmt->bind_param("ssssi", $name, $email, $phone, $address, $id);
            
            // Execute
            if ($stmt->execute()) {
                $successMessage = "Employee updated successfully";
            } else {
                $errorMessage = "Error updating employee: " . $stmt->error;
            }
            
            $stmt->close();
        }
    } else {
        // Get employee data
        $sql = "SELECT * FROM employee WHERE id = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $name = $row["name"];
            $email = $row["email"];
            $phone = $row["phone"];
            $address = $row["address"];
        } else {
            header("location: index.php");
            exit;
        }
        
        $stmt->close();
    }

    $connection->close();
    ?>

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
                        <a class="nav-link" href="create-new-employee.php">Add Employee</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <h2>Edit Employee</h2>

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
            <input type="hidden" name="id" value="<?php echo $id; ?>">
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
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="index.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>