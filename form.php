<?php
session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);

    // Validate fields must not be empty
    if (empty($name) || empty($email)) {
        $error = "All fields are required.";
    } else {
        // Store data in session
        $_SESSION["name"] = $name;
        $_SESSION["email"] = $email;

        // Store name in cookie (expires in 1 hour)
        setcookie("user_name", $name, time() + 3600, "/");

        // Redirect to dashboard
        header("Location: dashboard.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
</head>
<body>
    <h1>Login Form</h1>

    <?php if ($error != ""): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="POST" action="form.php">
        <label>Name:</label><br>
        <input type="text" name="name"><br><br>

        <label>Email:</label><br>
        <input type="text" name="email"><br><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
