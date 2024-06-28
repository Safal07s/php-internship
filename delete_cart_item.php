<?php
// Include database connection
require('admin/config/config.php');

// Check if item ID is provided via POST
if (isset($_POST['id'])) {
    $item_id = mysqli_real_escape_string($con, $_POST['id']);

    // Prepare delete statement
    $delete_query = "DELETE FROM cart WHERE id = '$item_id'";
    $delete_result = mysqli_query($con, $delete_query);

    if ($delete_result) {
        // Successful deletion
        $response = [
            'status' => 'success',
            'message' => 'Item removed from cart successfully.'
        ];
    } else {
        // Failed to delete
        $response = [
            'status' => 'error',
            'message' => 'Failed to remove item from cart.'
        ];
    }
} else {
    // Invalid request
    $response = [
        'status' => 'error',
        'message' => 'Invalid request. Item ID is missing.'
    ];
}

// Send JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
