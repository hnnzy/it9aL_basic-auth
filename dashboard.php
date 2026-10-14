<?php
session_start();

// Check if session exists - redirect if not logged in
if (!isset($_SESSION["name"]) || !isset($_SESSION["email"])) {
    header("Location: form.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Dashboard</h1>

    <p>Welcome, <?php echo htmlspecialchars($_SESSION["name"]); ?>!</p>
    <p>Email: <?php echo htmlspecialchars($_SESSION["email"]); ?></p>

    <?php if (isset($_COOKIE["user_name"])): ?>
        <p>Cookie value: <?php echo htmlspecialchars($_COOKIE["user_name"]); ?></p>
    <?php endif; ?>

    <br>
    <a href="logout.php">Logout</a>
</body>
</html>
