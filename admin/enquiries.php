<?php
session_start();
require_once '../includes/db.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}

// Delete Logic
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM enquiries WHERE id = $id");
    header('Location: enquiries.php');
    exit;
}

// Fetch Enquiries
$enquiries = $conn->query("SELECT * FROM enquiries ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enquiries | Admin Panel</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root { --sidebar-width: 280px; }
        body { background-color: #0b0c0f; display: flex; min-height: 100vh; }
        .admin-sidebar { width: var(--sidebar-width); background: #121418; border-right: 1px solid rgba(255, 255, 255, 0.05); padding: 2rem; display: flex; flex-direction: column; position: fixed; height: 100vh; }
        .sidebar-header { display: flex; align-items: center; gap: 1rem; margin-bottom: 3rem; }
        .sidebar-header img { height: 40px; filter: brightness(0) invert(1); }
        .sidebar-header span { color: #fff; font-weight: 600; font-size: 1.2rem; }
        .sidebar-nav { list-style: none; padding: 0; flex: 1; }
        .sidebar-nav li { margin-bottom: 1rem; }
        .sidebar-nav a { display: flex; align-items: center; gap: 1rem; color: #888; text-decoration: none; padding: 0.8rem 1rem; border-radius: 8px; transition: 0.3s; }
        .sidebar-nav a:hover, .sidebar-nav a.active { background: rgba(203, 161, 83, 0.1); color: var(--primary); }
        .sidebar-nav .logout { margin-top: auto; }
        .sidebar-nav .logout a:hover { background: rgba(255, 77, 77, 0.1); color: #ff4d4d; }

        .admin-main { margin-left: var(--sidebar-width); flex: 1; padding: 3rem; }
        .header-top { display: flex; justify-content: space-between; align-items: center; margin-bottom: 3rem; }
        .header-top h1 { color: #fff; font-size: 2rem; }

        .content-card { background: #121418; padding: 2rem; border-radius: 12px; border: 1px solid rgba(255, 255, 255, 0.05); }
        .enquiry-table { width: 100%; border-collapse: collapse; }
        .enquiry-table th { text-align: left; padding: 1rem; color: #555; border-bottom: 1px solid rgba(255, 255, 255, 0.05); }
        .enquiry-table td { padding: 1.2rem 1rem; color: #ccc; border-bottom: 1px solid rgba(255, 255, 255, 0.02); vertical-align: top; }
        .msg-text { max-width: 400px; color: #888; font-size: 0.9rem; line-height: 1.5; }
        .btn-delete { color: #ff4d4d; text-decoration: none; }
    </style>
</head>
<body>
    <?php include 'includes/sidebar.php'; ?>

    <main class="admin-main">
        <div class="header-top">
            <h1>Enquiries</h1>
        </div>

        <div class="content-card">
            <table class="enquiry-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Contact Info</th>
                        <th>Subject / Message</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($enquiries->num_rows > 0): ?>
                        <?php while($row = $enquiries->fetch_assoc()): ?>
                            <tr>
                                <td style="white-space: nowrap;"><?php echo date('M d, Y', strtotime($row['created_at'])); ?></td>
                                <td>
                                    <strong><?php echo $row['name']; ?></strong><br>
                                    <span style="font-size: 0.85rem; color: #666;"><?php echo $row['email']; ?></span><br>
                                    <span style="font-size: 0.85rem; color: #666;"><?php echo $row['phone']; ?></span>
                                </td>
                                <td>
                                    <div style="font-weight: 600; margin-bottom: 0.5rem; color: var(--primary);"><?php echo $row['subject']; ?></div>
                                    <div class="msg-text"><?php echo nl2br($row['message']); ?></div>
                                </td>
                                <td>
                                    <a href="?delete=<?php echo $row['id']; ?>" class="btn-delete" onclick="return confirm('Delete this enquiry?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr><td colspan="4" style="text-align: center; color: #555; padding: 3rem;">No enquiries found.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
