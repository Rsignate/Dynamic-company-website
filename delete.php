<?php
// Include database connection and functions file
//include 'db_connect.php';
//include 'functions.php';

// Check if an ID is provided in the URL
if (isset($_GET['id'])) {
    $transferId = $_GET['id'];
    $transfer = getMoneyTransferById($transferId);
    if (!$transfer) {
        // Handle error, transfer not found
    }
} else {
    // Handle error, no ID provided
}

// Handle form submission to delete the money transfer
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['confirm_delete'])) {
        // User has confirmed deletion
        if (deleteMoneyTransfer($transferId)) {
            // Redirect to the index page after deletion
            header('Location: index.php');
            exit;
        } else {
            // Handle database delete error
        }
    } else {
        // User canceled deletion, redirect to detail page
        header('Location: detail.php?id=' . $transferId);
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Money Transfer App - Delete</title>
</head>
<body>
    <h1>Delete Money Transfer</h1>
    <p>Are you sure you want to delete this money transfer?</p>
    <p>Sender: <?php echo $transfer['sender']; ?></p>
    <p>Recipient: <?php echo $transfer['recipient']; ?></p>
    <p>Amount: <?php echo $transfer['amount']; ?></p>
    <form method="POST" action="">
        <input type="submit" name="confirm_delete" value="Yes, Delete">
        <a href="detail.php?id=<?php echo $transferId; ?>">Cancel</a>
    </form>
</body>
</html>
