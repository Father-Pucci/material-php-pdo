<?php
$currentRole = $_SESSION['role'] ?? 'guest';
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<div class="sidebar">
    <div class="sidebar-header">
        <h2>User Management</h2>
    </div>
    
    <div class="sidebar-user">
        <div class="sidebar-user-email"><?php echo htmlspecialchars($_SESSION['email']); ?></div>
        <span class="sidebar-user-role"><?php echo ucfirst($currentRole); ?></span>
    </div>
    
    <div class="sidebar-menu">
        <!-- Dashboard Link -->
        <a href="<?php echo BASE_URL; ?>/app/<?php echo $currentRole; ?>/dashboard.php" 
           class="<?php echo strpos($currentPage, 'dashboard.php') !== false && strpos($_SERVER['PHP_SELF'], $currentRole) !== false ? 'active' : ''; ?>">
            <span class="material-icons">dashboard</span>
            <span>Dashboard</span>
        </a>
        
        <!-- Admin Menu Items -->
        <?php if ($currentRole === 'admin'): ?>
            <a href="<?php echo BASE_URL; ?>/app/users/dashboard.php" 
               class="<?php echo $currentPage === 'dashboard.php' && strpos($_SERVER['PHP_SELF'], 'users') !== false ? 'active' : ''; ?>">
                <span class="material-icons">people</span>
                <span>All Users</span>
            </a>
            <a href="<?php echo BASE_URL; ?>/app/users/user-create.php"
               class="<?php echo $currentPage === 'user-create.php' ? 'active' : ''; ?>">
                <span class="material-icons">person_add</span>
                <span>Create User</span>
            </a>
        <?php endif; ?>
        
        <!-- Manager Menu Items -->
        <?php if ($currentRole === 'manager'): ?>
            <a href="<?php echo BASE_URL; ?>/app/users/dashboard.php"
               class="<?php echo $currentPage === 'dashboard.php' && strpos($_SERVER['PHP_SELF'], 'users') !== false ? 'active' : ''; ?>">
                <span class="material-icons">people</span>
                <span>Manage Users</span>
            </a>
            <a href="<?php echo BASE_URL; ?>/app/users/user-create.php"
               class="<?php echo $currentPage === 'user-create.php' ? 'active' : ''; ?>">
                <span class="material-icons">person_add</span>
                <span>Create User</span>
            </a>
        <?php endif; ?>
        
        <!-- User Menu Items -->
        <?php if ($currentRole === 'user'): ?>
            <a href="<?php echo BASE_URL; ?>/app/users/user-view.php?user_id=<?php echo $_SESSION['user_id']; ?>"
               class="<?php echo $currentPage === 'user-view.php' ? 'active' : ''; ?>">
                <span class="material-icons">account_circle</span>
                <span>My Profile</span>
            </a>
        <?php endif; ?>
        
        <!-- Common Menu Items -->
        <a href="<?php echo BASE_URL; ?>/app/auth/signout.php">
            <span class="material-icons">logout</span>
            <span>Logout</span>
        </a>
    </div>
</div>