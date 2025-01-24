<?php
require_once 'dbConnect.php';

session_start();

$errors = [];

// Sign-up logic
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup'])) {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $name = $_POST['name'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    $created_at = date('Y-m-d H:i:s');
    $role = $_POST['role'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email format';
    }
    if (empty($name)) {
        $errors['name'] = 'Name is required';
    }
    if (strlen($password) < 8) {
        $errors['password'] = 'Password must be at least 8 characters long.';
    }
    if ($password !== $confirmPassword) {
        $errors['confirm_password'] = 'Passwords do not match';
    }

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    if ($stmt->fetch()) {
        $errors['user_exist'] = 'Email is already registered';
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header('Location: register.php');
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    $stmt = $pdo->prepare("INSERT INTO users (email, password, name, role, created_at) VALUES (:email, :password, :name, :role, :created_at)");
    $stmt->execute(['email' => $email, 'password' => $hashedPassword, 'name' => $name, 'role' => $role, 'created_at' => $created_at]);


    header('Location: index.php');
    exit();
}

// Sign-in logic
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signin'])) {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $role = $_POST['role'];  // Capture the role selected in the login form

    // Validate input
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email format';
    }

    if (empty($password)) {
        $errors['password'] = 'Password cannot be empty';
    }

    // If there are errors, redirect back to the login form
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header('Location: index.php');
        exit();
    }

    // Check if user exists and verify password
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        // Check if the selected role matches the role in the database
        if ($role !== $user['role']) {
            $errors['role_mismatch'] = 'The selected role does not match your registered role.';
            $_SESSION['errors'] = $errors;
            header('Location: index.php');
            exit();
        }

        // Set session data for the logged-in user, including the role
        $_SESSION['user'] = [
            'id' => $user['id'],
            'email' => $user['email'],
            'name' => $user['name'],
            'role' => $user['role'],  // Store the role from the database
            'created_at' => $user['created_at']
        ];

        // Redirect based on user role (admin or regular user)
        if ($user['role'] === 'admin') {
            header('Location: admin.php');
            exit();
        } else {
            header('Location: main.php');
            exit();
        }
    } else {
        $errors['login'] = 'Invalid email or password';
        $_SESSION['errors'] = $errors;
        header('Location: index.php');
        exit();
    }
}
?>
