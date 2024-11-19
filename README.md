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

    Install dependencies:

composer install
npm install

Configure the .env file with your database credentials:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password

Run database migrations:

php artisan migrate

Start the development server:

php artisan serve

Open the app in your browser:

http://localhost:8000
