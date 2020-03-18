<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remove</title>
    <link rel="stylesheet" href="css/master.css">
    <style>
        body {
            margin: 0;
        }
    </style>
</head>

<body>
    <?php
    foreach (new DirectoryIterator('../Uploads') as $fileInfo) {
        if ($fileInfo->isDot()) continue;
        if (isset($_POST[str_replace(".", "_", $fileInfo->getFilename())])) {
            unlink($fileInfo->getFileInfo());
            echo ("<p>" . $fileInfo->getFilename() . " deleted.</p>");
        }
    }
    echo ("<a href='files.php'>Go back</a>");
    ?>
</body>

</html>