<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Employee Management System</title>
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
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 0;
        }
        
        .signup-container {
            background-color: white;
            border-radius: 12px;
            overflow: hidden;
            width: 1000px;
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
            display: flex;
        }
        
        .signup-image {
            width: 50%;
            background-image: url('https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80');
            background-size: cover;
            background-position: center;
            position: relative;
        }
        
        .signup-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(116, 142, 198, 0.8) 0%, rgba(30, 58, 138, 0.8) 100%);
        }
        
        .signup-form {
            width: 50%;
            padding: 40px;
        }
        
        .signup-title {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--dark-color);
        }
        
        .signup-subtitle {
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
        
        .btn-signup {
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 12px 0;
            font-weight: 600;
            margin-top: 10px;
            transition: all 0.3s ease;
        }
        
        .btn-signup:hover {
            background-color: var(--secondary-color);
        }
        
        .signup-footer {
            text-align: center;
            margin-top: 20px;
            color: #64748b;
        }
        
        .signup-footer a {
            color: var(--primary-color);
            font-weight: 600;
            text-decoration: none;
        }
        
        .signup-footer a:hover {
            color: var(--secondary-color);
        }
        
        .social-signup {
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
        
        .form-check {
            margin-bottom: 20px;
        }
        
        .form-check-label {
            color: #64748b;
        }
        
        .form-check-label a {
            color: var(--primary-color);
            text-decoration: none;
        }
        
        .form-check-label a:hover {
            color: var(--secondary-color);
        }
        
        .signup-plans {
            margin-top: 20px;
            margin-bottom: 20px;
        }
        
        .plan-option {
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .plan-option:hover {
            border-color: var(--primary-color);
            background-color: #f8fafc;
        }
        
        .plan-option.selected {
            border-color: var(--primary-color);
            background-color: rgba(116, 142, 198, 0.1);
        }
        
        .plan-title {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 5px;
        }
        
        .plan-price {
            font-weight: 700;
            color: var(--primary-color);
        }
        
        .plan-description {
            color: #64748b;
            font-size: 0.9rem;
            margin-bottom: 0;
        }

        @media (max-width: 768px) {
            .signup-container {
                flex-direction: column;
                width: 90%;
            }
            
            .signup-image, .signup-form {
                width: 100%;
            }
            
            .signup-image {
                height: 200px;
            }
            
            .signup-form {
                padding: 30px;
            }
        }
    </style>
</head>
<body>
    <div class="signup-container">
        <div class="signup-image">
            <div class="position-absolute top-0 start-0 p-4">
                <a href="landing.php" class="text-white text-decoration-none">
                    <i class="fas fa-arrow-left me-2"></i> Back to Home
                </a>
            </div>
        </div>
        <div class="signup-form">
            <a href="landing.php" class="d-flex align-items-center mb-4 text-decoration-none">
                <i class="fas fa-users-cog fs-4 me-2 text-primary"></i>
                <span class="fw-bold fs-4 text-dark">EmployeePro</span>
            </a>
            <h1 class="signup-title">Create an Account</h1>
            <p class="signup-subtitle">Get started with your free trial today</p>
            
            <form action="index.php" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="firstName" placeholder="First Name">
                            <label for="firstName">First Name</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="lastName" placeholder="Last Name">
                            <label for="lastName">Last Name</label>
                        </div>
                    </div>
                </div>
                
                <div class="form-floating">
                    <input type="email" class="form-control" id="email" placeholder="name@example.com">
                    <label for="email">Email address</label>
                </div>
                
                <div class="form-floating">
                    <input type="text" class="form-control" id="company" placeholder="Company Name">
                    <label for="company">Company Name</label>
                </div>
                
                <div class="form-floating">
                    <input type="password" class="form-control" id="password" placeholder="Password">
                    <label for="password">Password</label>
                </div>
                
                <h5 class="mt-4 mb-3">Select a Plan</h5>
                <div class="signup-plans">
                    <div class="plan-option selected">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <div class="plan-title">Starter</div>
                                <p class="plan-description">Perfect for small businesses</p>
                            </div>
                            <div class="plan-price">$29/mo</div>
                        </div>
                    </div>
                    <div class="plan-option">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <div class="plan-title">Professional</div>
                                <p class="plan-description">For growing companies</p>
                            </div>
                            <div class="plan-price">$79/mo</div>
                        </div>
                    </div>
                    <div class="plan-option">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <div class="plan-title">Enterprise</div>
                                <p class="plan-description">For large organizations</p>
                            </div>
                            <div class="plan-price">$199/mo</div>
                        </div>
                    </div>
                </div>
                
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="terms">
                    <label class="form-check-label" for="terms">
                        I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
                    </label>
                </div>
                
                <button type="submit" class="btn btn-signup w-100">Create Account</button>
            </form>
            
            <div class="divider">
                <span>or sign up with</span>
            </div>
            
            <div class="social-signup">
                <a href="#" class="social-btn google"><i class="fab fa-google"></i></a>
                <a href="#" class="social-btn facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social-btn twitter"><i class="fab fa-twitter"></i></a>
            </div>
            
            <div class="signup-footer">
                Already have an account? <a href="login.php">Sign in</a>
            </div>
        </div>
    </div>
    
    <script>
        // Simple script to handle plan selection
        document.querySelectorAll('.plan-option').forEach(plan => {
            plan.addEventListener('click', function() {
                document.querySelectorAll('.plan-option').forEach(p => p.classList.remove('selected'));
                this.classList.add('selected');
            });
        });
    </script>
</body>
</html>
