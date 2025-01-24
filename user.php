<?php
// Start session
session_start();

// Database connection
$conn = new mysqli('localhost', 'root', '', 'auth');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    echo "<h1>Please log in to view your profile</h1>";
    exit;
}

// Get the logged-in user's ID from the session
$userId = $_SESSION['user']['id'];

// Fetch user information
$query = "SELECT name, email, created_at FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $userId);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// If user is not found, show an error
if (!$user) {
    echo "<h1>User not found</h1>";
    exit;
}

// Handle password update
$passwordError = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_password'])) {
    $currentPassword = $_POST['current_password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    // Validate inputs
    if (empty($currentPassword) || empty($newPassword) || empty($confirmPassword)) {
        $passwordError = "All fields are required.";
    } elseif ($newPassword !== $confirmPassword) {
        $passwordError = "New password and confirm password do not match.";
    } else {
        // Fetch the current hashed password
        $query = "SELECT password FROM users WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        $userData = $result->fetch_assoc();

        // Verify the current password
        if (!password_verify($currentPassword, $userData['password'])) {
            $passwordError = "Current password is incorrect.";
        } else {
            // Update the password
            $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
            $query = "UPDATE users SET password = ? WHERE id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('si', $hashedPassword, $userId);
            if ($stmt->execute()) {
                $passwordError = "Password updated successfully!";
            } else {
                $passwordError = "Failed to update password. Please try again.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:rgb(68, 57, 109);
            margin: 0;
            padding: 20px;
        }
        .user-details, .update-password {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            margin: 0 0 10px;
        }
        p {
            margin: 5px 0;
            color: #555;
        }
        .back-button, button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #007BFF;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        .back-button:hover, button:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="user-details">
    <h1><?php echo htmlspecialchars($user['name']); ?></h1>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
    <p><strong>Joined:</strong> <?php echo htmlspecialchars($user['created_at']); ?></p>
    <a href="main.php" class="back-button">Back</a>
</div>

<div class="update-password">
    <h2>Update Password</h2>
    <?php if (!empty($passwordError)) echo "<p class='error'>$passwordError</p>"; ?>
    <form method="POST">
        <div>
            <label for="current_password">Current Password:</label><br>
            <input type="password" name="current_password" id="current_password" required>
        </div>
        <div>
            <label for="new_password">New Password:</label><br>
            <input type="password" name="new_password" id="new_password" required>
        </div>
        <div>
            <label for="confirm_password">Confirm New Password:</label><br>
            <input type="password" name="confirm_password" id="confirm_password" required>
        </div>
        <button type="submit" name="update_password">Update Password</button>
    </form>
</div>

</body>
</html>
