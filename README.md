# Inventory Management System

A web-based **Inventory Management System** built using **HTML**, **CSS**, **Bootstrap**, **JavaScript**, **Laravel**, and **MySQL**. This system enables efficient management of inventory data, including adding, editing, filtering, and deleting items. It was developed as a project for the **Software Engineering Lab** course.

## Features

- **User Roles**: Admin and Warehouse Staff with distinct permissions.
- **Inventory Management**:
  - Add, edit, and delete items.
  - Filter items by category, warehouse, and expiration status.
  - Manage expired products with offer prices.
- **User Management**: Admins can manage warehouse staff access.
- **Dashboard**: Visualize inventory insights using **Chart.js**.
- **AJAX Filtering**: Dynamic updates without page reloads.

## Technologies Used

- **Frontend**: HTML, CSS, Bootstrap, JavaScript
- **Backend**: Laravel (PHP Framework)
- **Database**: MySQL
- **Charts**: Chart.js

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/your-username/inventory-management-system.git
   cd inventory-management-system

2. Install dependencies:
    ```bash
    composer install
    npm install

3. Configure the .env file with your database credentials:
    ```makefile
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database
    DB_USERNAME=your_username
    DB_PASSWORD=your_password

4. Run database migrations:
   ```bash
    php artisan migrate
   
5. Start the development server:
   ```bash
    php artisan serve
   
5. Open the app in your browser:
   ```bash
    http://localhost:8000

## Credits
Developed by <b>Sadnur Islam </b>
