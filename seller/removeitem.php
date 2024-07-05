<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = mysqli_connect("localhost", 'root', '', 'buymart');

    if ($conn->connect_error) {
        die('Connection failed');
    }

    $itemName = $_POST['id'];

    // Prepare and execute SQL query to remove the item from the item table
    $stmt = $conn->prepare("DELETE FROM item WHERE item_id = ?");
    $stmt->bind_param("s", $itemName);

    if ($stmt->execute()) {
        // Item removal successful
        $stmt->close();
        $conn->close();
        header("Location: myitems.php");
        exit();
    } else {
        // Error occurred while removing the item
        echo '<script>alert("Error removing item.");</script>';
    }

    $stmt->close();
    $conn->close();
}
?>
