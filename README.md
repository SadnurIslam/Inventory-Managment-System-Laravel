# Inventory Management System (IMS)

## Overview
The **Inventory Management System (IMS)** is a robust and user-friendly web application designed to streamline inventory operations. It offers tools for real-time tracking, stock organization, reporting, and role-based access control, making it ideal for businesses of all sizes.

## Features
### Key Features
- **User Roles & Access**:
  - Admin Role: Full system control, including user and inventory management.
  - Clerk Role: Limited access to manage daily tasks like sales and purchases.
  - Role-Based Security: Protect sensitive data with customizable permissions.
  
- **Real-Time Inventory Tracking**:
  - Automatic stock updates after transactions.
  - Low stock alerts for timely restocking.
  - Barcode scanning for efficient stock management.
  
- **Stock Management**:
  - Multi-warehouse inventory tracking.
  - Stock adjustments for damage or discrepancies.
  - Audit tools for periodic checks.

- **Reports & Analytics**:
  - Comprehensive inventory, sales, and purchase reports.
  - Customizable dashboards for key metrics.
  - Insights into trends and product performance.

### Additional Features
- Mobile-responsive design for easy access on any device.
- Product categorization with support for variants (e.g., sizes, colors).
- Supplier and customer management.

## Technology Stack
- **Frontend**: React.js or Angular, Bootstrap
- **Backend**: Node.js with Express.js or Django
- **Database**: MySQL or MongoDB
- **Hosting**: AWS, Azure, or Google Cloud
- **Security**: Role-based authentication, SSL/TLS encryption

## Installation
### Prerequisites
- **System Requirements**:
  - Processor: Dual-Core or higher
  - RAM: 4 GB or more
  - Disk Space: 500 MB
- **Software Requirements**:
  - Node.js (version >= 14)
  - MySQL or MongoDB
  - Git


## Features

- **User Roles**: Admin and Warehouse Staff with distinct permissions.
- **Inventory Management**:
  - Add, edit, and delete items.
  - Filter items by category, warehouse, and expiration status.
  - Manage expired products with offer prices.
- **User Management**: Admins can manage warehouse staff access.
- **Dashboard**: Visualize inventory insights using **Chart.js**.
- **Reports**: Generate report for specific time range.
- **Orders**: Manage orders and generate invoice.
- **AJAX Filtering**: Dynamic updates without page reloads.

## Technologies Used

- **Frontend**: HTML, CSS, Bootstrap, JavaScript
- **Backend**: Laravel (PHP Framework)
- **Database**: MySQL
- **Charts**: Chart.js

## Usage
### Admin Features:
- Manage users, warehouses, and products.
- Generate and download inventory and sales reports.
- Set permissions for warehouse staff.

### Warehouse Staff Features:
- Update stock levels and product details.
- Handle daily sales and purchase tasks.
- Access insights via the dashboard.

---

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/SadnurIslam/Inventory-Managment-System-Laravel.git
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

