<?php
// Check if a file was uploaded
if (isset($_FILES['image']) && isset($_POST['description'])) {
    $uploadDir = 'uploads/';
    $uploadedFile = $uploadDir . basename($_FILES['image']['name']);
    $description = $_POST['description'];

    // Move the uploaded file to the specified directory
    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadedFile)) {
        // Return a response to the client with the file path
        echo json_encode(['success' => true, 'message' => 'File uploaded successfully', 'file' => $uploadedFile]);
    } else {
        // Return an error response
        $error_message = error_get_last();
        echo json_encode(['success' => false, 'message' => 'Error moving file', 'error' => $error_message]);
    }
} else {
    // Return an error response if no file or description was provided
    echo json_encode(['success' => false, 'message' => 'No file or description provided']);
}
?>
