<?php
// Include database connection and functions file
include 'db_connect.php';
include 'functions.php';

// Check if an ID is provided in the URL
if (isset($_GET['id'])) {
    $memberId = $_GET['id'];
    $member = getTeamMemberById($memberId);
    if (!$member) {
        // Handle error, member not found
    }
} else {
    // Handle error, no ID provided
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Team Page - Detail</title>
</head>
<body>
    <h1>Team Member Details</h1>
    <p>Name: <?php echo $member['name']; ?></p>
    <p>Position: <?php echo $member['position']; ?></p>
    <a href="edit.php?id=<?php echo $memberId; ?>">Edit</a>
    <a href="delete.php?id=<?php echo $memberId; ?>">Delete</a>
</body>
</html>
