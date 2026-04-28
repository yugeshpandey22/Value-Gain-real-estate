<?php
session_start();
require_once '../includes/db.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}

$msg = "";
// Delete Logic
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM projects WHERE id = $id");
    $msg = "Project deleted successfully!";
}

// Add/Edit Logic
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save_project'])) {
    $title = $conn->real_escape_string($_POST['title']);
    $subtitle = $conn->real_escape_string($_POST['subtitle']);
    $category = $conn->real_escape_string($_POST['category']);
    $description = $conn->real_escape_string($_POST['description']);
    
    $image_path = $_POST['existing_image'] ?? "";
    
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "../assets/images/";
        $image_name = time() . "_" . basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $image_name;
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image_path = "assets/images/" . $image_name;
        }
    }

    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id = intval($_POST['id']);
        $sql = "UPDATE projects SET title='$title', subtitle='$subtitle', category='$category', description='$description', image='$image_path' WHERE id=$id";
    } else {
        $sql = "INSERT INTO projects (title, subtitle, category, description, image) VALUES ('$title', '$subtitle', '$category', '$description', '$image_path')";
    }

    if ($conn->query($sql)) {
        $msg = "Project saved successfully!";
    } else {
        $msg = "Error: " . $conn->error;
    }
}

// Fetch Projects
$projects = $conn->query("SELECT * FROM projects ORDER BY created_at DESC");

// Fetch single project for editing
$edit_data = null;
if (isset($_GET['edit'])) {
    $id = intval($_GET['edit']);
    $edit_data = $conn->query("SELECT * FROM projects WHERE id = $id")->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Projects | Admin Panel</title>
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

        .content-card { background: #121418; padding: 2rem; border-radius: 12px; border: 1px solid rgba(255, 255, 255, 0.05); margin-bottom: 3rem; }
        .content-card h2 { color: #fff; margin-bottom: 2rem; font-size: 1.4rem; }

        .admin-form .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem; }
        .admin-form .form-group { margin-bottom: 1.5rem; }
        .admin-form label { display: block; color: #888; margin-bottom: 0.5rem; font-size: 0.9rem; }
        .admin-form input, .admin-form select, .admin-form textarea { width: 100%; padding: 0.8rem 1rem; background: #1a1c21; border: 1px solid rgba(255, 255, 255, 0.1); color: #fff; border-radius: 6px; outline: none; transition: 0.3s; }
        .admin-form input:focus { border-color: var(--primary); }
        .btn-save { background: var(--primary); color: #000; border: none; padding: 1rem 2rem; border-radius: 6px; font-weight: 700; cursor: pointer; }

        .project-table { width: 100%; border-collapse: collapse; }
        .project-table th { text-align: left; padding: 1rem; color: #555; border-bottom: 1px solid rgba(255, 255, 255, 0.05); }
        .project-table td { padding: 1rem; color: #ccc; border-bottom: 1px solid rgba(255, 255, 255, 0.02); }
        .project-img { height: 40px; border-radius: 4px; }
        .action-btns { display: flex; gap: 1rem; }
        .btn-edit { color: var(--primary); text-decoration: none; }
        .btn-delete { color: #ff4d4d; text-decoration: none; }
        .alert { padding: 1rem; border-radius: 6px; margin-bottom: 2rem; background: rgba(203, 161, 83, 0.1); color: var(--primary); }
    </style>
</head>
<body>
    <?php include 'includes/sidebar.php'; ?>

    <main class="admin-main">
        <div class="header-top">
            <h1>Manage Projects</h1>
            <?php if($msg): ?>
                <div class="alert"><?php echo $msg; ?></div>
            <?php endif; ?>
        </div>

        <!-- Add/Edit Form -->
        <div class="content-card">
            <h2><?php echo $edit_data ? 'Edit Project' : 'Add New Project'; ?></h2>
            <form class="admin-form" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $edit_data['id'] ?? ''; ?>">
                <input type="hidden" name="existing_image" value="<?php echo $edit_data['image'] ?? ''; ?>">
                
                <div class="form-row">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" required value="<?php echo $edit_data['title'] ?? ''; ?>">
                    </div>
                    <div class="form-group">
                        <label>Subtitle</label>
                        <input type="text" name="subtitle" value="<?php echo $edit_data['subtitle'] ?? ''; ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Category</label>
                        <select name="category">
                            <option value="Residential" <?php echo (isset($edit_data['category']) && $edit_data['category'] == 'Residential') ? 'selected' : ''; ?>>Residential</option>
                            <option value="Commercial" <?php echo (isset($edit_data['category']) && $edit_data['category'] == 'Commercial') ? 'selected' : ''; ?>>Commercial</option>
                            <option value="Land" <?php echo (isset($edit_data['category']) && $edit_data['category'] == 'Land') ? 'selected' : ''; ?>>Land</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" <?php echo $edit_data ? '' : 'required'; ?>>
                    </div>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" rows="4"><?php echo $edit_data['description'] ?? ''; ?></textarea>
                </div>
                <button type="submit" name="save_project" class="btn-save"><?php echo $edit_data ? 'Update Project' : 'Save Project'; ?></button>
                <?php if($edit_data): ?>
                    <a href="manage-projects.php" style="margin-left: 1rem; color: #888;">Cancel</a>
                <?php endif; ?>
            </form>
        </div>

        <!-- Projects List -->
        <div class="content-card">
            <h2>Existing Projects</h2>
            <table class="project-table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($projects->num_rows > 0): ?>
                        <?php while($row = $projects->fetch_assoc()): ?>
                            <tr>
                                <td><img src="../<?php echo $row['image']; ?>" class="project-img"></td>
                                <td><?php echo $row['title']; ?></td>
                                <td><?php echo $row['category']; ?></td>
                                <td class="action-btns">
                                    <a href="?edit=<?php echo $row['id']; ?>" class="btn-edit"><i class="fas fa-edit"></i></a>
                                    <a href="?delete=<?php echo $row['id']; ?>" class="btn-delete" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr><td colspan="4" style="text-align: center; color: #555;">No projects found.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
