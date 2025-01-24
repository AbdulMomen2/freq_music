<?php
session_start();
require_once 'dbConnect.php';

// Check if the user is logged in and if they are an admin
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    echo "<script>alert('You are not authorized to access this page!'); window.location.href = 'index.php';</script>";
    exit();
}

// Safely access the username
$username = isset($_SESSION['user']['name']) ? $_SESSION['user']['name'] : 'Admin';

// Handle song upload and image upload logic
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['song']) && isset($_FILES['image'])) {
    $songTitle = $_POST['song_title'];
    $songDescription = $_POST['song_description'];

    // Sanitize and process the MP3 upload
    $songDir = 'uploads/songs/';
    if (!is_dir($songDir)) {
        mkdir($songDir, 0777, true); // Create directory if it doesn't exist
    }

    // Sanitize the song file name
    $songFilename = preg_replace('/[^a-zA-Z0-9\-_\.]/', '_', $_FILES['song']['name']);
    $songTargetFile = $songDir . $songFilename;

    // Sanitize and process the image upload
    $imageDir = 'uploads/images/';
    if (!is_dir($imageDir)) {
        mkdir($imageDir, 0777, true); // Create directory if it doesn't exist
    }

    // Sanitize the image file name
    $imageFilename = preg_replace('/[^a-zA-Z0-9\-_\.]/', '_', $_FILES['image']['name']);
    $imageTargetFile = $imageDir . $imageFilename;

    // Check if the song and image were uploaded successfully
    if (move_uploaded_file($_FILES['song']['tmp_name'], $songTargetFile) && move_uploaded_file($_FILES['image']['tmp_name'], $imageTargetFile)) {
        // Insert the song details into the database
        $stmt = $pdo->prepare("INSERT INTO songs (title, description, song_path, image_path) VALUES (:title, :description, :song_path, :image_path)");
        $stmt->execute(['title' => $songTitle, 'description' => $songDescription, 'song_path' => $songTargetFile, 'image_path' => $imageTargetFile]);

        echo "<script>alert('Song uploaded successfully!'); window.location.href = 'admin.php';</script>";
    } else {
        echo "<script>alert('Failed to upload song or image. Please try again.');</script>";
    }
}

// Handle song deletion
if (isset($_GET['delete_song_id'])) {
    $songId = $_GET['delete_song_id'];

    // Fetch song details to get file paths
    $stmt = $pdo->prepare("SELECT * FROM songs WHERE id = :id");
    $stmt->execute(['id' => $songId]);
    $song = $stmt->fetch();

    if ($song) {
        // Delete song from the database
        $stmt = $pdo->prepare("DELETE FROM songs WHERE id = :id");
        $stmt->execute(['id' => $songId]);

        // Delete the song and image files from the server
        unlink($song['song_path']);
        unlink($song['image_path']);

        echo "<script>alert('Song deleted successfully!'); window.location.href = 'admin.php';</script>";
    } else {
        echo "<script>alert('Song not found.'); window.location.href = 'admin.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <div class="container">
        <!-- Header Section -->
        <header>
            <h1>Welcome, <?php echo htmlspecialchars($username); ?>!</h1>
            <nav>
                <a href="main.php">Dashboard</a>
                <a href="logout.php">Logout</a>
            </nav>
        </header>

        <!-- Admin Dashboard Section -->
        <div class="dashboard">
            <h2>Admin Dashboard</h2>

            <!-- Song Upload Form -->
            <h3>Upload Song</h3>
            <form method="POST" enctype="multipart/form-data">
                <label for="song_title">Song Title:</label>
                <input type="text" name="song_title" id="song_title" required>

                <label for="song_description">Song Description:</label>
                <textarea name="song_description" id="song_description" required></textarea>

                <label for="song">Upload MP3:</label>
                <input type="file" name="song" id="song" accept="audio/mp3" required>

                <label for="image">Upload Image:</label>
                <input type="file" name="image" id="image" accept="image/*" required>

                <button type="submit">Upload Song</button>
            </form>

            <!-- Display Songs List -->
            <h3>Songs List</h3>
            <?php
            // Fetch all songs from the database
            $stmt = $pdo->query("SELECT * FROM songs");
            while ($song = $stmt->fetch()) {
                echo "<div class='song'>";
                echo "<h4>" . htmlspecialchars($song['title']) . "</h4>";
                echo "<p>" . htmlspecialchars($song['description']) . "</p>";
                echo "<audio controls>
                        <source src='" . htmlspecialchars($song['song_path']) . "' type='audio/mp3'>
                        Your browser does not support the audio element.
                      </audio>";
                echo "<img src='" . htmlspecialchars($song['image_path']) . "' alt='" . htmlspecialchars($song['title']) . "' style='width: 100px; height: 100px;'>";
                echo "<a href='admin.php?delete_song_id=" . $song['id'] . "'>Delete Song</a>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
</body>
</html>
