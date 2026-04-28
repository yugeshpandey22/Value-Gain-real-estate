<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<div class="admin-sidebar">
    <div class="sidebar-header">
        <img src="../assets/images/logo.png" alt="Logo">
        <span>Admin Panel</span>
    </div>
    <ul class="sidebar-nav">
        <li>
            <a href="dashboard.php" class="<?php echo ($current_page == 'dashboard.php') ? 'active' : ''; ?>">
                <i class="fas fa-th-large"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="manage-projects.php" class="<?php echo ($current_page == 'manage-projects.php') ? 'active' : ''; ?>">
                <i class="fas fa-building"></i> Manage Projects
            </a>
        </li>
        <li>
            <a href="enquiries.php" class="<?php echo ($current_page == 'enquiries.php') ? 'active' : ''; ?>">
                <i class="fas fa-envelope"></i> Enquiries
            </a>
        </li>
        <li class="logout">
            <a href="logout.php">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </li>
    </ul>
</div>
