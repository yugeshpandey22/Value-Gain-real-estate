<?php
    $current_page = basename($_SERVER['PHP_SELF']);
?>
<!-- Header Container -->
<div class="site-header">
    <div class="header-logo-container">
        <a href="/real/index.php" class="main-logo">
            <img src="/real/assets/images/logo.png" alt="Value Gain & Associates Logo">
        </a>
    </div>

    <!-- Navbar -->
    <nav class="navbar" id="navbar">
        <ul class="nav-links">
            <li><a href="/real/index.php" class="<?php echo ($current_page == 'index.php') ? 'active' : ''; ?>">Home</a></li>
            <li><a href="/real/pages/about.php" class="<?php echo ($current_page == 'about.php') ? 'active' : ''; ?>">About</a></li>
            <li><a href="/real/pages/projects.php" class="<?php echo ($current_page == 'projects.php') ? 'active' : ''; ?>">Projects</a></li>
            <li><a href="/real/pages/contact.php" class="<?php echo ($current_page == 'contact.php') ? 'active' : ''; ?>">Contact Us</a></li>
            <li class="mobile-btn-li"><a href="#" class="mobile-signin-btn">Sign In</a></li>
        </ul>
        <div class="menu-toggle" id="mobile-menu">
            <i class="fas fa-bars"></i>
        </div>
    </nav>
</div>
