<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management System - Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* Custom Styles */
        :root {
            --primary-color: #748EC6;
            --secondary-color: #1e3a8a;
            --light-color: #f2f5fa;
            --dark-color: #0f172a;
            --gray-color: #64748b;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--light-color);
            color: var(--dark-color);
            padding: 0;
            margin: 0;
        }
        
        .navbar {
            background-color: var(--primary-color);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            padding: 15px 0;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
        }

        .hero-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 100px 0 70px;
            position: relative;
            overflow: hidden;
        }

        .hero-section::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 100%;
            height: 80px;
            background-color: var(--light-color);
            clip-path: polygon(0 45%, 100% 0, 100% 100%, 0% 100%);
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .hero-subtitle {
            font-size: 1.3rem;
            margin-bottom: 30px;
            opacity: 0.9;
        }

        .btn-hero {
            background-color: white;
            color: var(--primary-color);
            font-weight: 600;
            padding: 12px 30px;
            border-radius: 50px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
        }

        .btn-hero:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
            background-color: var(--light-color);
        }

        .hero-image {
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }

        .feature-card {
            background-color: white;
            border-radius: 12px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            height: 100%;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }

        .feature-icon {
            width: 70px;
            height: 70px;
            background-color: var(--light-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            color: var(--primary-color);
            font-size: 28px;
        }

        .pricing-card {
            background-color: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            margin-bottom: 30px;
            position: relative;
        }

        .pricing-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }

        .pricing-header {
            padding: 30px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            text-align: center;
        }

        .pricing-popular {
            position: absolute;
            top: 15px;
            right: 15px;
            background-color: var(--secondary-color);
            color: white;
            padding: 5px 15px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .pricing-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .pricing-price {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 0;
        }

        .pricing-duration {
            opacity: 0.8;
        }

        .pricing-features {
            padding: 30px;
        }

        .pricing-feature {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            color: var(--gray-color);
        }

        .pricing-feature i {
            color: var(--primary-color);
            margin-right: 10px;
        }

        .pricing-cta {
            padding: 0 30px 30px;
        }

        .btn-pricing {
            display: block;
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 12px;
            border-radius: 6px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-pricing:hover {
            background-color: var(--secondary-color);
            color: white;
        }

        .testimonial-section {
            background-color: white;
            padding: 80px 0;
        }

        .testimonial-card {
            background-color: var(--light-color);
            border-radius: 12px;
            padding: 30px;
            margin-bottom: 30px;
            position: relative;
        }

        .testimonial-text {
            font-style: italic;
            margin-bottom: 20px;
            color: var(--gray-color);
        }

        .testimonial-author {
            display: flex;
            align-items: center;
        }

        .testimonial-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 15px;
            object-fit: cover;
        }

        .testimonial-name {
            font-weight: 600;
            margin-bottom: 0;
        }

        .testimonial-role {
            color: var(--gray-color);
            font-size: 0.9rem;
        }

        .footer {
            background-color: var(--dark-color);
            color: white;
            padding: 60px 0 30px;
        }

        .footer-title {
            font-weight: 700;
            margin-bottom: 25px;
            font-size: 1.2rem;
        }

        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .footer-links a:hover {
            color: white;
            text-decoration: none;
        }

        .social-icons {
            display: flex;
            margin-top: 20px;
        }

        .social-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: rgba(255,255,255,0.1);
            border-radius: 50%;
            margin-right: 10px;
            color: white;
            transition: all 0.3s ease;
        }

        .social-icon:hover {
            background-color: var(--primary-color);
            transform: translateY(-3px);
        }

        .copyright {
            margin-top: 30px;
            padding-top: 30px;
            border-top: 1px solid rgba(255,255,255,0.1);
            text-align: center;
            color: rgba(255,255,255,0.7);
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="landing.php">
                <i class="fas fa-users-cog me-2"></i>EmployeePro
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#pricing">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimonials">Testimonials</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-light ms-2" href="signup.php">Sign Up</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="hero-title">Manage Your Employees with Ease</h1>
                    <p class="hero-subtitle">Streamline your HR operations with our comprehensive employee management system. Track employee data, performance, and more.</p>
                    <a href="signup.php" class="btn btn-hero">Get Started <i class="fas fa-arrow-right ms-2"></i></a>
                    <a href="index.php" class="btn btn-outline-light ms-3">View Demo</a>
                </div>
                <div class="col-lg-6">
                    <img src="https://cdn.pixabay.com/photo/2017/07/31/11/21/people-2557396_1280.jpg" alt="Employee Management" class="img-fluid hero-image rounded-3 shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5" id="features">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold">Powerful Features</h2>
                <p class="lead text-muted">Everything you need to manage your workforce efficiently</p>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3>Employee Database</h3>
                        <p>Store and manage all employee information in one secure location with easy search and filtering.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3>Performance Tracking</h3>
                        <p>Monitor employee performance with customizable metrics and generate insightful reports.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <h3>Attendance Management</h3>
                        <p>Track attendance, approve time-off requests, and manage work schedules efficiently.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-file-contract"></i>
                        </div>
                        <h3>Document Management</h3>
                        <p>Store and organize employee documents securely with version control and easy access.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-award"></i>
                        </div>
                        <h3>Recognition System</h3>
                        <p>Recognize and reward top performers to boost morale and productivity across teams.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3>Data Security</h3>
                        <p>Keep your employee data secure with enterprise-grade security and role-based access controls.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section class="py-5 bg-light" id="pricing">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold">Flexible Pricing Plans</h2>
                <p class="lead text-muted">Choose the plan that fits your business needs</p>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="pricing-card">
                        <div class="pricing-header">
                            <h3 class="pricing-title">Starter</h3>
                            <h2 class="pricing-price">$29<span class="pricing-duration">/month</span></h2>
                        </div>
                        <div class="pricing-features">
                            <div class="pricing-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Up to 25 employees</span>
                            </div>
                            <div class="pricing-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Basic employee database</span>
                            </div>
                            <div class="pricing-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Email support</span>
                            </div>
                            <div class="pricing-feature">
                                <i class="fas fa-times-circle"></i>
                                <span>Performance tracking</span>
                            </div>
                            <div class="pricing-feature">
                                <i class="fas fa-times-circle"></i>
                                <span>Advanced reporting</span>
                            </div>
                        </div>
                        <div class="pricing-cta">
                            <a href="signup.php" class="btn btn-pricing">Get Started</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="pricing-card">
                        <div class="pricing-popular">Most Popular</div>
                        <div class="pricing-header">
                            <h3 class="pricing-title">Professional</h3>
                            <h2 class="pricing-price">$79<span class="pricing-duration">/month</span></h2>
                        </div>
                        <div class="pricing-features">
                            <div class="pricing-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Up to 100 employees</span>
                            </div>
                            <div class="pricing-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Advanced employee database</span>
                            </div>
                            <div class="pricing-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Priority email support</span>
                            </div>
                            <div class="pricing-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Performance tracking</span>
                            </div>
                            <div class="pricing-feature">
                                <i class="fas fa-times-circle"></i>
                                <span>Advanced reporting</span>
                            </div>
                        </div>
                        <div class="pricing-cta">
                            <a href="signup.php" class="btn btn-pricing">Get Started</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="pricing-card">
                        <div class="pricing-header">
                            <h3 class="pricing-title">Enterprise</h3>
                            <h2 class="pricing-price">$199<span class="pricing-duration">/month</span></h2>
                        </div>
                        <div class="pricing-features">
                            <div class="pricing-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Unlimited employees</span>
                            </div>
                            <div class="pricing-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Complete employee database</span>
                            </div>
                            <div class="pricing-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>24/7 phone & email support</span>
                            </div>
                            <div class="pricing-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Performance tracking</span>
                            </div>
                            <div class="pricing-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Advanced reporting</span>
                            </div>
                        </div>
                        <div class="pricing-cta">
                            <a href="signup.php" class="btn btn-pricing">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonial-section" id="testimonials">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold">What Our Customers Say</h2>
                <p class="lead text-muted">Discover how EmployeePro is helping businesses</p>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <p class="testimonial-text">"EmployeePro has completely transformed how we manage our team. The interface is intuitive and the features are exactly what we needed."</p>
                        <div class="testimonial-author">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="John Smith" class="testimonial-avatar">
                            <div>
                                <h5 class="testimonial-name">John Smith</h5>
                                <p class="testimonial-role">HR Director, TechCorp</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <p class="testimonial-text">"As a small business owner, I needed something simple yet powerful. EmployeePro delivered exactly that, at a price point that makes sense."</p>
                        <div class="testimonial-author">
                            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Sarah Johnson" class="testimonial-avatar">
                            <div>
                                <h5 class="testimonial-name">Sarah Johnson</h5>
                                <p class="testimonial-role">Owner, Cafe Deluxe</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <p class="testimonial-text">"The reporting features alone are worth the investment. We can now make data-driven decisions about our workforce planning and development."</p>
                        <div class="testimonial-author">
                            <img src="https://randomuser.me/api/portraits/men/67.jpg" alt="Michael Chen" class="testimonial-avatar">
                            <div>
                                <h5 class="testimonial-name">Michael Chen</h5>
                                <p class="testimonial-role">CEO, GrowthWorks Inc.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5 class="footer-title">EmployeePro</h5>
                    <p>Simplifying employee management for businesses of all sizes. Our platform helps you focus on what matters most - your people.</p>
                    <div class="social-icons">
                        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-md-2 mb-4">
                    <h5 class="footer-title">Company</h5>
                    <ul class="footer-links">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Press</a></li>
                    </ul>
                </div>
                <div class="col-md-2 mb-4">
                    <h5 class="footer-title">Features</h5>
                    <ul class="footer-links">
                        <li><a href="#">Employee Database</a></li>
                        <li><a href="#">Performance</a></li>
                        <li><a href="#">Attendance</a></li>
                        <li><a href="#">Documents</a></li>
                    </ul>
                </div>
                <div class="col-md-2 mb-4">
                    <h5 class="footer-title">Resources</h5>
                    <ul class="footer-links">
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">Documentation</a></li>
                        <li><a href="#">API</a></li>
                        <li><a href="#">Community</a></li>
                    </ul>
                </div>
                <div class="col-md-2 mb-4">
                    <h5 class="footer-title">Legal</h5>
                    <ul class="footer-links">
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Security</a></li>
                        <li><a href="#">Compliance</a></li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2023 EmployeePro. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
