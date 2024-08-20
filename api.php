<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Example of handling GET requests to fetch data
    echo json_encode(["message" => "API Endpoint reached."]);
}

// You can add more logic here to handle POST, PUT, DELETE, etc.
?>
