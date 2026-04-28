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
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="admin-body">
    <?php include '../includes/admin-sidebar.php'; ?>

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
            <table class="admin-table">
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
