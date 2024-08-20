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

try {
    // List blobs in the container
    $blob_list = $blobClient->listBlobs($containerName);
    $blobs = $blob_list->getBlobs();

    echo "<form method='post' action='store_choice.php'>";
    echo "<select name='pdfChoice'>";
    
    foreach ($blobs as $blob) {
        $fileName = $blob->getName();
        echo "<option value='$fileName'>$fileName</option>";
    }

    echo "</select>";
    echo "<input type='submit' value='Submit'>";
    echo "</form>";
} catch (ServiceException $e) {
    // Handle errors
    echo "Error: " . $e->getMessage();
}
?>
