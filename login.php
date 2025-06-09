<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Employee Management System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        :root {
            --primary-color: #748EC6;
            --secondary-color: #1e3a8a;
            --light-color: #f2f5fa;
            --dark-color: #0f172a;
        }
        
        body {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .login-container {
            background-color: white;
            border-radius: 12px;
            overflow: hidden;
            width: 900px;
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
            display: flex;
        }
        
        .login-image {
            width: 50%;
            background-image: url('https://images.unsplash.com/photo-1600880292203-757bb62b4baf?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80');
            background-size: cover;
            background-position: center;
            position: relative;
        }
        
        .login-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(116, 142, 198, 0.8) 0%, rgba(30, 58, 138, 0.8) 100%);
        }
        
        .login-form {
            width: 50%;
            padding: 50px;
        }
        
        .login-title {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--dark-color);
        }
        
        .login-subtitle {
            color: #64748b;
            margin-bottom: 30px;
        }
        
        .form-floating {
            margin-bottom: 20px;
        }
        
        .form-control {
            border-radius: 8px;
            padding: 12px 15px;
            border: 1px solid #e2e8f0;
            background-color: #f8fafc;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(116, 142, 198, 0.25);
        }
        
        .btn-login {
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 12px 0;
            font-weight: 600;
            margin-top: 10px;
            transition: all 0.3s ease;
        }
        
        .btn-login:hover {
            background-color: var(--secondary-color);
        }
        
        .login-footer {
            text-align: center;
            margin-top: 20px;
            color: #64748b;
        }
        
        .login-footer a {
            color: var(--primary-color);
            font-weight: 600;
            text-decoration: none;
        }
        
        .login-footer a:hover {
            color: var(--secondary-color);
        }
        
        .social-login {
            margin-top: 20px;
            text-align: center;
        }
        
        .social-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #f1f5f9;
            margin: 0 5px;
            color: #64748b;
            transition: all 0.3s ease;
        }
        
        .social-btn:hover {
            transform: translateY(-3px);
        }
        
        .google:hover {
            background-color: #EA4335;
            color: white;
        }
        
        .facebook:hover {
            background-color: #1877F2;
            color: white;
        }
        
        .twitter:hover {
            background-color: #1DA1F2;
            color: white;
        }
        
        .divider {
            display: flex;
            align-items: center;
            margin: 25px 0;
            color: #94a3b8;
        }
        
        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #e2e8f0;
        }
        
        .divider span {
            padding: 0 10px;
        }
        
        .remember-me {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .form-check-label {
            color: #64748b;
        }
        
        .forgot-password {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }
        
        .forgot-password:hover {
            color: var(--secondary-color);
        }

        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
                width: 90%;
            }
            
            .login-image, .login-form {
                width: 100%;
            }
            
            .login-image {
                height: 200px;
            }
            
            .login-form {
                padding: 30px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-image">
            <div class="position-absolute top-0 start-0 p-4">
                <a href="landing.php" class="text-white text-decoration-none">
                    <i class="fas fa-arrow-left me-2"></i> Back to Home
                </a>
            </div>
        </div>
        <div class="login-form">
            <a href="landing.php" class="d-flex align-items-center mb-4 text-decoration-none">
                <i class="fas fa-users-cog fs-4 me-2 text-primary"></i>
                <span class="fw-bold fs-4 text-dark">EmployeePro</span>
            </a>
            <h1 class="login-title">Welcome Back!</h1>
            <p class="login-subtitle">Please sign in to access your account</p>
            
            <form action="index.php" method="post">
                <div class="form-floating">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                
                <div class="remember-me">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">
                            Remember me
                        </label>
                    </div>
                    <a href="#" class="forgot-password">Forgot password?</a>
                </div>
                
                <button type="submit" class="btn btn-login w-100">Sign in</button>
            </form>
            
            <div class="divider">
                <span>or continue with</span>
            </div>
            
            <div class="social-login">
                <a href="#" class="social-btn google"><i class="fab fa-google"></i></a>
                <a href="#" class="social-btn facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social-btn twitter"><i class="fab fa-twitter"></i></a>
            </div>
            
            <div class="login-footer">
                Don't have an account? <a href="signup.php">Sign up</a>
            </div>
        </div>
    </div>
</body>
</html>
