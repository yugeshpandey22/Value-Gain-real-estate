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
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="admin-body">
    <?php include '../includes/admin-sidebar.php'; ?>

    <main class="admin-main">
        <div class="header-top">
            <h1>Enquiries</h1>
        </div>

        <div class="content-card">
            <table class="admin-table">
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
