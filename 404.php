<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found - Employee Management System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #748EC6;
            --secondary-color: #1e3a8a;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f2f5fa;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .error-container {
            text-align: center;
            max-width: 500px;
            padding: 40px;
        }
        
        .error-code {
            font-size: 120px;
            font-weight: 800;
            color: var(--primary-color);
            line-height: 1;
            margin-bottom: 20px;
        }
        
        .error-message {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 30px;
            color: #1e293b;
        }
        
        .error-description {
            color: #64748b;
            margin-bottom: 30px;
        }
        
        .btn-return {
            background-color: var(--primary-color);
            color: white;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
        }
        
        .btn-return:hover {
            background-color: var(--secondary-color);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            color: white;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-code">404</div>
        <h1 class="error-message">Page Not Found</h1>
        <p class="error-description">The page you're looking for doesn't exist or has been moved.</p>
        <a href="landing.php" class="btn-return">
            <i class="fas fa-home me-2"></i> Return Home
        </a>
    </div>
</body>
</html>
