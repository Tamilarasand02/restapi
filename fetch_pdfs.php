<?php
require 'vendor/autoload.php';

use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Common\Exceptions\ServiceException;

// Azure Blob connection string
$connectionString = "DefaultEndpointsProtocol=https;AccountName=<your_account_name>;AccountKey=<your_account_key>";

// Create blob client
$blobClient = BlobRestProxy::createBlobService($connectionString);

// Container name where PDFs are stored
$containerName = "<your_container_name>";

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
