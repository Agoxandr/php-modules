<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Files</title>
    <link rel="stylesheet" href="css/master.css">
    <style>
        body {
            margin: 0;
        }

        button {
            position: fixed;
            right: 0;
            top: 0;
            padding: 0;
            width: 28px;
            height: 28px;
        }

        ul {
            padding: 0 40px;
        }
    </style>
</head>

<body>
    <button onclick="location.reload()"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
            <path d="M17.65 6.35C16.2 4.9 14.21 4 12 4c-4.42 0-7.99 3.58-7.99 8s3.57 8 7.99 8c3.73 0 6.84-2.55 7.73-6h-2.08c-.82 2.33-3.04 4-5.65 4-3.31 0-6-2.69-6-6s2.69-6 6-6c1.66 0 3.14.69 4.22 1.78L13 11h7V4l-2.35 2.35z" />
            <path d="M0 0h24v24H0z" fill="none" /></svg></button>
    <form action="remove.php" method="post">
        <?php
        echo ("<ul id='files'>");
        foreach (new DirectoryIterator('../Uploads') as $fileInfo) {
            if ($fileInfo->isDot()) continue;
            echo ("<li>" . $fileInfo->getFilename() . " <img src='../Uploads/" . $fileInfo->getFilename() . "' alt=''><input type='checkbox' value='" . $fileInfo->getFilename() . "' name='" . $fileInfo->getFilename() . "' id='" . $fileInfo->getFilename() . "'></li>");
        }
        echo ("</ul>");
        ?>
        <input type="submit" value="Delete Selected">
    </form>
</body>

</html>