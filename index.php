<?php
// Include database connection and functions file
include 'db_connect.php';
include 'functions.php';

// Fetch all team members from the database
$teamMembers = getAllTeamMembers();

// HTML code for displaying the list
?>

<!DOCTYPE html>
<html>
<head>
    <title>Team Page - List</title>
</head>
<body>
    <h1>Team Members</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($teamMembers as $member): ?>
            <tr>
                <td><?php echo $member['name']; ?></td>
                <td><?php echo $member['position']; ?></td>
                <td>
                    <a href="detail.php?id=<?php echo $member['id']; ?>">View</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="create.php">Add Team Member</a>
</body>
</html>
