# Employee Management System

A PHP-based employee management system that allows users to manage employee records efficiently.

## Features

- Employee records management
- Secure authentication
- Role-based access control
- Responsive UI

## Installation

1. Clone the repository
   ```
   git clone https://github.com/your-username/Employee-Management.git
   ```

2. Import the database schema
   ```
   mysql -u username -p php_employee_management < database/schema.sql
   ```

3. Configure database connection
   Edit `config.php` with your database credentials:
   ```php
   $config = [
       'servername' => 'localhost',
       'username' => 'your_username',
       'password' => 'your_password',
       'database' => 'php_employee_management'
   ];
   ```

4. Start the application
   ```
   php -S localhost:8000
   ```

## Requirements

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Web server (Apache/Nginx)

## License

This project is licensed under the MIT License - see the LICENSE file for details.