<?php
echo("<h1>Running all tests</h1>");
$directoryIterator = new RecursiveDirectoryIterator('.');
foreach (new RecursiveIteratorIterator($directoryIterator) as $path => $file) {
    if (strpos($path, "test") !== false && strpos($path, ".php") !== false) {
        echo("<p>Starting $path</p><i>");
        include($path);
        echo("</i><p>End $directoryIterator test</p>");
    }
}
