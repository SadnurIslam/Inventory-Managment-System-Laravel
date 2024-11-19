<h1>Inventory Management System</h1>
    <p>
        A web-based <strong>Inventory Management System</strong> built using <strong>HTML</strong>, <strong>CSS</strong>, 
        <strong>Bootstrap</strong>, <strong>JavaScript</strong>, <strong>Laravel</strong>, and <strong>MySQL</strong>. 
        This system enables efficient management of inventory data, including adding, editing, filtering, and deleting items. 
        It was developed as a project for the <strong>Software Engineering Lab</strong> course.
    </p>

    <h2>Features</h2>
    <ul>
        <li><strong>User Roles:</strong> Admin and Warehouse Staff with distinct permissions.</li>
        <li><strong>Inventory Management:</strong>
            <ul>
                <li>Add, edit, and delete items.</li>
                <li>Filter items by category, warehouse, and expiration status.</li>
                <li>Manage expired products with offer prices.</li>
            </ul>
        </li>
        <li><strong>User Management:</strong> Admins can manage warehouse staff access.</li>
        <li><strong>Dashboard:</strong> Visualize inventory insights using <strong>Chart.js</strong>.</li>
        <li><strong>AJAX Filtering:</strong> Dynamic updates without page reloads.</li>
    </ul>

    <h2>Technologies Used</h2>
    <ul>
        <li><strong>Frontend:</strong> HTML, CSS, Bootstrap, JavaScript</li>
        <li><strong>Backend:</strong> Laravel (PHP Framework)</li>
        <li><strong>Database:</strong> MySQL</li>
        <li><strong>Charts:</strong> Chart.js</li>
    </ul>

    <h2>Installation</h2>
    <ol>
        <li>Clone the repository:
            <pre><code>git clone https://github.com/your-username/inventory-management-system.git</code></pre>
        </li>
        <li>Navigate to the project directory:
            <pre><code>cd inventory-management-system</code></pre>
        </li>
        <li>Install dependencies:
            <pre><code>composer install</code></pre>
        </li>
        <li>Configure the <code>.env</code> file with your database credentials.</li>
        <li>Run database migrations:
            <pre><code>php artisan migrate</code></pre>
        </li>
        <li>Start the development server:
            <pre><code>php artisan serve</code></pre>
        </li>
        <li>Open the app in your browser: <a href="http://localhost:8000" target="_blank">http://localhost:8000</a></li>
    </ol>

    <h2>Usage</h2>
    <p>Once the application is running, you can:</p>
    <ul>
        <li>Access the dashboard to view a summary of inventory.</li>
        <li>Manage inventory items, including adding, editing, and deleting.</li>
        <li>Filter inventory items dynamically by category or expiration status.</li>
        <li>Manage warehouse staff access (Admin only).</li>
    </ul>

    <h2>Screenshots</h2>
    <p><strong>Dashboard:</strong></p>
    <img src="https://via.placeholder.com/800x400?text=Dashboard" alt="Dashboard Screenshot">
    <p><strong>Inventory Page:</strong></p>
    <img src="https://via.placeholder.com/800x400?text=Inventory+Page" alt="Inventory Page Screenshot">

    <h2>Credits</h2>
    <p>Developed by <strong>Sadnur Islam</strong>.</p>
