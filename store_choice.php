<?php
require 'vendor/autoload.php';

use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Common\Exceptions\ServiceException;

// Azure Blob connection string
$connectionString = "DefaultEndpointsProtocol=https;AccountName=storingfiles;AccountKey=FVDiDa/6VUYjGmTOql9+kw/oukKQFrlzx7MPQ9aSUgq4+n0THl+NAiMETW/FvK7KX7iA82paZ5Cr+ASt4qor8A==";

// Create blob client
$blobClient = BlobRestProxy::createBlobService($connectionString);

// Container name where PDFs are stored
$containerName = "files-storing";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedPDF = $_POST['pdfChoice'];
    
    // Logic to store the selection in the blob or database
    // For demo purposes, we're just echoing the selected file name
    echo "You selected: " . $selectedPDF;

    // Add code here to save the selection to your database or process it further.
}
?>
