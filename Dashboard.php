<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pro One</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        :root {
            --primary: #4361ee;
            --primary-light: #4895ef;
            --secondary: #3f37c9;
            --success: #4cc9f0;
            --warning: #f72585;
            --danger: #e63946;
            --dark: #1a1a2e;
            --light: #f8f9fa;
            --gray: #6c757d;
            --gray-light: #e9ecef;
            --border-radius: 10px;
            --shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s ease;
        }

        body {
            background-color: #f5f7fb;
            color: #333;
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 250px;
            background: white;
            box-shadow: var(--shadow);
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
            z-index: 100;
            transition: var(--transition);
        }

        .logo {
            padding: 25px 20px;
            border-bottom: 1px solid var(--gray-light);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo h1 {
            font-size: 24px;
            color: var(--primary);
            font-weight: 700;
        }

        .logo span {
            color: var(--warning);
        }

        .nav-menu {
            padding: 20px 0;
            flex-grow: 1;
        }

        .nav-item {
            display: flex;
            align-items: center;
            padding: 15px 25px;
            color: var(--dark);
            text-decoration: none;
            transition: var(--transition);
            border-left: 4px solid transparent;
        }

        .nav-item:hover, .nav-item.active {
            background-color: rgba(67, 97, 238, 0.08);
            color: var(--primary);
            border-left-color: var(--primary);
        }

        .nav-item i {
            width: 24px;
            margin-right: 12px;
            font-size: 18px;
        }

        .user-profile {
            padding: 20px;
            border-top: 1px solid var(--gray-light);
            display: flex;
            align-items: center;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            margin-right: 12px;
        }

        .user-info h4 {
            font-size: 14px;
            margin-bottom: 4px;
        }

        .user-info p {
            font-size: 12px;
            color: var(--gray);
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 250px;
            padding: 20px;
            transition: var(--transition);
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid var(--gray-light);
        }

        .header-left h2 {
            color: var(--dark);
            font-size: 28px;
        }

        .header-left p {
            color: var(--gray);
            margin-top: 5px;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .search-box {
            position: relative;
        }

        .search-box input {
            padding: 12px 20px 12px 40px;
            border: 1px solid var(--gray-light);
            border-radius: var(--border-radius);
            width: 300px;
            background-color: white;
        }

        .search-box i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
        }

        .notification {
            position: relative;
            background: white;
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            box-shadow: var(--shadow);
            cursor: pointer;
        }

        .notification-dot {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 8px;
            height: 8px;
            background-color: var(--warning);
            border-radius: 50%;
        }

        /* Stats Cards */
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            border-radius: var(--border-radius);
            padding: 25px;
            box-shadow: var(--shadow);
            display: flex;
            align-items: center;
            transition: var(--transition);
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 20px;
            font-size: 24px;
            color: white;
        }

        .stat-icon.blue {
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
        }

        .stat-icon.green {
            background: linear-gradient(135deg, #2ec4b6, #20bf55);
        }

        .stat-icon.orange {
            background: linear-gradient(135deg, #ff9f1c, #ff5400);
        }

        .stat-icon.pink {
            background: linear-gradient(135deg, var(--warning), #b5179e);
        }

        .stat-info h3 {
            font-size: 28px;
            color: var(--dark);
            margin-bottom: 5px;
        }

        .stat-info p {
            color: var(--gray);
            font-size: 14px;
        }

        /* Charts Section */
        .charts-container {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }

        .chart-box {
            background: white;
            border-radius: var(--border-radius);
            padding: 25px;
            box-shadow: var(--shadow);
        }

        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .chart-header h3 {
            color: var(--dark);
        }

        .chart-header select {
            padding: 8px 15px;
            border: 1px solid var(--gray-light);
            border-radius: 6px;
            background-color: white;
            color: var(--dark);
            font-size: 14px;
        }

        /* Chart Visualization (CSS only) */
        .chart-visual {
            height: 250px;
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            padding-top: 20px;
        }

        .bar {
            width: 40px;
            background: linear-gradient(to top, var(--primary), var(--primary-light));
            border-radius: 6px 6px 0 0;
            position: relative;
        }

        .bar:nth-child(2) { height: 80%; }
        .bar:nth-child(3) { height: 65%; }
        .bar:nth-child(4) { height: 90%; }
        .bar:nth-child(5) { height: 50%; }
        .bar:nth-child(6) { height: 75%; }
        .bar:nth-child(7) { height: 60%; }

        .bar-label {
            position: absolute;
            bottom: -25px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 12px;
            color: var(--gray);
        }

        /* Recent Activity */
        .activity-list {
            list-style: none;
        }

        .activity-item {
            display: flex;
            padding: 15px 0;
            border-bottom: 1px solid var(--gray-light);
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: white;
        }

        .activity-icon.user { background-color: var(--primary); }
        .activity-icon.sales { background-color: #2ec4b6; }
        .activity-icon.system { background-color: var(--warning); }
        .activity-icon.payment { background-color: #ff9f1c; }

        .activity-info h4 {
            font-size: 15px;
            margin-bottom: 5px;
        }

        .activity-info p {
            font-size: 13px;
            color: var(--gray);
        }

        .activity-time {
            margin-left: auto;
            font-size: 12px;
            color: var(--gray);
        }

        /* Projects Table */
        .projects-container {
            background: white;
            border-radius: var(--border-radius);
            padding: 25px;
            box-shadow: var(--shadow);
            margin-bottom: 30px;
        }

        .projects-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .projects-header h3 {
            color: var(--dark);
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            transition: var(--transition);
            font-weight: 600;
        }

        .btn-primary:hover {
            background-color: var(--secondary);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: left;
            padding: 15px 10px;
            border-bottom: 1px solid var(--gray-light);
            color: var(--dark);
            font-weight: 600;
        }

        td {
            padding: 15px 10px;
            border-bottom: 1px solid var(--gray-light);
        }

        .status {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .status.completed {
            background-color: rgba(46, 196, 182, 0.15);
            color: #2ec4b6;
        }

        .status.in-progress {
            background-color: rgba(67, 97, 238, 0.15);
            color: var(--primary);
        }

        .status.pending {
            background-color: rgba(255, 159, 28, 0.15);
            color: #ff9f1c;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 20px;
            color: var(--gray);
            font-size: 14px;
            border-top: 1px solid var(--gray-light);
        }

        /* Responsive Design */
        @media (max-width: 1100px) {
            .charts-container {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 900px) {
            .sidebar {
                width: 70px;
            }

            .logo h1 span {
                display: none;
            }

            .logo h1:after {
                content: "DP1";
            }

            .nav-item span, .user-info {
                display: none;
            }

            .nav-item {
                justify-content: center;
                padding: 15px;
            }

            .nav-item i {
                margin-right: 0;
            }

            .main-content {
                margin-left: 70px;
            }

            .search-box input {
                width: 200px;
            }
        }

        @media (max-width: 768px) {
            .stats-container {
                grid-template-columns: repeat(2, 1fr);
            }

            .search-box {
                display: none;
            }
        }

        @media (max-width: 576px) {
            .stats-container {
                grid-template-columns: 1fr;
            }

            .chart-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="logo">
            <h1>Dashboard<span>Pro One</span></h1>
        </div>
        
        <nav class="nav-menu">
            <a href="#" class="nav-item active">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>
            <a href="#" class="nav-item">
                <i class="fas fa-chart-bar"></i>
                <span>Analytics</span>
            </a>
            <a href="#" class="nav-item">
                <i class="fas fa-users"></i>
                <span>Users</span>
            </a>
            <a href="#" class="nav-item">
                <i class="fas fa-shopping-cart"></i>
                <span>Sales</span>
            </a>
            <a href="#" class="nav-item">
                <i class="fas fa-box"></i>
                <span>Products</span>
            </a>
            <a href="#" class="nav-item">
                <i class="fas fa-cog"></i>
                <span>Settings</span>
            </a>
            <a href="#" class="nav-item">
                <i class="fas fa-question-circle"></i>
                <span>Help</span>
            </a>
        </nav>
        
        <div class="user-profile">
            <div class="user-avatar">JD</div>
            <div class="user-info">
                <h4>John Doe</h4>
                <p>Admin</p>
            </div>
        </div>
    </aside>
    
    <!-- Main Content -->
    <main class="main-content">
        <header>
            <div class="header-left">
                <h2>Welcome back, John</h2>
                <p>Here's what's happening with your business today</p>
            </div>
            <div class="header-right">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search...">
                </div>
                <div class="notification">
                    <i class="fas fa-bell"></i>
                    <div class="notification-dot"></div>
                </div>
            </div>
        </header>
        
        <!-- Stats Cards -->
        <section class="stats-container">
            <div class="stat-card">
                <div class="stat-icon blue">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="stat-info">
                    <h3>$24,580</h3>
                    <p>Total Revenue</p>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon green">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-info">
                    <h3>1,248</h3>
                    <p>Total Customers</p>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon orange">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="stat-info">
                    <h3>562</h3>
                    <p>Total Orders</p>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon pink">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="stat-info">
                    <h3>+12.5%</h3>
                    <p>Growth Rate</p>
                </div>
            </div>
        </section>
        
        <!-- Charts Section -->
        <section class="charts-container">
            <div class="chart-box">
                <div class="chart-header">
                    <h3>Revenue Overview</h3>
                    <select>
                        <option>Last 7 Days</option>
                        <option>Last Month</option>
                        <option>Last Year</option>
                    </select>
                </div>
                <div class="chart-visual">
                    <div class="bar">
                        <div class="bar-label">Mon</div>
                    </div>
                    <div class="bar">
                        <div class="bar-label">Tue</div>
                    </div>
                    <div class="bar">
                        <div class="bar-label">Wed</div>
                    </div>
                    <div class="bar">
                        <div class="bar-label">Thu</div>
                    </div>
                    <div class="bar">
                        <div class="bar-label">Fri</div>
                    </div>
                    <div class="bar">
                        <div class="bar-label">Sat</div>
                    </div>
                    <div class="bar">
                        <div class="bar-label">Sun</div>
                    </div>
                </div>
            </div>
            
            <div class="chart-box">
                <div class="chart-header">
                    <h3>Recent Activity</h3>
                </div>
                <ul class="activity-list">
                    <li class="activity-item">
                        <div class="activity-icon user">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <div class="activity-info">
                            <h4>New user registered</h4>
                            <p>John Smith joined the platform</p>
                        </div>
                        <div class="activity-time">10 min ago</div>
                    </li>
                    <li class="activity-item">
                        <div class="activity-icon sales">
                            <i class="fas fa-chart-pie"></i>
                        </div>
                        <div class="activity-info">
                            <h4>Sales report generated</h4>
                            <p>Monthly sales report is ready</p>
                        </div>
                        <div class="activity-time">45 min ago</div>
                    </li>
                    <li class="activity-item">
                        <div class="activity-icon system">
                            <i class="fas fa-server"></i>
                        </div>
                        <div class="activity-info">
                            <h4>System updated</h4>
                            <p>Dashboard Pro v2.1 installed</p>
                        </div>
                        <div class="activity-time">2 hours ago</div>
                    </li>
                    <li class="activity-item">
                        <div class="activity-icon payment">
                            <i class="fas fa-credit-card"></i>
                        </div>
                        <div class="activity-info">
                            <h4>Payment received</h4>
                            <p>$2,500 from TechCorp Inc</p>
                        </div>
                        <div class="activity-time">5 hours ago</div>
                    </li>
                </ul>
            </div>
        </section>
        
        <!-- Projects Table -->
        <section class="projects-container">
            <div class="projects-header">
                <h3>Recent Projects</h3>
                <button class="btn-primary">+ New Project</button>
            </div>
            
            <table>
                <thead>
                    <tr>
                        <th>Project Name</th>
                        <th>Team</th>
                        <th>Status</th>
                        <th>Progress</th>
                        <th>Due Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Mobile App Redesign</td>
                        <td>Design Team</td>
                        <td><span class="status in-progress">In Progress</span></td>
                        <td>75%</td>
                        <td>Jun 15, 2023</td>
                    </tr>
                    <tr>
                        <td>Website Launch</td>
                        <td>Development</td>
                        <td><span class="status completed">Completed</span></td>
                        <td>100%</td>
                        <td>May 28, 2023</td>
                    </tr>
                    <tr>
                        <td>Marketing Campaign</td>
                        <td>Marketing</td>
                        <td><span class="status pending">Pending</span></td>
                        <td>30%</td>
                        <td>Jul 10, 2023</td>
                    </tr>
                    <tr>
                        <td>Database Migration</td>
                        <td>IT Team</td>
                        <td><span class="status in-progress">In Progress</span></td>
                        <td>60%</td>
                        <td>Jun 30, 2023</td>
                    </tr>
                </tbody>
            </table>
        </section>
        
        <footer>
            <p>Dashboard Pro One &copy; 2023 | All rights reserved</p>
        </footer>
    </main>
</body>
</html>