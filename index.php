<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Employee Management System</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        :root {
            --primary-color: #748EC6;
            --secondary-color: #1e3a8a;
            --light-color: #f2f5fa;
            --dark-color: #0f172a;
            --gray-color: #64748b;
        }
        
        /* for showing validation msg red */
        *{
            padding: 0px;
            margin:0px;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--light-color);
        }
        
        .navbar{
            margin: 0px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        
        .error {
            color: red;
            font-style: italic;
        }
        
        .mycolor{
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        }
        
        .text-w{
            color:#748EC6;
        }
        .background-color-w{
            color:#F2F5FA;
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
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark mycolor">
        <div class="container">
            <a class="navbar-brand" href="landing.php">
                <i class="fas fa-users-cog me-2"></i>EmployeePro
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="create-new-employee.php">Add Employee</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            More Options
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Reports</a></li>
                            <li><a class="dropdown-item" href="#">Departments</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="landing.php">
                            <i class="fas fa-sign-out-alt me-1"></i>Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <h2 class="text-center">List of Employees</h2>
        <a href="./create-new-employee.php" role="button" class="btn btn-primary">New Employee</a>
        <br><br>
        
        <div class="alert alert-info">
            <p>If you're seeing errors, make sure to:</p>
            <ol>
                <li>Run the <a href="setup.php">database setup script</a> first</li>
                <li>Verify that MySQL is running in XAMPP</li>
            </ol>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Check if we need to include config.php
                if (!file_exists('config.php')) {
                    echo "<tr><td colspan='7' class='text-center text-danger'>Error: config.php file not found. Please run the setup script first.</td></tr>";
                } else {
                    // Include the database connection
                    include 'config.php';

                    try {
                        // Read all data from database table for employee details
                        $sql = "SELECT * FROM employee";
                        $result = $connection->query($sql);

                        if (!$result) {
                            throw new Exception("Invalid query: " . $connection->error);
                        }

                        // Read data of each row
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                // Escape output to prevent XSS attacks
                                $id = htmlspecialchars($row['id']);
                                $name = htmlspecialchars($row['name']);
                                $email = htmlspecialchars($row['email']);
                                $phone = htmlspecialchars($row['phone']);
                                $address = htmlspecialchars($row['address']);
                                $created_at = htmlspecialchars($row['created_at']);
                                
                                echo "
                                <tr>
                                    <td>$id</td>
                                    <td>$name</td>
                                    <td>$email</td>
                                    <td>$phone</td>
                                    <td>$address</td>
                                    <td>$created_at</td>
                                    <td>
                                        <a href='./edit-employee.php?id=$id' class='btn btn-primary btn-sm'>Edit</a>
                                        <a href='./delete-employee.php?id=$id' class='btn btn-danger btn-sm' 
                                           onclick='return confirm(\"Are you sure you want to delete this employee?\")'>Delete</a>
                                    </td>
                                </tr>
                                ";
                            }
                        } else {
                            echo "<tr><td colspan='7' class='text-center'>No employees found. <a href='create-new-employee.php'>Add some</a>!</td></tr>";
                        }
                    } catch (Exception $e) {
                        echo "<tr><td colspan='7' class='text-center text-danger'>Error: " . $e->getMessage() . "</td></tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Dashboard Stats -->
    <div class="container mb-5">
        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="card text-white bg-primary">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title">Total Employees</h6>
                            <h2 class="mb-0">
                                <?php echo isset($result) && $result ? $result->num_rows : '0'; ?>
                            </h2>
                        </div>
                        <i class="fas fa-users fa-3x opacity-50"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card text-white bg-success">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title">Active Employees</h6>
                            <h2 class="mb-0">
                                <?php echo isset($result) && $result ? $result->num_rows : '0'; ?>
                            </h2>
                        </div>
                        <i class="fas fa-user-check fa-3x opacity-50"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card text-white bg-warning">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title">Departments</h6>
                            <h2 class="mb-0">4</h2>
                        </div>
                        <i class="fas fa-building fa-3x opacity-50"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card text-white bg-danger">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title">New This Month</h6>
                            <h2 class="mb-0">3</h2>
                        </div>
                        <i class="fas fa-user-plus fa-3x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>Employee Management System</h5>
                    <p class="mb-0">A comprehensive solution for managing your workforce efficiently.</p>
                </div>
                <div class="col-md-3">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="index.php" class="text-white">Home</a></li>
                        <li><a href="create-new-employee.php" class="text-white">Add Employee</a></li>
                        <li><a href="setup.php" class="text-white">Database Setup</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Contact Us</h5>
                    <address class="mb-0">
                        <p><i class="fas fa-envelope me-2"></i> support@employeepro.com</p>
                        <p><i class="fas fa-phone me-2"></i> +1 (123) 456-7890</p>
                    </address>
                </div>
            </div>
            <hr>
            <div class="text-center">
                <p class="mb-0">&copy; <?php echo date('Y'); ?> EmployeePro. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Add Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</body>
</html>