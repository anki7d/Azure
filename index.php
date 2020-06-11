<?php

require_once "vendor/autoload.php";

use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Common\ServiceException;

if (!isset($_POST['FORM'])) {
    ?>

    <form action="?FORM=true" method="post" enctype='multipart/form-data'>
    <input type="file" name="file_to" id="">

    <input type="hidden" name="FORM" value="true">
    <button>ok</button>
     </form>
    <?php die;
}

$connectionString = "DefaultEndpointsProtocol=https;AccountName="
    . ' ' . ";AccountKey=" . ' ';

$blobClient = BlobRestProxy::createBlobService($connectionString);
$containerName = 'hdfcpayu';

$fileToUpload = $_FILES['file_to']["tmp_name"];
$content = fopen($fileToUpload, "r");

$that = $blobClient->createBlockBlob($containerName, $fileToUpload, $content);

echo '<pre>';
print_r($that);