<?php
require_once '../../config/config.php';
requireRole('manager');

// Get statistics for manager
$stmt = $pdo->query("SELECT COUNT(*) as total FROM users WHERE role = 'user'");
$totalUsers = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

$stmt = $pdo->query("SELECT COUNT(*) as total FROM users WHERE role = 'user' AND is_verified = 0");
$unverifiedUsers = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

$title = 'Manager Dashboard';
renderHeader($title);
?>

<div class="card">
    <h2>Welcome, Manager!</h2>
    <p style="color: #666; margin-top: 10px;">You can manage regular users and oversee team activities.</p>
</div>

<h2>User Statistics</h2>

<div class="stat-cards">
    <div class="stat-card" style="border-left: 4px solid #66bb6a;">
        <h3><?php echo $totalUsers; ?></h3>
        <p>Total Users</p>
    </div>
    <div class="stat-card" style="border-left: 4px solid #bdbdbd;">
        <h3><?php echo $unverifiedUsers; ?></h3>
        <p>Unverified Users</p>
    </div>
</div>

<div class="card">
    <h2>Manager Capabilities</h2>
    <ul style="margin: 15px 0 0 20px; line-height: 1.8;">
        <li><strong>Manage Users:</strong> Create, edit, and delete regular users only</li>
        <li><strong>View Reports:</strong> Access user data and analytics</li>
        <li><strong>Team Management:</strong> Oversee user activities</li>
        <li><strong>Restrictions:</strong>
            <ul style="margin-top: 5px;">
                <li>Cannot manage Admins or other Managers</li>
                <li>Cannot delete own account</li>
                <li>Cannot change own role</li>
            </ul>
        </li>
    </ul>
</div>

<div class="card">
    <h2>Access Hierarchy</h2>
    <div style="padding: 15px; background: #f5f5f5; border-radius: 4px;">
        <strong style="color: #ef5350;">Admin → Full Control</strong><br>
        <span style="margin-left: 20px;">↓ Manages you</span><br>
        <strong style="color: #ffa726;">Manager (You) → Limited Control</strong><br>
        <span style="margin-left: 20px;">↓ Can manage Users only</span><br>
        <strong style="color: #66bb6a;">User → No Management Rights</strong>
    </div>
</div>

<?php renderFooter(); ?>