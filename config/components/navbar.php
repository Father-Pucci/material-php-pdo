<?php
$currentRole = $_SESSION['role'] ?? 'guest';
$pageTitle = $title ?? 'Dashboard';

// Determine breadcrumb
$breadcrumb = '';
if (strpos($_SERVER['PHP_SELF'], 'admin') !== false) {
    $breadcrumb = 'Admin';
} elseif (strpos($_SERVER['PHP_SELF'], 'manager') !== false) {
    $breadcrumb = 'Manager';
} elseif (strpos($_SERVER['PHP_SELF'], 'user/dashboard') !== false) {
    $breadcrumb = 'User';
} elseif (strpos($_SERVER['PHP_SELF'], 'users') !== false) {
    $breadcrumb = 'User Management';
}
?>

<div class="navbar">
    <h1><?php echo htmlspecialchars($pageTitle); ?></h1>
    <div class="navbar-actions">
        <?php if ($breadcrumb): ?>
            <span style="color: #999; margin-right: 15px;">
                <span class="material-icons" style="font-size: 16px; vertical-align: middle;">home</span>
                / <?php echo $breadcrumb; ?>
            </span>
        <?php endif; ?>
    </div>
</div>