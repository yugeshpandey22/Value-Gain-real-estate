<?php
session_start();
require_once '../includes/db.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}

// Fetch Stats
$totalProjects = $conn->query("SELECT COUNT(*) as count FROM projects")->fetch_assoc()['count'];
$totalEnquiries = $conn->query("SELECT COUNT(*) as count FROM enquiries")->fetch_assoc()['count'];
$recentEnquiries = $conn->query("SELECT * FROM enquiries ORDER BY created_at DESC LIMIT 5");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Admin Panel</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --sidebar-width: 280px;
        }
        body {
            background-color: #0b0c0f;
            display: flex;
            min-height: 100vh;
        }
        
        /* Sidebar Styles */
        .admin-sidebar {
            width: var(--sidebar-width);
            background: #121418;
            border-right: 1px solid rgba(255, 255, 255, 0.05);
            padding: 2rem;
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
        }
        .sidebar-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 3rem;
        }
        .sidebar-header img {
            height: 40px;
            filter: brightness(0) invert(1);
        }
        .sidebar-header span {
            color: #fff;
            font-weight: 600;
            font-size: 1.2rem;
        }
        .sidebar-nav {
            list-style: none;
            padding: 0;
            flex: 1;
        }
        .sidebar-nav li {
            margin-bottom: 1rem;
        }
        .sidebar-nav a {
            display: flex;
            align-items: center;
            gap: 1rem;
            color: #888;
            text-decoration: none;
            padding: 0.8rem 1rem;
            border-radius: 8px;
            transition: 0.3s;
        }
        .sidebar-nav a:hover, .sidebar-nav a.active {
            background: rgba(203, 161, 83, 0.1);
            color: var(--primary);
        }
        .sidebar-nav .logout {
            margin-top: auto;
        }
        .sidebar-nav .logout a:hover {
            background: rgba(255, 77, 77, 0.1);
            color: #ff4d4d;
        }

        /* Main Content */
        .admin-main {
            margin-left: var(--sidebar-width);
            flex: 1;
            padding: 3rem;
        }
        .header-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 3rem;
        }
        .header-top h1 {
            color: #fff;
            font-size: 2rem;
        }
        .user-info {
            color: #888;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }
        .stat-card {
            background: #121418;
            padding: 2rem;
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }
        .stat-icon {
            width: 60px;
            height: 60px;
            background: rgba(203, 161, 83, 0.1);
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            font-size: 1.5rem;
        }
        .stat-info h3 {
            color: #fff;
            font-size: 1.8rem;
            margin-bottom: 0.2rem;
        }
        .stat-info p {
            color: #888;
            font-size: 0.9rem;
        }

        /* Recent Table */
        .recent-section {
            background: #121418;
            padding: 2rem;
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }
        .section-header h2 {
            color: #fff;
            font-size: 1.4rem;
        }
        .recent-table {
            width: 100%;
            border-collapse: collapse;
        }
        .recent-table th {
            text-align: left;
            padding: 1rem;
            color: #555;
            font-size: 0.9rem;
            text-transform: uppercase;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }
        .recent-table td {
            padding: 1.2rem 1rem;
            color: #ccc;
            border-bottom: 1px solid rgba(255, 255, 255, 0.02);
        }
        .status-badge {
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.8rem;
            background: rgba(203, 161, 83, 0.1);
            color: var(--primary);
        }
    </style>
</head>
<body>
    <?php include 'includes/sidebar.php'; ?>

    <main class="admin-main">
        <div class="header-top">
            <h1>Welcome, <?php echo $_SESSION['admin_username']; ?></h1>
            <div class="user-info">
                <span><?php echo date('l, jS F Y'); ?></span>
            </div>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon"><i class="fas fa-building"></i></div>
                <div class="stat-info">
                    <h3><?php echo $totalProjects; ?></h3>
                    <p>Total Projects</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon"><i class="fas fa-envelope"></i></div>
                <div class="stat-info">
                    <h3><?php echo $totalEnquiries; ?></h3>
                    <p>New Enquiries</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon"><i class="fas fa-users"></i></div>
                <div class="stat-info">
                    <h3>1</h3>
                    <p>Active Admins</p>
                </div>
            </div>
        </div>

        <div class="recent-section">
            <div class="section-header">
                <h2>Recent Enquiries</h2>
                <a href="enquiries.php" style="color: var(--primary); text-decoration: none; font-size: 0.9rem;">View All</a>
            </div>
            <table class="recent-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($recentEnquiries->num_rows > 0): ?>
                        <?php while($row = $recentEnquiries->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['subject']; ?></td>
                                <td><?php echo date('M d, Y', strtotime($row['created_at'])); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" style="text-align: center; color: #555; padding: 2rem;">No enquiries yet.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
