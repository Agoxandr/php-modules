<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Post</title>
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/editor.css">
</head>

<body onbeforeunload="return true">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <div class="gui">
        <h1>New Post</h1>
    </div>
    <div id="editorjs"></div>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest/dist/editor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest/dist/bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/list@latest/dist/bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/simple-image@latest/dist/bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/embed@latest/dist/bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/table@latest/dist/bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/quote@latest/dist/bundle.js"></script>
    <script>
        var savedData = <?php echo (file_get_contents("saved.json")); ?>;
    </script>
    <script src="editor.js"></script>
    <div class="gui">
        <h2>Upload Images</h2>
        <iframe src="uploader.php" frameborder="0"></iframe>
        <h2>Server Files</h2>
        <iframe src="files.php" frameborder="0" height="300"></iframe>
        <div></div>
        <h2>Export</h2>
        <button onclick="save()">Save</button>
        <button onclick="">Set Live</button>
        <h2>Output</h2>
        <div id="post"></div>
    </div>
</body>

</html>